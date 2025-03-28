<?php

namespace App\Livewire\Atendimento\Agendamento;

use Livewire\Component;

use App\Models\Atendimento\Agendamento as DBAgendamento;

class AgendamentoFixas extends Component
{
  public $fixas;
  public $auth_id;
  public $clientes_fixos;
  
  public $cliente;
  public $servico;
  public $ano_selecionado = 2025;
  public $agendamentos_selecionado;
  public $servicos_do_cliente;

  protected $listeners = [
    'showModalFixas' => 'showModalFixasHandler',
  ];

  public function mount()
  {
    $this->fixas = DBAgendamento::whereNotNull('grupo')->get();
  }

  public function selecionar_perfil($perfil_selecionado=null): void
  {
    if($perfil_selecionado!=null)
    {
      $this->perfil_selecionado = $perfil_selecionado;

      $this->fixas_perfil_selecionado = $this->fixas_perfil_selecionado();
    }
  }

  public function teste($id_cliente)
  {
    $this->cliente = $id_cliente;
    $this->servicos_do_cliente = DBAgendamento::whereNotNull('grupo')->where('id_cliente', '=', $id_cliente)->get();
  }
  
  public function fixas_perfil_selecionado()
  {
    return DBFixas::
                        where('auth_user', auth()->user()->id)->
                        where('nome_fixas', $this->perfil_selecionado)->
                        orderBy('fixas', 'asc')->
                        get();
  }

  public function render()
  {
    $fixas  = $this->fixas;
    $this->agendamentos_selecionado = DBAgendamento::whereNotNull('grupo')->whereYear('start', $this->ano_selecionado)->where('id_cliente', '=', $this->cliente)->where('id_servprod', '=', $this->servico)->get();

    return view('livewire/atendimento/agendamento/agendamento-fixas', [
      'fixas ' => $fixas ,
    ])->layout('layouts/bootstrap');
  }
}
