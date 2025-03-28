<?php

namespace App\Livewire\Configuracao\FormaPagamentos;

use Livewire\Component;
use App\Models\ACL\FormaPagamentos as DBFormaPagamentos;

class FormaPagamentosCriar extends Component
{
  public $nome;
  public $grupo;
  public $nivel;
  public $ordem;
  public $menu;
  public $descricao;
  
  protected function rules()
  {
    return [
      'nome'  => 'required|min:3',
      'grupo' => 'required|min:6',
    ];
  }

  public function store()
  {
    $this->validate();
    
    $forma_de_pagamento = DBFormaPagamentos::create([
      'nome'      => $this->nome,
      'grupo'     => $this->grupo,
      'nivel'     => $this->nivel,
      'ordem'     => $this->ordem,
      'menu'      => $this->menu,
      'descricao' => $this->descricao,
    ]);
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Comissão cadastrada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('cfg.permissoes.index')); 
  }

  public function render()
  {
    return view('livewire/configuracao/forma_de_pagamento/forma_de_pagamento-criar')->layout('layouts/bootstrap');
  }
}
