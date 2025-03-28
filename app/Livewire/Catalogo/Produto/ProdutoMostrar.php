<?php

namespace App\Livewire\Catalogo\Produto;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class ProdutoMostrar extends Component
{
  public $id;
  public $produto;
  public $postId;

  public $tab_active = 'tab-painel';
  
  protected $listeners = ['produtoUpdated' => 'refreshList'];
  
  public function mount()
  {
    $this->produto = DBServicoProduto::findOrFail($this->id);
  }
  
  public function refreshList($tab=null)
  {
    $this->tab_active = $tab ?? $this->tab_active;

    $this->render();
  }
  
  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }
  
  public function render()
  {
    return view('livewire/catalogo/produto/produto-mostrar')->layout('layouts/bootstrap');
  }
  
  public function produtoFuncaoAtualizada($produto, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da produto no componente pai utilizando os IDs recebidos
    $this->produto;
  }
}
