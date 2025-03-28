<?php

namespace App\Livewire\Atendimento\Agendamento;

use \Carbon\Carbon;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Configuracao\ColaboradorServico as DBColaboradorServico;

class AgendamentoCriar extends Component
{
  public $modal = false;

  public $id_empresa;
  public $dia;
  public $start;
  public $end;
  public $id_cliente;
  public $id_profexec;
  public $id_servprod;
  public $id_comanda;
  public $valor;
  public $id_criador;
  public $status;
  public $obs;
  public $id_venda_detalhe;
  public $prc_comissao;
  public $vlr_comissao;
  public $grupo;
  public $duracao;

  public $criar = false;
    
  public $profissionais = [];
  public $servicos      = [];

  protected $listeners = [
    'agendamentoUpdated' => 'refreshList',
    'showModalCriar'     => 'showModalCriarHandler',
  ];
  
  public function mount()
  {
    // $this->buscar_profissionais();
  }
  
  public function updated()
  {
    if(isset($this->id_servprod) && $this->id_servprod != 'Selecione um serviço . . .')
    {
      $this->criar = true;
    } 
    else
    {
      $this->criar = false;
    }
  }

  public function showModalCriarHandler($dados)
  {
    $this->dia         = Carbon::parse($dados['dia'])->setTimezone('America/Sao_Paulo')->format('Y-m-d');
    $this->start       = Carbon::parse($dados['start'])->setTimezone('America/Sao_Paulo')->format('H:i');
    $this->end         = Carbon::parse($dados['end'])->setTimezone('America/Sao_Paulo')->format('H:i');
    
    $this->duracao     = Carbon::today()->addMinutes(Carbon::parse($this->end)->diffInMinutes(Carbon::parse($this->start)))->format('H:i');
    $this->id_profexec = $dados['resource'] ?? null;
        
    $this->preencher_servicos_profissionais( 'id_profexec' );
    
    $this->modal = $dados['modal'];
  }
  
  public function toggle_modal($status)
  {
    if(!$status)
    {
      $this->id_profexec   = null;
      $this->id_servprod   = null;
      $this->servicos      = [];
      $this->preencher_servicos_profissionais();

      $this->modal = false;
    }
  }

  // public function servico_selecionado( $id_servico )
  // {
  //   dd('servico_selecionado', $id_servico);
  //   $servico = DBServicoProduto::find($id_servico);
  //   $this->vlr_venda     = $servico->vlr_venda;
  //   $this->vlr_negociado = $servico->vlr_venda;
  //   $this->tipo_preco    = $servico->tipo_preco;
  // }
  
  // public function profissional_selecionado( $id_profexec )
  // {
  //   dd('profissional_selecionado', $id_profexec);
  //   $profissional       = DBPessoa::find($id_profexec);
  //   $this->id_profexec  = $profissional->id;

  //   $colabserv          = $profissional->aeahvtsijjoprlc->where('id_servprod', $this->id_servprod)->first();
  //   $this->prc_comissao = $colabserv->prc_comissao * 100;
  //   $this->valor        = number_format($this->percentual / 100 * str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $this->vlr_final))), 2, ',', '.');
  // }

  public function buscar_servicos()
  {
    $id_profexec = $this->id_profexec;

    $this->servicos = DBServicoProduto::
                                        where('tipo', '=', 'Serviço')->
                                        whereHas('smenhgskqwmdjwe', function (Builder $query) use ($id_profexec)
                                        {
                                          if ( isset( $id_profexec ) && $id_profexec != "Selecione um profissional . . ." )
                                          {
                                            $query->where('id_profexec', '=', $id_profexec);
                                          }
                                        })->
                                        orderBy('nome', 'asc')->
                                        get()->
                                        map(function ($model)
                                        {
                                          return [ 
                                            'id'   => $model->id,
                                            'nome' => $model->nome,
                                            'tipo' => $model->tipo,
                                          ];
                                        });
  }

  public function buscar_profissionais()
  {
    $id_servprod = $this->id_servprod;
    
    $this->profissionais = DBPessoa::
                                // parceiros()->
                                whereHas('aeahvtsijjoprlc', function (Builder $query) use ($id_servprod)
                                {
                                  if ( isset( $id_servprod ) && $id_servprod != "Selecione um serviço . . ." )
                                  {
                                    $query->where('id_servprod', '=', $id_servprod);
                                  }
                                })->
                                orderBy('nome', 'asc')->
                                get()->
                                map(function ($model)
                                {
                                  return [ 
                                    'id'      => $model->id,
                                    'apelido' => $model->apelido,
                                  ];
                                });
  }
  
  public function preencher_servicos_profissionais( $tipo=null )
  {
    if( $tipo == 'id_profexec' )
    {
      $this->buscar_servicos();
    }
    
    if( $tipo == 'id_servprod' )
    {
      $this->buscar_profissionais();
    }
    
    if( ( isset($this->id_profexec) && isset($this->id_servprod) ) && ( $this->id_profexec != "Selecione um profissional . . ." && $this->id_servprod != "Selecione um serviço . . ." ) )
    {
      $escolhido = DBColaboradorServico::where('id_profexec', $this->id_profexec)->where('id_servprod', $this->id_servprod)->first();

      if(isset($escolhido->eirtuqweendaksa))
      {
        $this->duracao      = $escolhido->eirtuqweendaksa->duracao == '00:00:00' ? '00:30:00' : $escolhido->eirtuqweendaksa->duracao;
       
        $this->prc_comissao = number_format($escolhido->prc_comissao * 100, 0, '.', ',');
        $this->valor        = number_format($escolhido->eirtuqweendaksa->vlr_venda * 1, 2, '.', ',');
        $this->vlr_comissao = number_format($this->prc_comissao * $this->valor / 100, 2, '.', ',');
  
        $this->end = Carbon::parse($this->start)->
                                      addHour(explode(':', $this->duracao)[0])->
                                      addMinutes(explode(':', $this->duracao)[1])->
                                      addSeconds(explode(':', $this->duracao)[2])->
                                      format('H:i');
      }
      else
      {
        $this->duracao      = null;
        $this->prc_comissao = null;
        $this->valor        = null;
        $this->vlr_comissao = null;
        
        $this->dispatch('swal:alert', [
          'text'      => 'Esse profissional não executa esse serviço!',
          'icon'      => 'warning',
          'iconColor' => 'danger',
        ]);
      }
    }
  }
  
  public function reajuste_valores( $campo )
  {
    if($this->vlr_comissao == '')
    {
      $this->vlr_comissao = 0;
    }
    
    if($this->prc_comissao == '')
    {
      $this->prc_comissao = 0;
    }
    
    if($this->valor == '')
    {
      $this->valor = 0;
    }
    
    switch ($campo)
    {
      case 'valor':
        $this->vlr_comissao = $this->prc_comissao / 100 * $this->valor;
        break;
        
      case 'prc_comissao':
        $this->vlr_comissao = $this->prc_comissao / 100 * $this->valor;
        break;
        
        case 'vlr_comissao':
          if($this->valor == 0)
          {
            $this->vlr_comissao = 0;
          }
          else
          {
            $this->prc_comissao = $this->vlr_comissao / $this->valor * 100;
          }
        break;
    }
    $this->prc_comissao = number_format($this->prc_comissao, 2, '.', ',');
    $this->valor        = number_format($this->valor,        2, '.', ',');
    $this->vlr_comissao = number_format($this->vlr_comissao, 2, '.', ',');
  }
  
  public function reajuste_tempo( $campo )
  {
    if($this->duracao == '00:00' || $this->duracao == '')
    {
      $this->duracao = '00:30';
      $campo = 'duracao';
    }
    
    switch ($campo)
    {
      case 'end':
        $start = Carbon::parse($this->dia.' '.$this->start);
        $end   = Carbon::parse($this->dia.' '.$this->end);
        
        if($end <= $start)
        {
          $this->dispatch('swal:alert', [
            'title'     => '',
            'text'      => 'O horário final é anterior ou igual ao inicial!',
            'icon'      => 'warning',
            'iconColor' => 'yellow',
          ]);
          $this->end = Carbon::parse($this->dia.' '.$this->start)->addMinutes(30)->format('H:i');
        }
        else
        {
          $this->duracao = Carbon::today()->addMinutes($end->diffInMinutes($start))->format('H:i');
        }
        break;

      case 'duracao': 
        $this->end = Carbon::parse($this->start)->
                                      addHour(explode(':', $this->duracao)[0])->
                                      addMinutes(explode(':', $this->duracao)[1])->
                                      format('H:i');
        break;
        
    }
    $this->prc_comissao = number_format($this->prc_comissao, 2, '.', ',');
    $this->valor        = number_format($this->valor,        2, '.', ',');
    $this->vlr_comissao = number_format($this->vlr_comissao, 2, '.', ',');
  }
  
  public function store()
  {
    if($this->criar)
    {
      $agendamento = DBAgendamento::create([
        'id_empresa'       => 1,
        'start'            => Carbon::parse($this->dia.' '.$this->start)->format('Y-m-d H:i:s'),
        'end'              => Carbon::parse($this->dia.' '.$this->end)->format('Y-m-d H:i:s'),
        'id_cliente'       => $this->id_cliente,
        'id_profexec'      => $this->id_profexec,
        'id_servprod'      => $this->id_servprod,
        'id_comanda'       => null,
        'valor'            => $this->valor,
        'id_criador'       => auth()->user()->id,
        'status'           => 'Agendado',
        'obs'              => $this->obs ?? null,
        'id_venda_detalhe' => null,
        'prc_comissao'     => $this->prc_comissao,
        'vlr_comissao'     => $this->vlr_comissao,
        'grupo'            => $this->grupo ?? null,
      ]);
      
      $this->dispatch('swal:alert', [
        'title'     => 'Criado!',
        'text'      => 'Agendamento cadastrado com sucesso!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
      
      $informacao = [
        'start' => Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->startOfDay()->format('H:i'),
        'end'   => Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->endOfDay()->format('H:i'),
      ];
      
      $this->reset();
      
      $this->dispatch('fullcalendar-refresh', $informacao['start'], $informacao['end'] );
      
      $this->toggle_modal(false);
    }
  }
  
  public function render()
  {
    return view('livewire/atendimento/agendamento/agendamento-criar')->layout('layouts/bootstrap');
  }
}
