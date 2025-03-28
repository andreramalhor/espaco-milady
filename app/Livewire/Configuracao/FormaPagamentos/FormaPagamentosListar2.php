<?php

namespace App\Livewire\Configuracao\FormaPagamentos;

use App\Models\Configuracao\FormaPagamento as DBFormaPagamentos;
use Livewire\Component;

class FormaPagamentosListar2 extends Component
{
  public $forma_de_pagamento;

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
  
  public $modal_criar  = false;
  public $modal_editar = false;
  
  protected $listeners = ['chamarMetodo' => 'remove'];
  
  public function mount()
  {
    $this->forma_de_pagamento = DBFormaPagamentos::get();
  }
  
  public function criar($forma=null, $bandeira=null)
  {
    $this->modal_criar  = true;
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
    $this->modal_criar  = false;
    $this->modal_editar = false;
  }

  public function render()
  {
    return view('livewire/configuracao/forma_de_pagamento/forma_de_pagamento-listar')->layout('layouts/bootstrap');
  }
}
  