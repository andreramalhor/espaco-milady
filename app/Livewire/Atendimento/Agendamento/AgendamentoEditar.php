<?php

namespace App\Livewire\Atendimento\Agendamento;

use \Carbon\Carbon;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Configuracao\ColaboradorServico as DBColaboradorServico;

class AgendamentoEditar extends Component
{
  public $agendamento;
  public $modal = false;

  public $id_cliente;
  public $id_servprod;
  public $id_profexec;
  
  public $dia;
  public $start;
  public $end;
  public $duracao;
  
  public $clientes      = [];
  public $profissionais = [];
  public $servicos      = [];
  
  public $valor;
  public $prc_comissao;
  public $vlr_comissao;
  public $obs;
  
  protected $listeners = [
    'agendamentoUpdated'        => 'refreshList',
    'showModalEditar'           => 'editar_agendamento',
    'fecharModalEditar'         => 'fechar_modal',
    'chamarMetodo'              => 'remove',
    'modal-agendamento-editar'  => 'modal_agendamento_editar',
  ];
 
  public function editar_agendamento($dados)
  {
    $this->agendamento = DBAgendamento::with(['xhooqvzhbgojbtg', 'zlpekczgsltqgwg', 'hhmaqpijffgfhmj', 'eiuroereuwnofiw'])->find($dados['id']);

    $this->id_cliente   = $this->agendamento->id_cliente ?? 0;
    $this->id_servprod  = $this->agendamento->id_servprod;
    $this->id_profexec  = $this->agendamento->id_profexec;
    $this->dia         = Carbon::parse($this->agendamento->start)->setTimezone('America/Sao_Paulo')->format('Y-m-d');

    $this->start       = Carbon::parse($this->agendamento->start)->setTimezone('America/Sao_Paulo')->format('H:i');
    $this->end         = Carbon::parse($this->agendamento->end)->setTimezone('America/Sao_Paulo')->format('H:i');
    $this->duracao     = Carbon::today()->addMinutes(Carbon::parse($this->end)->diffInMinutes(Carbon::parse($this->start)))->format('H:i');
    
    $this->valor        = $this->agendamento->valor;
    $this->prc_comissao = $this->agendamento->prc_comissao;
    $this->vlr_comissao = $this->agendamento->vlr_comissao;
    $this->obs          = $this->agendamento->obs;
    
    $this->clientes      = [];
    $this->profissionais = [];
    $this->servicos      = [];
        
    $this->modal       = $dados['modal'];
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

  public function fechar_modal()
  {
    dd(8888777788);
    $this->toggle_modal(false);
  }

  public function agendamento_editar_status( $status )
  {
    $this->agendamento->timestamps = false;
    $this->agendamento->status     = $status;
    $this->agendamento->save();

    $this->toggle_modal(false);

    $this->dispatch('FullCalendar:refresh');
  }
  
  public function delete($id)
  {
    $agendamento = DBAgendamento::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $agendamento->nome,
      'text'         => 'Tem certeza que quer deletar o agendamento?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $agendamento->id,
    ]);
  }
  
  public function remove($id)
  {
    $agendamento = DBAgendamento::withTrashed()->find($id);
    
    $informacao = [
      'start' => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->startOfDay()->format('Y-m-d H:i:s'),
      'end'   => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->endOfDay()->format('Y-m-d H:i:s'),
    ];
    
    $agendamento->delete();

    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Agendamento deletado com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);

    $this->toggle_modal(false);

    $this->dispatch('fullcalendar-refresh', $informacao['start'], $informacao['end'] );

    $this->dispatch('agendamentoDeleted');
  }
  
  public function modal_agendamento_editar($id)
  {
    if (Gate::allows('Editar agendamentos'))
    {
      $dados = [
        'id'       => $id,
        'modal'    => true
      ];
  
      $this->toggle_modal(false);

      $this->dispatch('showModalEditar', $dados);
    }
    else
    {
      $this->dispatch('swal:alert', [
        'text'      => 'Vc não tem autorização para ver editar agendamentos!',
        'icon'      => 'warning',
        'iconColor' => 'red',
      ]);
    }
  }

  public function servico_selecionado( $id_servico )
  {
    dd('servico_selecionado', $id_servico);
    $servico = DBServicoProduto::find($id_servico);
    $this->vlr_venda     = $servico->vlr_venda;
    $this->vlr_negociado = $servico->vlr_venda;
    $this->tipo_preco    = $servico->tipo_preco;
  }
  
  public function profissional_selecionado( $id_profexec )
  {
    dd('profissional_selecionado', $id_profexec);
    $profissional       = DBPessoa::find($id_profexec);
    $this->id_profexec  = $profissional->id;

    $colabserv          = $profissional->aeahvtsijjoprlc->where('id_servprod', $this->id_servprod)->first();
    $this->prc_comissao = $colabserv->prc_comissao * 100;
    $this->valor        = number_format($this->percentual / 100 * str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $this->vlr_final))), 2, ',', '.');
  }

  public function buscar_servicos()
  {
    $id_profexec = $this->id_profexec;

    $this->servicos = DBServicoProduto::whereHas('smenhgskqwmdjwe', function (Builder $query) use ($id_profexec)
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
    $agendamento = $this->agendamento->update([
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
      'vlr_comissao'     => $this->prc_comissao * $this->valor,
      'grupo'            => $this->grupo ?? null,
    ]);
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Agendamento cadastrado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('atd.agendamentos')); 
  }
  
  public function render()
  {
    return view('livewire/atendimento/agendamento/agendamento-editar')->layout('layouts/bootstrap');
  }
}
