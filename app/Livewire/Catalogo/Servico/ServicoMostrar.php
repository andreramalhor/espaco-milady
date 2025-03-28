<?php

namespace App\Livewire\Catalogo\Servico;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class ServicoMostrar extends Component
{
  public $id;
  public $servico;
  public $postId;

  public $tab_active = 'tab-painel';
  
  protected $listeners = ['servicoUpdated' => 'refreshList'];
  
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
    $this->servico = DBServicoProduto::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/catalogo/servico/servico-mostrar')->layout('layouts/bootstrap');
  }
  
  public function servicoFuncaoAtualizada($servico, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da servico no componente pai utilizando os IDs recebidos
    $this->servico;
  }
}
