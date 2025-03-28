<?php

namespace App\Livewire\Configuracao\Sistema\Permissao;

use Livewire\Component;
use App\Models\ACL\Permissao as DBPermissao;

class PermissaoEditar extends Component
{
  public $permissao;
  
  public $nome;
  public $grupo;
  public $nivel;
  public $ordem;
  public $menu;
  public $descricao;
  
  public function mount($id)
  {
    $this->permissao = DBPermissao::findOrFail($id);
    $this->nome      = $this->permissao->nome;
    $this->grupo     = $this->permissao->grupo;
    $this->nivel     = $this->permissao->nivel;
    $this->ordem     = $this->permissao->ordem;
    $this->menu      = $this->permissao->menu;
    $this->descricao = $this->permissao->descricao;
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
    
    $permissao = DBPermissao::findOrFail($this->permissao->id);
    $permissao->update([
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
    return view('livewire/configuracao/sistema/permissao/permissao-editar')->layout('layouts/bootstrap');
  }
}
