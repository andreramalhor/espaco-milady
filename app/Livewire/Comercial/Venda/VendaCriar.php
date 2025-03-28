<?php

namespace App\Livewire\Comercial\Venda;

use Livewire\Component;
use App\Models\Comercial\Venda as DBComanda;

class VendaCriar extends Component
{
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

  public $tab_active = 'tab-produto';

  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }

  protected function rules()
  {
    return [
      'id_produtor'  => 'required|min:1',
    ];
  }

  public function store()
  {
    $this->validate();
    
    $venda = DBComanda::create([
      'id_produtor'        => $this->id_produtor,
      'contrato_assinado'  => $this->contrato_assinado,
      'tipo_produto'       => $this->tipo_produto,
      'nome_produto'       => $this->nome_produto,
      'plano'              => $this->plano,
      'vlr_unitario'       => $this->vlr_unitario,
      'frete'              => $this->frete,
      'quantidade'         => $this->quantidade,
      'dt_parcela_1'       => $this->dt_parcela_1,
      'vlr_parcela_1'      => $this->vlr_parcela_1,
      'forma_parcela_1'    => $this->forma_parcela_1,
      'statsu_parcela_1'   => $this->statis_parcela_1,
      'perc_comissao_1'    => $this->perc_comissao_1,
      'dt_parcela_2'       => $this->dt_parcela_2,
      'vlr_parcela_2'      => $this->vlr_parcela_2,
      'forma_parcela_2'    => $this->forma_parcela_2,
      'statsu_parcela_2'   => $this->statis_parcela_2,
      'perc_comissao_2'    => $this->perc_comissao_2,
      'dt_parcela_3'       => $this->dt_parcela_3,
      'vlr_parcela_3'      => $this->vlr_parcela_3,
      'forma_parcela_3'    => $this->forma_parcela_3,
      'statsu_parcela_3'   => $this->statis_parcela_3,
      'perc_comissao_3'    => $this->perc_comissao_3,
      'total_pago'         => $this->total_pago,
      'conta_pagamento'    => $this->conta_pagamento,
      'forma_pagamento'    => $this->forma_pagamento,
      'estoque_nosso'      => $this->estoque_nosso,
      'telefone'           => $this->telefone,
      'cnpj'               => $this->cnpj,
      'inscricao_estadual' => $this->inscricao_estadual,
      'id_vendedor'        => $this->id_vendedor,
      'quem_fechou'        => $this->quem_fechou,
      'vlr_pago_comissao'  => $this->vlr_pago_comissao,
      'dt_pgto_comissao'   => $this->dt_pgto_comissao,
      'couple'             => $this->couple,
      'cor_capsula'        => $this->cor_capsula,
      'frasco'             => $this->frasco,
      'cor_tampa'          => $this->cor_tampa,
      'obs_produto'        => $this->obs_produto,
      'nota_fiscal'        => $this->nota_fiscal,
      'pedido_feito'       => $this->pedido_feito,
    ]);
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Venda cadastrada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('com.vendas.index')); 
  }

  public function render()
  {
    return view('livewire/comercial/venda/venda-criar')->layout('layouts/bootstrap');
  }
}
