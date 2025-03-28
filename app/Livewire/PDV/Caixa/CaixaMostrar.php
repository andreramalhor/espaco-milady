<?php

namespace App\Livewire\PDV\Caixa;

use App\Models\PDV\Caixa as DBCaixa;
use Livewire\Component;

class CaixaMostrar extends Component
{
  public $id;
  public $caixa;

  protected $listeners = ['caixaUpdated' => 'refreshList'];
  
    
  public function mount()
  {
    $this->caixa = DBCaixa::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/pdv/caixa/caixa-mostrar')->layout('layouts/bootstrap');
  }
  
  public function reabrir()
  {
    dd(11114121111111);
    dd(1111111111);
    dd(1111111111);
    dd(1111111111);
  }
  
  public function validar()
  {
    dd(1111111111);
    // Atualizar dados da caixa no componente pai utilizando os IDs recebidos
    $this->caixa;
  }
}
