<?php

namespace App\Livewire\Catalogo\Compra;

use Livewire\Component;
use App\Models\Catalogo\Compra as DBCompra;

class CompraCriar extends Component
{
  public $dt_compra;
  public $num_compra;
  public $num_pedido;
  public $num_nf;
  public $id_fornecedor;
  public $vlr_total;
  public $vlr_desconto_total;
  public $vlr_frete_total;
  public $status;
  public $obs;
  public $pedido_por;
  public $conferido_por;
  public $tipo;
  public $id_caixa;
  public $id_usuario;
  public $qtd_produtos;
  public $vlr_prod_serv;
  public $vlr_negociados;
  public $vlr_dsc_acr;
  public $vlr_final;
    
  protected $listeners = ['compraUpdated' => 'refreshList'];

  public function refreshList()
  {
    $this->render();
  }
  
  public function mount()
  {
    $this->dt_compra = \Carbon\Carbon::today()->format('Y-m-d');
  }

  public function rules() 
  {
    return [
      'id_fornecedor' => 'required',
    ];
  }

  public function gravarCompra()
  {
    $this->validate();
    
    $compra = DBCompra::create([
      'dt_compra'          => $this->dt_compra,
      'num_compra'         => $this->num_compra,
      'num_pedido'         => $this->num_pedido,
      'num_nf'             => $this->num_nf,

      'vlr_total'          => $this->vlr_total,
      'vlr_desconto_total' => $this->vlr_desconto_total,
      'vlr_frete_total'    => $this->vlr_frete_total,
      'obs'                => $this->obs,

      'tipo'               => 'Compra',
      'id_caixa'           => null,
      'id_usuario'         => auth()->user()->id,
      'id_fornecedor'      => $this->id_fornecedor,
      'qtd_produtos'       => 0,
      'vlr_prod_serv'      => 0,
      'vlr_negociados'     => 0,
      'vlr_dsc_acr'        => 0,
      'vlr_final'          => 0,
      'status'             => 'Aberto',
      'vlr_custo_total'    => 0,

      'pedido_por'         => auth()->user()->id,
      'conferido_por'      => $this->conferido_por,
    ]);
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Compra cadastrada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('cat.compras')); 
  }
  
  public function render()
  {    
    return view('livewire/catalogo/compra/compra-criar')->layout('layouts/bootstrap');
  }
}
