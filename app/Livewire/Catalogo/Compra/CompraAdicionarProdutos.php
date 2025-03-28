<?php

namespace App\Livewire\Catalogo\Compra;

use App\Models\Catalogo\Compra as DBCompra;
use App\Models\Catalogo\CompraDetalhe as DBCompraDetalhe;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class CompraAdicionarProdutos extends Component
{
  public $compra;
  public $compra_detalhes = [];

  public $produtos_fornecedor = [];
  public $produtos_comprados = [];
  public $produto;
 
  public function mount($id)
  {
    $this->compra = DBCompra::find($id);
    $this->listarItens();
    $this->compraAtualizar();

    $this->produtos_fornecedor = DBServicoProduto::where('id_fornecedor', '=', $this->compra->id_fornecedor)->orderBy('nome', 'asc')->pluck('nome', 'id');
  }
  
  public function compraAtualizar()
  {
    $this->compra->update([
      'qtd_produtos'       => $this->compra->lkerwiucqwbnlks->count(),
      'somatorio_produtos' => $this->compra->lkerwiucqwbnlks->sum('qtd'),
      'vlr_prod_serv'      => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      'vlr_negociados'     => $this->compra->lkerwiucqwbnlks->sum('vlr_negociado'),
      'vlr_dsc_acr'        => $this->compra->lkerwiucqwbnlks->sum('vlr_dsc_acr'),
      'vlr_final'          => $this->compra->lkerwiucqwbnlks->sum('vlr_final'),
      // 'status'             => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      // 'num_compra'         => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      // 'num_pedido'         => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      // 'num_nf'             => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      // 'vlr_total'          => $this->compra->lkerwiucqwbnlks->sum('vlr_total'),
      // 'vlr_desconto_total' => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      'vlr_frete_total'    => $this->compra->lkerwiucqwbnlks->sum('vlr_frete'),
      'vlr_imposto_total'  => $this->compra->lkerwiucqwbnlks->sum('vlr_imposto'),
      'vlr_custo_total'    => $this->compra->lkerwiucqwbnlks->sum('vlr_custo_total'),
      // 'obs'                => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      // 'pedido_por'         => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
      // 'conferido_por'      => $this->compra->lkerwiucqwbnlks->sum('vlr_compra'),
    ]);
  }
  
  public function listarItens()
  {
    $this->compra_detalhes = $this->compra->lkerwiucqwbnlks;
  }

  public function incluirProduto($id_produto)
  {
    $this->produto = DBServicoProduto::find($id_produto);

    $this->compra->lkerwiucqwbnlks()->create([
      'id_servprod'     => $this->produto->id, 
      'qtd'             => 1, 
      'vlr_compra'      => $this->produto->vlr_custo ?? 0, 
      'vlr_negociado'   => $this->produto->vlr_custo ?? 0, 
      'vlr_dsc_acr'     => 0, 
      'vlr_final'       => $this->produto->vlr_custo ?? 0, 
      'vlr_frete'       => 0, 
      'vlr_imposto'     => 0, 
      'vlr_custo_total' => $this->produto->vlr_custo * 1, 
      'status'          => 'Pedido',
    ]);

    $this->compraAtualizar();
    $this->listarItens();
  }
    
  public function atualizarQtd($key, $valor)
  {
    $compra_detalhe = DBCompraDetalhe::find($key);
    $compra_detalhe->update([
      'qtd'             => $valor,
      'vlr_custo_total' => $compra_detalhe->vlr_custo_total * $valor,
    ]);

    $this->compraAtualizar();
  }

  public function atualizarVlrCusto($key, $valor)
  {
    $compra_detalhe = DBCompraDetalhe::find($key);
    $compra_detalhe->update([
      'vlr_negociado'   => $valor,
      'vlr_custo_total' => $compra_detalhe->qtd * $valor,
    ]);

    $this->compraAtualizar();
  }

  public function atualizarValor($key)
  {
    $this->produtos_comprados[$key]["subtotal"] = $this->produtos_comprados[$key]["quantidade"] * $this->produtos_comprados[$key]["vlr_custo"];
  }

  public function removerItem($key)
  {
    $this->compra->lkerwiucqwbnlks()->where('id', $key)->first()->delete();

    $this->compraAtualizar();
    $this->listarItens();

    $this->dispatch('swal:alert', [
      'title'     => 'Item removido!',
      'text'      => 'Item removido com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }

  public function render()
  {
    return view('livewire/catalogo/compra/auxiliar/compra-criar-adicionar-produtos')->layout('layouts/bootstrap');
  }
}
  