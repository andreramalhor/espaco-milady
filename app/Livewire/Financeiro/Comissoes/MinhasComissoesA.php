<?php

namespace App\Livewire\Financeiro\Comissoes;

use App\Models\Financeiro\ContaInterna as DBContaInterna;
use Livewire\Component;

class MinhasComissoesA extends Component
{
  public $id;
  public $comissoes_abertas;
  
  public function mount()
  {
    $this->id = auth()->user()->id;
    $this->comissoes_abertas = DBContaInterna::
                                                where('id_pessoa', '=', $this->id)->
                                                where('status', '=', 'Em aberto')->
                                                get();
  }
  
  public function render()
  {
    return view('livewire/financeiro/comissoes/minhas-comissoes-abertas')->layout('layouts/bootstrap');
  }
}
