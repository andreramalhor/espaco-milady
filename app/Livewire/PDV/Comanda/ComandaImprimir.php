<?php

namespace App\Livewire\PDV\Comanda;

use App\Models\PDV\Comanda as DBComanda;
use Livewire\Component;

class ComandaImprimir extends Component
{
  public $id;
  public $comanda;
    
  public function mount()
  {
    $this->comanda = DBComanda::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/pdv/comanda/comanda-imprimir')->layout('layouts/bootstrap');
  }  
}
