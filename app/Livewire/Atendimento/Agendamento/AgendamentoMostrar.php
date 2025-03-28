<?php

namespace App\Livewire\Atendimento\Agendamento;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Configuracao\ColaboradorServico as DBColaboradorServico;

class AgendamentoMostrar extends Component
{
  public $agendamento;
  public $modal = false;

  public $id_cliente;
  public $id_servprod;
  public $id_profexec;
  public $start;
  public $end;
  
  public $clientes      = [];
  public $profissionais = [];
  public $servicos      = [];
  
  public $valor;
  public $duracao;
  public $prc_comissao;
  public $vlr_comissao;
  
  protected $listeners = [
    'agendamentoUpdated'        => 'refreshList',
    'showModalMostrar'          => 'mostrar_agendamento',
    'fecharModalMostrar'        => 'fechar_modal',
    'chamarMetodo'              => 'remove',
    'modal-agendamento-editar'  => 'modal_agendamento_editar',
  ];
 
  public function mostrar_agendamento($dados)
  {
    $this->agendamento = DBAgendamento::with(['xhooqvzhbgojbtg', 'zlpekczgsltqgwg', 'hhmaqpijffgfhmj', 'eiuroereuwnofiw'])->find($dados['id']);
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

    $informacao = [
      'start' => \Carbon\Carbon::parse($this->agendamento->start)->setTimezone('America/Sao_Paulo')->startOfDay()->format('Y-m-d H:i:s'),
      'end'   => \Carbon\Carbon::parse($this->agendamento->start)->setTimezone('America/Sao_Paulo')->endOfDay()->format('Y-m-d H:i:s'),
    ];

    $this->dispatch('fullcalendar-refresh', $informacao['start'], $informacao['end'] );

    $this->toggle_modal(false);
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
    $agendamento = DBAgendamento::find($id);

    $informacao = [
      'start' => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->startOfDay()->format('Y-m-d H:i:s'),
      'end'   => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->endOfDay()->format('Y-m-d H:i:s'),
    ];

    $agendamento->delete();

    $this->dispatch('fullcalendar-refresh', $informacao['start'], $informacao['end'] );

    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Agendamento deletado com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);

    $this->toggle_modal(false);

    // Atualiza a lista de agendamentos no componente AgendamentoIndex
    // $this->dispatch('agendamentoDeleted');
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

      $this->duracao      = $escolhido->eirtuqweendaksa->duracao;
      $this->prc_comissao = $escolhido->prc_comissao;
      $this->valor        = $escolhido->eirtuqweendaksa->vlr_venda;
      $this->vlr_comissao = $this->prc_comissao * $this->valor;

      $this->end = \Carbon\Carbon::parse($this->start)->
                                    addHour(explode(':', $this->duracao)[0])->
                                    addMinutes(explode(':', $this->duracao)[1])->
                                    addSeconds(explode(':', $this->duracao)[2])->
                                    format('Y-m-d H:i:s');
    }
  }
  
  public function store()
  {
    $agendamento = DBAgendamento::create([
      'id_empresa'       => 1,
      'start'            => $this->start,
      'end'              => $this->end,
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
    return view('livewire/atendimento/agendamento/agendamento-mostrar')->layout('layouts/bootstrap');
  }
}
