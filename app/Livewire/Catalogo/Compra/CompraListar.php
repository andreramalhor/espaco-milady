<?php

namespace App\Livewire\Catalogo\Compra;

use App\Models\Catalogo\Compra as DBCompra;
use Livewire\Component;
use Livewire\WithPagination;

class CompraListar extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_nome;
  public $p_email;
  public $p_endereco;
  public $p_telefone;

  public $tipo;
  public $id_caixa;
  public $id_usuario;
  public $id_fornecedor;
  public $qtd_produtos;
  public $vlr_prod_serv;
  public $vlr_negociados;
  public $vlr_dsc_acr;
  public $vlr_final;
  public $status;

  public $compra = [];
  public $compraId;

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['compraUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function delete($id)
  {
    $compra = DBCompra::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $compra->nome,
      'text'         => 'Tem certeza que quer deletar a compra?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $compra->id,
    ]);
  }
  
  public function remove($id)
  {
    $compra = DBCompra::withTrashed()->find($id);
    
    $filePath = public_path("stg/img/user/{$compra->id}.png");
    if (file_exists($filePath))
    {
      unlink($filePath);
      $texto = 'Compra e foto deletada com sucesso!';
    }
    
    $compra->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Compra deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Compra Deletada!');
    
    // Atualiza a lista de compras no componente CompraIndex
    $this->dispatch('compraDeleted');
  }
  
  public function listar()
  {
    $compras = DBCompra::
                        pesquisar($this->p_pesquisar)->
                        orderBy('id', 'desc')->
                        get();

    return $compras;
  }
  
  public function render()
  {
    $compras = $this->listar();
    
    return view('livewire/catalogo/compra/compra-listar', [
      'compras' => $compras,
    ])->layout('layouts/bootstrap');
  }
}
  