<?php

namespace App\Livewire\PDV\Comanda;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class ComandaSaldo extends Component
{
  public $saldos;
  
  protected $listeners = [
    'saldos_ver' => 'saldos_ver',
  ];

  public $mostrar_saldos_desse_cliente = false;

  public function saldos_ver(DBPessoa $cliente)
  {
    $this->saldos = $cliente->saldo_conta ?? 0;

    $this->mostrar_saldos_desse_cliente = true;
  }

  public function toggle_modal()
  {
    $this->mostrar_saldos_desse_cliente = false;
  }
  
  public function adicionar_saldos()
  {
    // $dados = [
    //   'saldos' => $this->saldos,
    //   'etapa'  => 'etapa-3'
    // ];

    // if( $this->saldos < 0 )
    // {
    //   $this->dispatch('saldo_negativo_adicionar',  $dados);
    // }
    // elseif( $this->saldos > 0 )
    // {
    //   $this->dispatch('saldo_positivo_adicionar',  $dados);
    // }

    // $this->mostrar_saldos_desse_cliente = false;



    $dados = [
      'origem_adicao' => 'saldos',
      'saldo'         => $this->saldos,
      'etapa'         => 'etapa-3'
    ];

    $this->toggle_modal(false);
    
    $this->dispatch('saldos_adicionar',  $dados);    

  }

  public function render()
  {
    return view('livewire/pdv/comanda/comanda-saldos');
  }
}
