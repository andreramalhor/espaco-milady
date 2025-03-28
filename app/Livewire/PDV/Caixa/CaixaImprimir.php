<?php

namespace App\Livewire\PDV\Caixa;

use App\Models\PDV\Caixa as DBCaixa;
use Livewire\Component;

class CaixaImprimir extends Component
{
  public $id;
  public $caixa;
    
  public function mount()
  {
    $this->caixa = DBCaixa::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/pdv/caixa/caixa-imprimir')->layout('layouts/bootstrap');
  }  
}
