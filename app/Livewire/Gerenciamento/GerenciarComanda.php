<?php

namespace App\Livewire\Gerenciamento;

use App\Models\PDV\Comanda as DBComanda;
use App\Models\PDV\ComandaDetalhe as DBComandaDetalhe;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class GerenciarComanda extends Component
{
  public $id;
  public $comanda;

  public $id_cliente;
  public $venda_detalhes = [];

  public $cliente_alterar = false;
  public $detalhe_alterar = false;
  
  public $servicos;

  public $id_servprod;
  public $quantidade;
  public $vlr_venda;
  public $vlr_negociado;
  public $vlr_dsc_acr;
  public $vlr_final;
  public $id_pessoa;
  public $percentual;
  public $valor;
  
  public $editando_detalhe = false;

  public function mount()
  {
    $this->comanda = DBComanda::findOrFail($this->id);
    $this->id_cliente = $this->comanda->id_cliente;

    $this->servicos = DBServicoProduto::orderBy('nome', 'asc')->pluck('nome', 'id');

    foreach($this->comanda->dfyejmfcrkolqjh as $detalhe)
    {
      $this->venda_detalhes[$detalhe->id] = [
        'edit'          => false,
        'id'            => $detalhe->id,
        'id_servprod'   => $detalhe->id_servprod,
        'nome_servprod' => $detalhe->kcvkongmlqeklsl->nome,
        'quantidade'    => $detalhe->quantidade,
        'vlr_venda'     => $detalhe->vlr_venda,
        'vlr_negociado' => $detalhe->vlr_negociado,
        'vlr_dsc_acr'   => $detalhe->vlr_dsc_acr,
        'vlr_final'     => $detalhe->vlr_final,
        'id_pessoa'     => $detalhe->hgihnjekboyabez->id_pessoa ?? null,
        'nome_pessoa'   => $detalhe->flielwjewjdasld->apelido ?? '-',
        'percentual'    => $detalhe->hgihnjekboyabez->percentual ?? 0,
        'valor'         => $detalhe->hgihnjekboyabez->valor ?? 0,
        'status'        => $detalhe->hgihnjekboyabez->status ?? 0,
      ];
      
      // $this->venda_detalhes[] = $venda_detalhes;
    }
  }

  public function editar_cliente()
  {
    $this->cliente_alterar = true;
  }
  
  public function atualizar_cliente()
  {
    $this->comanda->update([
      'id_cliente' => $this->id_cliente,
    ]);
    
    $this->comanda->snfbexhswnenrks()->
    update([
      'id_pessoa' => $this->id_cliente,
    ]);
    
    $this->cliente_alterar = false;
  }
  
  public function editar_detalhe( $id )
  {
    if($this->editando_detalhe == false)
    {
      $this->editando_detalhe = true;
      $this->venda_detalhes[$id]['edit'] = true;
      $this->id_servprod   = $this->venda_detalhes[$id]['id_servprod'];
      $this->quantidade    = $this->venda_detalhes[$id]['quantidade'];
      $this->vlr_venda     = $this->venda_detalhes[$id]['vlr_venda'];
      $this->vlr_negociado = $this->venda_detalhes[$id]['vlr_negociado'];
      $this->vlr_dsc_acr   = $this->venda_detalhes[$id]['vlr_dsc_acr'];
      $this->vlr_final     = $this->venda_detalhes[$id]['vlr_final'];
      $this->id_pessoa     = $this->venda_detalhes[$id]['id_pessoa'];
      $this->percentual    = $this->venda_detalhes[$id]['percentual'];
      $this->valor         = $this->venda_detalhes[$id]['valor'];
    }
    else
    {
      dump('já esta editando algo');
    }
  }
  
  public function cancelar_detalhe( $id )
  {
    $this->editando_detalhe = false;
    $this->venda_detalhes[$id]['edit'] = false;
    $this->reset(['id_servprod', 'quantidade', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'id_pessoa', 'percentual', 'valor']);
  }
  
  public function atualizar_detalhe( $id )
  {
    $this->editando_detalhe = false;
    $this->venda_detalhes[$id]['edit'] = false;
    
    $detalhe = DBComandaDetalhe::find($id);
    
    if($detalhe->hgihnjekboyabez == null)
    {
      $teste = $detalhe->hgihnjekboyabez()->create([
        'id_pessoa'    => $this->id_pessoa == "" ? null : $this->id_pessoa,
        'percentual'   => $this->percentual / 100,
        'valor'        => $this->valor,
        'status'       => "Em Aberto",
        'fonte_origem' => "pdv_vendas_detalhes",
      ]);
    }
    else if($detalhe->hgihnjekboyabez->status == "Em Aberto")
    {
      $detalhe->hgihnjekboyabez->update([
        'id_pessoa'  => $this->id_pessoa == "" ? null : $this->id_pessoa,
        'percentual' => $this->percentual / 100,
        'valor'      => $this->valor
      ]);
    }
    else
    {
      dd('Comissão já foi pagada');
    }
    
    
    $this->reset(['id_servprod', 'quantidade', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'id_pessoa', 'percentual', 'valor']);
  
    // dd(111, $id, $this->comanda->dfyejmfcrkolqjh()->findOrFail($id));
    // $this->comanda->dfyejmfcrkolqjh()->findOrFail($id)->update([
    //   'id_cliente' => $this->id_cliente,
    // ]);
  
    // $this->cliente_alterar = false;
  }

  public function render()
  {
    return view('livewire/gerenciamento/gerenciar-comanda')->layout('layouts/bootstrap');
  }
}
