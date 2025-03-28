<?php

namespace App\Livewire\Catalogo\Compra;

use App\Models\Catalogo\Compra as DBCompra;
use App\Models\Catalogo\CompraDetalhe as DBCompraDetalhe;
use Livewire\Component;

class CompraMostrar extends Component
{
  public $id;
  public $compra;

  public $num_pedido;
  public $num_nf;
  public $dt_nf;

  public $tab_active = 'tab-sobre';
  
  protected $listeners = ['compraUpdated' => 'refreshList'];
  
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
    $this->compra = DBCompra::findOrFail($this->id);
    $this->num_pedido = $this->compra->num_pedido;
  }

  public function confirmarChegadaProduto($id)
  {
    $produto = DBCompraDetalhe::findOrFail($id);
    $produto->update([
      'status'              => 'Confirmado',
      'id_user_confirmacao' => auth()->user()->id,
    ]);
  }

  public function concluirCompra()
  {
    $this->compra->update([
      'status'     => 'Concluído',
      'num_pedido' => $this->num_pedido,
      'num_nf'     => $this->num_nf,
      'dt_nf'      => $this->dt_nf,
    ]);

    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Compra concluída com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('cat.compras')); 

  }
  
  public function render()
  {
    return view('livewire/catalogo/compra/compra-mostrar')->layout('layouts/bootstrap');
  }
  
  public function compraFuncaoAtualizada($compra, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da compra no componente pai utilizando os IDs recebidos
    $this->compra;
  }
}
