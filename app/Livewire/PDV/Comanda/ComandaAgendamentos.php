<?php

namespace App\Livewire\PDV\Comanda;

use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use Livewire\Component;

class ComandaAgendamentos extends Component
{
  public $agendamentos;
  public $adicionando = [];
  public $modal_agendamentos = false;
  public $etapa = 'etapa-2';
  
  protected $listeners = [
    'agendamentos_ver' => 'agendamentos_ver',
  ];
  
  public function agendamentos_ver(DBPessoa $cliente,  $etapa=null)
  {
    $this->etapa        = $etapa;
    $this->agendamentos = $cliente->agendamentos_hoje;

    $this->adicionando  = $this->agendamentos->pluck('id');
    
    if($this->agendamentos->count() > 0)
    {
      $this->toggle_modal(true);
    }
    else
    {
      $this->toggle_modal(false);
    }
  }

  public function toggle_modal( $torf )
  {
    $this->modal_agendamentos = $torf;
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
      'etapa'         => $this->etapa
    ];

    $this->toggle_modal(false);
    
    $this->dispatch('agendamentos_adicionar',  $dados);    
  }

  public function render()
  {
    return view('livewire/pdv/comanda/comanda-agendamentos');
  }
}
