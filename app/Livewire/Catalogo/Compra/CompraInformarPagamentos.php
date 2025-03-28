<?php

namespace App\Livewire\Catalogo\Compra;

use App\Models\Catalogo\Compra as DBCompra;
use Livewire\Component;

class CompraInformarPagamentos extends Component
{
  public $compra;
 
  public $id_forma_pagamento = 1;
  public $parcela = 1;
  public $valor_amigavel;
  public $valor;
  public $dt_prevista;

  public $parcelas_temp = [];
 
  public function mount($id)
  {
    $this->compra      = DBCompra::find($id);
    $this->dt_prevista = \Carbon\Carbon::today()->format('Y-m-d');
    $this->recalcularValor();
    
    // $this->listarItens();
    // $this->compraAtualizar();

    // $this->produtos_fornecedor = DBServicoProduto::where('id_fornecedor', '=', $this->compra->id_fornecedor)->orderBy('nome', 'asc')->pluck('nome', 'id');
  }
  
  public function recalcularValor()
  {
    $this->valor = $this->compra->vlr_custo_total / $this->parcela;
    $this->valor_amigavel = number_format($this->compra->vlr_custo_total / $this->parcela, 2, ',', '.' );
  }

  public function gerarParcelas()
  {
    $this->parcelas_temp = [];
    
    $dt_prevista = \Carbon\Carbon::parse($this->dt_prevista)->addMonth(0);

    for ($i=0; $i < $this->parcela; $i++)
    {
      $parcela     = $i + 1;

      $this->parcelas_temp[$parcela] = [
        'id_forma_pagamento' => $this->id_forma_pagamento,
        'parcela'            => $parcela.'/'.$this->parcela,
        'valor'              => $this->valor ?? 0,
        'dt_prevista'        => $dt_prevista,
        'status'             => 'Em aberto',
      ];

      $dt_prevista = \Carbon\Carbon::parse($dt_prevista)->addMonth(1);
    }
  }
  
  public function gravarParcelas()
  {
    foreach($this->parcelas_temp as $parcela)
    {
      $this->compra->knweohweirhwqeq()->create($parcela);
    }
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Pagamentos cadastrados com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('cat.compras')); 
  }

  
// 73777153000113
// IMEST;
// 165,00


  
  // public function listarItens()
  // {
  //   $this->compra_detalhes = $this->compra->lkerwiucqwbnlks;
  // }

  // public function incluirProduto($id_produto)
  // {
  //   $this->produto = DBServicoProduto::find($id_produto);

  //   $this->compra->lkerwiucqwbnlks()->create([
  //     'id_servprod'     => $this->produto->id, 
  //     'qtd'             => 1, 
  //     'vlr_compra'      => $this->produto->vlr_custo ?? 0, 
  //     'vlr_negociado'   => $this->produto->vlr_custo ?? 0, 
  //     'vlr_dsc_acr'     => 0, 
  //     'vlr_final'       => $this->produto->vlr_custo ?? 0, 
  //     'vlr_frete'       => 0, 
  //     'vlr_imposto'     => 0, 
  //     'vlr_custo_total' => $this->produto->vlr_custo * 1, 
  //     'status'          => 'Pedido',
  //   ]);

  //   $this->compraAtualizar();
  //   $this->listarItens();
  // }
    
  // public function atualizarQtd($key, $valor)
  // {
  //   $compra_detalhe = DBCompraDetalhe::find($key);
  //   $compra_detalhe->update([
  //     'qtd'             => $valor,
  //     'vlr_custo_total' => $compra_detalhe->vlr_custo_total * $valor,
  //   ]);

  //   $this->compraAtualizar();
  // }

  // public function atualizarVlrCusto($key, $valor)
  // {
  //   $compra_detalhe = DBCompraDetalhe::find($key);
  //   $compra_detalhe->update([
  //     'vlr_negociado'   => $valor,
  //     'vlr_custo_total' => $compra_detalhe->qtd * $valor,
  //   ]);

  //   $this->compraAtualizar();
  // }

  // public function atualizarValor($key)
  // {
  //   $this->produtos_comprados[$key]["subtotal"] = $this->produtos_comprados[$key]["quantidade"] * $this->produtos_comprados[$key]["vlr_custo"];
  // }

  // public function removerItem($key)
  // {
  //   $this->compra->lkerwiucqwbnlks()->where('id', $key)->first()->delete();

  //   $this->compraAtualizar();
  //   $this->listarItens();

  //   $this->dispatch('swal:alert', [
  //     'title'     => 'Item removido!',
  //     'text'      => 'Item removido com sucesso!',
  //     'icon'      => 'success',
  //     'iconColor' => 'green',
  //   ]);
  // }

  public function render()
  {
    return view('livewire/catalogo/compra/auxiliar/compra-criar-informar-pagamentos')->layout('layouts/bootstrap');
  }
}
  