<?php

namespace App\Livewire\PDV\Comanda;

use App\Models\PDV\Comanda as DBComanda;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use Livewire\Component;

class ComandaAgendamentos2 extends Component
{
  public $id;
  public $comanda;
  public $agendamentos;
  public $adicionando = [];
  
  public $modal_titulo = 'Agendamentos';
  public $modal_evento = 'modal-comanda-agendamentos';

  protected $listeners = [
    'agendamentos_ver' => 'agendamentos_ver',
  ];

  public $mostrar_agendamentos_desse_cliente = false;

  public function agendamentos_ver($id_cliente)
  {
    $this->agendamentos = DBAgendamento::
                                        whereBetween('start', [
                                          \Carbon\Carbon::today()->startOfDay(),
                                          \Carbon\Carbon::today()->endOfDay()
                                        ])->
                                        where('id_cliente', '=', $id_cliente)->
                                        get();

    $this->adicionando = $this->agendamentos->pluck('id');
    
    if($this->agendamentos->count() > 0)
    {
      $this->mostrar_agendamentos_desse_cliente = true;
    }
    else
    {
      $this->mostrar_agendamentos_desse_cliente = false;
    }
  }

  public function toggle_modal()
  {
    $this->mostrar_agendamentos_desse_cliente = false;
  }

  public function toogle_agendamento( $id_agendamento ) 
  {
    if ($this->adicionando->contains($id_agendamento))
    {
      $this->adicionando->pull($this->adicionando->search($id_agendamento));
    }
    else
    {
      $this->adicionando->push($id_agendamento);
    }
  }
  
  public function adicionar_agendados()
  {
    $dados = [
      'origem_adicao' => 'agendamentos',
      'agendamentos'  => DBAgendamento::find([$this->adicionando]),
      'fase'          => 'fase-2'
    ];

    $this->dispatch('agendamentos_adicionar',  $dados);

    $this->mostrar_agendamentos_desse_cliente = false;
  }

  public function render()
  {
    return view('livewire/pdv/comanda/comanda-agendamentos');
  }
  
  public function adicionar()
  {

    dd(1111111111);
    // Atualizar dados da comanda no componente pai utilizando os IDs recebidos
    $this->comanda;
  }
}
