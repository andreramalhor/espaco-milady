<?php

namespace App\Livewire\Catalogo\Saida;

use App\Models\Catalogo\Saida as DBSaida;
use App\Models\Catalogo\SaidaDetalhe as DBSaidaDetalhe;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class SaidaRetirarProdutos extends Component
{
  public $saida;
  public $saida_detalhes;

  public $produtos_fornecedor = [];
  public $lista_produtos;
  public $produtos;
 
  public function mount($id)
  {
    $this->saida = DBSaida::find($id);

    // $this->listarItens();

    // $this->produtos_saida =;
    // dd($this->produtos_saida);


    // $this->produtos_fornecedor = DBServicoProduto::orderBy('nome', 'asc')->pluck('nome', 'id');
    // $this->produtos_fornecedor = DBServicoProduto::orderBy('nome', 'asc')->get();
  }
  
  // public function saidaAtualizar()
  // {
  //   $this->saida->update([
  //     'qtd_produtos'       => $this->saida->lkerwiucqwbnlks->count(),
  //     'somatorio_produtos' => $this->saida->lkerwiucqwbnlks->sum('qtd'),
  //     'vlr_prod_serv'      => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     'vlr_negociados'     => $this->saida->lkerwiucqwbnlks->sum('vlr_negociado'),
  //     'vlr_dsc_acr'        => $this->saida->lkerwiucqwbnlks->sum('vlr_dsc_acr'),
  //     'vlr_final'          => $this->saida->lkerwiucqwbnlks->sum('vlr_final'),
  //     // 'status'             => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     // 'num_saida'         => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     // 'num_pedido'         => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     // 'num_nf'             => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     // 'vlr_total'          => $this->saida->lkerwiucqwbnlks->sum('vlr_total'),
  //     // 'vlr_desconto_total' => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     'vlr_frete_total'    => $this->saida->lkerwiucqwbnlks->sum('vlr_frete'),
  //     'vlr_imposto_total'  => $this->saida->lkerwiucqwbnlks->sum('vlr_imposto'),
  //     'vlr_custo_total'    => $this->saida->lkerwiucqwbnlks->sum('vlr_custo_total'),
  //     // 'obs'                => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     // 'pedido_por'         => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //     // 'conferido_por'      => $this->saida->lkerwiucqwbnlks->sum('vlr_saida'),
  //   ]);

  //   // $this->listarItens();
  // }
  
  // public function listarItens()
  // {
  //   foreach($this->saida->lkerwiucqwbnlks as $item)
  //   {
  //     $this->produtos_saida[$item->id_servprod] = $item->qtd;
  //   }
  // }

  public function incluirProduto($id_produto, $quantidade)
  {
    $this->produtos = DBServicoProduto::find($id_produto);

    $this->saida->lkerwiucqwbnlks()->create([
      'id_servprod'     => $this->produtos->id, 
      'qtd'             => $quantidade, 
      'vlr_saida'       => $this->produtos->vlr_custo ?? 0, 
      'vlr_negociado'   => $this->produtos->vlr_custo ?? 0, 
      'vlr_dsc_acr'     => 0, 
      'vlr_final'       => $this->produtos->vlr_custo ?? 0, 
      'vlr_frete'       => 0, 
      'vlr_imposto'     => 0, 
      'vlr_custo_total' => $this->produtos->vlr_custo ?? 0, 
      'status'          => 'Retirado',
    ]);

    // $this->saidaAtualizar();
    // $this->listarItens();
  }

  
  public function atualizarQtd($id, $op, $qtd)
  {
    if($this->saida->lkerwiucqwbnlks->contains('id_servprod', $id))
    {
      if($qtd == 0)
      {
        $detlahe = $this->saida->lkerwiucqwbnlks->where('id_servprod', '=', $id)->first();
        $detlahe->delete();
      }
      else
      {
        $this->saida->lkerwiucqwbnlks->where('id_servprod', '=', $id)->first()->update(['qtd' => $qtd]);
      }
    }
    else
    {
      $this->incluirProduto($id, $qtd);
    }
    
    $this->dispatch('swal:alert', [
      'title'     => 'Confirmado!',
      'text'      => 'Gravado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);


    // if (!isset($this->produtos_saida[$id]) || $qtd == 0)
    // {
    //   $this->produtos_saida[$id] = $qtd;
    // }

    // if($op == 'subtração')
    // {
    //   if($this->produtos_saida[$id] * 1 > 0)
    //   {
    //     $this->produtos_saida[$id] = ($this->produtos_saida[$id] * 1 ) - $qtd;
    //   }
    // }
    // else if($op == 'soma')
    // {
    //   $this->produtos_saida[$id] = ($this->produtos_saida[$id] * 1 ) + $qtd;
    // }
    // else if($op == 'total')
    // {
    //   $this->produtos_saida[$id] = $qtd * 1;
    // }
  }

  // public function atualizarValor($key)
  // {
  //   $this->saida_detalhe[$key]["subtotal"] = $this->saida_detalhe[$key]["quantidade"] * $this->saida_detalhe[$key]["vlr_custo"];
  // }
  
  
  // public function gravarTudo()
  // {
  //   foreach ($this->produtos_saida as $id => $quantidade)
  //   {
  //     $novoItem = new DBSaidaDetalhe([
  //       'id_servprod'     => $id,
  //       'qtd'             => $quantidade,
  //       'vlr_saida'       => 0,
  //       'vlr_negociado'   => 0,
  //       'vlr_dsc_acr'     => 0,
  //       'vlr_final'       => 0,
  //       'vlr_frete'       => 0,
  //       'vlr_imposto'     => 0,
  //       'vlr_custo_total' => 0,
  //       'vlr_frete'       => 0,
  //       'status'          => 'Pedido',
  //     ]);
  
  //     $this->saida->lkerwiucqwbnlks()->save($novoItem);
  //   }
  // }

  // public function removerItem($key)
  // {
  //   $this->saida->lkerwiucqwbnlks()->where('id', $key)->first()->delete();

  //   $this->saidaAtualizar();
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
    $this->saida_detalhes  = $this->saida->lkerwiucqwbnlks;
    $this->lista_produtos  = DBServicoProduto::orderBy('nome', 'asc')->with(['qoiwejgewfbskas', 'oasfeoauwdwbsas'])->get();

    return view('livewire/catalogo/saida/auxiliar/saida-criar-retirar-produtos', 
    [
      'saida_detalhes' => $this->saida_detalhes,
      'lista_produtos' => $this->lista_produtos,
    ])->layout('layouts/bootstrap');
  }
}
  