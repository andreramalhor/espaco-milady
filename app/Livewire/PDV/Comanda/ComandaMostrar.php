<?php

namespace App\Livewire\PDV\Comanda;

use App\Models\PDV\Comanda as DBComanda;
use Livewire\Component;

class ComandaMostrar extends Component
{
  public $comanda;
  public $modal;

  protected $listeners = [
    'pdv-comanda-comandamostrar' => 'reabrir',
    'fechar_modal' => 'fechar_modal'
  ];
  
  public function reabrir( $id )
  {
    $this->comanda = DBComanda::findOrFail($id);
    
    $this->modal = true;
  }
  
  public function fechar_modal( $status=false)
  {
    $this->modal = $status;
  }

  public function render()
  {
    return view('livewire/pdv/comanda/comanda-mostrar-modal')->layout('layouts/bootstrap');
  }
}