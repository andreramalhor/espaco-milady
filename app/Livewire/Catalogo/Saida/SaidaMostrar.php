<?php

namespace App\Livewire\Catalogo\Saida;

use App\Models\Catalogo\Saida as DBSaida;
use Livewire\Component;

class SaidaMostrar extends Component
{
  public $id;
  public $saida;

  public $tab_active = 'tab-sobre';
  
  protected $listeners = ['saidaUpdated' => 'refreshList'];
  
  public function refreshList($tab=null)
  {
    $this->tab_active = $tab ?? $this->tab_active;

    $this->render();
  }
  
  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }
  
  public function mount()
  {
    $this->saida = DBSaida::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/catalogo/saida/saida-mostrar')->layout('layouts/bootstrap');
  }
  
  public function saidaFuncaoAtualizada($saida, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da saida no componente pai utilizando os IDs recebidos
    $this->saida;
  }
}
