<?php

namespace App\Livewire\Configuracao\FormaPagamentos;

use Livewire\Component;
use App\Models\ACL\FormaPagamentos as DBFormaPagamentos;

class FormaPagamentosEditar extends Component
{
  public $forma_de_pagamento;
  
  public $nome;
  public $grupo;
  public $nivel;
  public $ordem;
  public $menu;
  public $descricao;
  
  public function mount($id)
  {
    $this->forma_de_pagamento = DBFormaPagamentos::findOrFail($id);
    $this->nome      = $this->forma_de_pagamento->nome;
    $this->grupo     = $this->forma_de_pagamento->grupo;
    $this->nivel     = $this->forma_de_pagamento->nivel;
    $this->ordem     = $this->forma_de_pagamento->ordem;
    $this->menu      = $this->forma_de_pagamento->menu;
    $this->descricao = $this->forma_de_pagamento->descricao;
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
    
    $forma_de_pagamento = DBFormaPagamentos::findOrFail($this->forma_de_pagamento->id);
    $forma_de_pagamento->update([
      'nome'      => $this->nome,
      'grupo'     => $this->grupo,
      'nivel'     => $this->nivel,
      'ordem'     => $this->ordem,
      'menu'      => $this->menu,
      'descricao' => $this->descricao,
    ]);    
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Permissão cadastrada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('cfg.permissoes.index')); 
  }

  public function render()
  {
    return view('livewire/configuracao/forma_de_pagamento/forma_de_pagamento-editar')->layout('layouts/bootstrap');
  }
}
