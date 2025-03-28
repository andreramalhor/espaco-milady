<?php

namespace App\Livewire\Comercial\Venda;

use Livewire\Component;
use App\Models\Comercial\Venda as DBComanda;

class VendaEditar extends Component
{
  public $venda;

  public $id_produtor;
  public $contrato_assinado;
  public $tipo_produto;
  public $nome_produto;
  public $plano;
  public $vlr_unitario;
  public $frete;
  public $quantidade;
  public $dt_parcela_1;
  public $vlr_parcela_1;
  public $forma_parcela_1;
  public $status_parcela_1;
  public $perc_comissao_1;
  public $dt_parcela_2;
  public $vlr_parcela_2;
  public $forma_parcela_2;
  public $status_parcela_2;
  public $perc_comissao_2;
  public $dt_parcela_3;
  public $vlr_parcela_3;
  public $forma_parcela_3;
  public $status_parcela_3;
  public $perc_comissao_3;
  public $total_pago;
  public $conta_pagamento;
  public $forma_pagamento;
  public $estoque_nosso;
  public $telefone;
  public $cnpj;
  public $inscricao_estadual;
  public $id_vendedor;
  public $quem_fechou;
  public $vlr_pago_comissao;
  public $dt_pgto_comissao;
  public $couple;
  public $cor_capsula;
  public $frasco;
  public $cor_tampa;
  public $obs_produto;
  public $nota_fiscal;
  public $pedido_feito;
  
  public function mount($id)
  {
    $this->venda = DBComanda::findOrFail($id);
    $this->id_produtor        = $this->venda->id_produtor;
    $this->contrato_assinado  = $this->venda->contrato_assinado;
    $this->tipo_produto       = $this->venda->tipo_produto;
    $this->nome_produto       = $this->venda->nome_produto;
    $this->plano              = $this->venda->plano;
    $this->vlr_unitario       = $this->venda->vlr_unitario;
    $this->frete              = $this->venda->frete;
    $this->quantidade         = $this->venda->quantidade;
    $this->dt_parcela_1       = $this->venda->dt_parcela_1;
    $this->vlr_parcela_1      = $this->venda->vlr_parcela_1;
    $this->forma_parcela_1    = $this->venda->forma_parcela_1;
    $this->status_parcela_1   = $this->venda->status_parcela_1;
    $this->dt_parcela_2       = $this->venda->dt_parcela_2;
    $this->vlr_parcela_2      = $this->venda->vlr_parcela_2;
    $this->perc_comissao_1    = $this->venda->perc_comissao_1;
    $this->forma_parcela_2    = $this->venda->forma_parcela_2;
    $this->forma_parcela_2    = $this->venda->forma_parcela_2;
    $this->status_parcela_2   = $this->venda->status_parcela_2;
    $this->dt_parcela_3       = $this->venda->dt_parcela_3;
    $this->perc_comissao_2    = $this->venda->perc_comissao_2;
    $this->vlr_parcela_3      = $this->venda->vlr_parcela_3;
    $this->forma_parcela_3    = $this->venda->forma_parcela_3;
    $this->forma_parcela_3    = $this->venda->forma_parcela_3;
    $this->status_parcela_3   = $this->venda->status_parcela_3;
    $this->perc_comissao_3    = $this->venda->perc_comissao_3;
    $this->total_pago         = $this->venda->total_pago;
    $this->conta_pagamento    = $this->venda->conta_pagamento;
    $this->forma_pagamento    = $this->venda->forma_pagamento;
    $this->estoque_nosso      = $this->venda->estoque_nosso;
    $this->telefone           = $this->venda->telefone;
    $this->cnpj               = $this->venda->cnpj;
    $this->inscricao_estadual = $this->venda->inscricao_estadual;
    $this->id_vendedor        = $this->venda->id_vendedor;
    $this->quem_fechou        = $this->venda->quem_fechou;
    $this->vlr_pago_comissao  = $this->venda->vlr_pago_comissao;
    $this->dt_pgto_comissao   = $this->venda->dt_pgto_comissao;
    $this->couple             = $this->venda->couple;
    $this->cor_capsula        = $this->venda->cor_capsula;
    $this->frasco             = $this->venda->frasco;
    $this->cor_tampa          = $this->venda->cor_tampa;
    $this->obs_produto        = $this->venda->obs_produto;
    $this->nota_fiscal        = $this->venda->nota_fiscal;
    $this->pedido_feito       = $this->venda->pedido_feito;
}

  protected function rules()
  {
    return [
      'nome'  => 'required|min:3',
      'grupo' => 'required|min:6',
    ];
  }

  public function edit()
  {
    $this->validate();
    
    $venda = DBComanda::findOrFail($this->venda->id);
    $venda->update([
      $this->id_produtor        = $this->venda->id_produtor,
      $this->contrato_assinado  = $this->venda->contrato_assinado,
      $this->tipo_produto       = $this->venda->tipo_produto,
      $this->nome_produto       = $this->venda->nome_produto,
      $this->plano              = $this->venda->plano,
      $this->vlr_unitario       = $this->venda->vlr_unitario,
      $this->frete              = $this->venda->frete,
      $this->quantidade         = $this->venda->quantidade,
      $this->dt_parcela_1       = $this->venda->dt_parcela_1,
      $this->vlr_parcela_1      = $this->venda->vlr_parcela_1,
      $this->forma_parcela_1    = $this->venda->forma_parcela_1,
      $this->status_parcela_1   = $this->venda->status_parcela_1,
      $this->dt_parcela_2       = $this->venda->dt_parcela_2,
      $this->vlr_parcela_2      = $this->venda->vlr_parcela_2,
      $this->perc_comissao_1    = $this->venda->perc_comissao_1,
      $this->forma_parcela_2    = $this->venda->forma_parcela_2,
      $this->forma_parcela_2    = $this->venda->forma_parcela_2,
      $this->status_parcela_2   = $this->venda->status_parcela_2,
      $this->dt_parcela_3       = $this->venda->dt_parcela_3,
      $this->perc_comissao_2    = $this->venda->perc_comissao_2,
      $this->vlr_parcela_3      = $this->venda->vlr_parcela_3,
      $this->forma_parcela_3    = $this->venda->forma_parcela_3,
      $this->forma_parcela_3    = $this->venda->forma_parcela_3,
      $this->status_parcela_3   = $this->venda->status_parcela_3,
      $this->perc_comissao_3    = $this->venda->perc_comissao_3,
      $this->total_pago         = $this->venda->total_pago,
      $this->conta_pagamento    = $this->venda->conta_pagamento,
      $this->forma_pagamento    = $this->venda->forma_pagamento,
      $this->estoque_nosso      = $this->venda->estoque_nosso,
      $this->telefone           = $this->venda->telefone,
      $this->cnpj               = $this->venda->cnpj,
      $this->inscricao_estadual = $this->venda->inscricao_estadual,
      $this->id_vendedor        = $this->venda->id_vendedor,
      $this->quem_fechou        = $this->venda->quem_fechou,
      $this->vlr_pago_comissao  = $this->venda->vlr_pago_comissao,
      $this->dt_pgto_comissao   = $this->venda->dt_pgto_comissao,
      $this->couple             = $this->venda->couple,
      $this->cor_capsula        = $this->venda->cor_capsula,
      $this->frasco             = $this->venda->frasco,
      $this->cor_tampa          = $this->venda->cor_tampa,
      $this->obs_produto        = $this->venda->obs_produto,
      $this->nota_fiscal        = $this->venda->nota_fiscal,
      $this->pedido_feito       = $this->venda->pedido_feito,
    ]);    
    
    $this->dispatch('swal:alert', [
      'title'     => 'Editado!',
      'text'      => 'Venda editada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('com.vendas.index')); 
  }

  public function render()
  {
    return view('livewire/comercial/venda/venda-editar')->layout('layouts/bootstrap');
  }
}
