<?php

namespace App\Livewire\Configuracao\FormaPagamentos;

use App\Models\Configuracao\FormaPagamento as DBFormaPagamentos;
use Livewire\Component;

class FormaPagamentosListar extends Component
{
  public $forma_selecionada;
  public $forma_de_pagamento;

  public $novo_pagamento = true;

  public $id;
  public $forma;
  public $tipo;
  public $bandeira;
  public $parcela;
  public $taxa;
  public $prazo;
  public $pri_vcto;
  public $recebimento;
  public $local;
  public $conferir;
  public $destino;
  public $id_banco;
  public $mais_parcelas = [[],[]];
  
  public $modal_criar_unico   = false;
  public $modal_criar_credito = false;
  public $modal_editar = false;
  
  protected $listeners = ['chamarMetodo' => 'remove'];
    
  public function selecionar_forma($forma)
  {
    $this->forma_selecionada = $forma;
    
    if(DBFormaPagamentos::where('forma', '=', $this->forma_selecionada)->count() == 1)
    {
      $this->forma_de_pagamento = DBFormaPagamentos::where('forma', '=', $this->forma_selecionada)->first();
    }
    else
    {
      $this->forma_de_pagamento = DBFormaPagamentos::where('forma', '=', $this->forma_selecionada)->get();
    }
  }
  
  public function criar($forma=null)
  {
    $this->criar = $this->forma_selecionada;
    
    if($forma == 'Cartão de Crédito')
    {      
      $this->forma         = $this->forma_de_pagamento->first()->forma;
      $this->tipo          = $this->forma_de_pagamento->first()->tipo;

      $this->pri_vcto      = $this->forma_de_pagamento->first()->pri_vcto;
      $this->recebimento   = $this->forma_de_pagamento->first()->recebimento;
      $this->local         = $this->forma_de_pagamento->first()->local;
      $this->conferir      = $this->forma_de_pagamento->first()->conferir;
      $this->destino       = $this->forma_de_pagamento->first()->destino;
      $this->id_banco      = $this->forma_de_pagamento->first()->id_banco;
      $this->mais_parcelas = [[
        'taxa' => 0.00,
        'prazo' => 0,
        'pri_vcto' => 0,
      ]];
      
      $this->modal_criar_credito = true;
    }
    else
    {
      dd(111);
      $this->modal_criar_unico  = true;
    }
  }
  
  public function adicionar_parcela()
  {
    $parcela_adicionada = [
      'taxa' => 0.00,
      'prazo' => 0,
      'pri_vcto' => 0,
    ];
    
    array_push($this->mais_parcelas, $parcela_adicionada);
  }
  
  public function gravar_cartao_de_credito()
  {
    foreach ($this->mais_parcelas as $key => $parcela)
    {
      $this->forma_de_pagamento = DBFormaPagamentos::create([
        'forma'       => $this->forma,
        'tipo'        => $this->tipo,
        'bandeira'    => $this->bandeira,
        'parcela'     => $key + 1,
        'taxa'        => str_replace(',', '.', str_replace('.', '', $parcela['taxa'])),
        'prazo'       => str_replace(',', '.', str_replace('.', '', $parcela['prazo'])),
        'pri_vcto'    => str_replace(',', '.', str_replace('.', '', $parcela['pri_vcto'])),
        'recebimento' => $this->recebimento,
        'local'       => $this->local,
        'conferir'    => $this->conferir,
        'destino'     => $this->destino,
        'id_banco'    => $this->id_banco,
      ]);
    }

    $this->modal_criar_credito  = false;

    $this->dispatch('swal:alert', [
      'title'         => 'Concluído!',
      'text'          => $texto ?? 'Forma de pagamento gravada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
  }
  
  public function editar( $id )
  {
    $forma_pagamento = DBFormaPagamentos::find($id);
    $this->id          = $forma_pagamento->id;
    $this->forma       = $forma_pagamento->forma;
    $this->tipo        = $forma_pagamento->tipo;
    $this->bandeira    = $forma_pagamento->bandeira;
    $this->parcela     = $forma_pagamento->parcela;
    $this->taxa        = $forma_pagamento->taxa;
    $this->prazo       = $forma_pagamento->prazo;
    $this->pri_vcto    = $forma_pagamento->pri_vcto;
    $this->recebimento = $forma_pagamento->recebimento;
    $this->local       = $forma_pagamento->local;
    $this->conferir    = $forma_pagamento->conferir;
    $this->destino     = $forma_pagamento->destino;
    $this->id_banco    = $forma_pagamento->id_banco;

    $this->modal_editar = true;
  }

  public function store(): void
  {
    $forma_pagamento = DBFormaPagamentos::find($this->id);
    
    $forma_pagamento->update([
      'forma'       => $this->forma,
      'tipo'        => $this->tipo,
      'bandeira'    => $this->bandeira,
      'parcela'     => $this->parcela,
      'taxa'        => $this->taxa,
      'prazo'       => $this->prazo,
      'pri_vcto'    => $this->pri_vcto,
      'recebimento' => $this->recebimento,
      'local'       => $this->local,
      'conferir'    => $this->conferir,
      'destino'     => $this->destino,
      'id_banco'    => $this->id_banco,
    ]);
    
    $this->modal_editar = false;
    
    $this->dispatch('swal:alert', [
      'title'         => 'Concluído!',
      'text'          => $texto ?? 'Forma de pagamento gravada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
  }

  public function sto2re()
  {
    $this->forma_de_pagamento = DBFormaPagamentos::create([
      'nivel'          => $this->nivel,
      'titulo'         => $this->titulo,
      'conta_pai'      => $this->conta_pai,
      'imprime'        => $this->imprime,
      'soma'           => $this->soma,
      'tem_lancamento' => 1,
    ]);
  }
  
  public function delete($id)
  {
    $forma_de_pagamento = DBFormaPagamentos::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $forma_de_pagamento->nome,
      'text'         => 'Tem certeza que quer deletar a conta?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $forma_de_pagamento->id,
    ]);
  }
  
  public function remove($id)
  {
    $forma_de_pagamento = DBFormaPagamentos::find($id);
    
    $forma_de_pagamento->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Conta deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Conta Deletada!');
    
    // Atualiza a lista de forma_de_pagamentos no componente FormaPagamentosIndex
    $this->dispatch('forma_de_pagamentoDeleted');
  }
  
  public function fechar_modal()
  {
    $this->modal_criar_unico  = false;
    $this->modal_criar_credito  = false;
    $this->modal_editar = false;
  }

  public function render()
  {
    return view('livewire/configuracao/forma_de_pagamento/forma_de_pagamento-listar')->layout('layouts/bootstrap');
  }
}
  