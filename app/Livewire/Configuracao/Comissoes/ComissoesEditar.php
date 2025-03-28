<?php

namespace App\Livewire\Configuracao\Comissoes;

use Livewire\Component;
use App\Models\ACL\Comissoes as DBComissoes;

class ComissoesEditar extends Component
{
  public $comissao;
  
  public $nome;
  public $grupo;
  public $nivel;
  public $ordem;
  public $menu;
  public $descricao;
  
  public function mount($id)
  {
    $this->comissao = DBComissoes::findOrFail($id);
    $this->nome      = $this->comissao->nome;
    $this->grupo     = $this->comissao->grupo;
    $this->nivel     = $this->comissao->nivel;
    $this->ordem     = $this->comissao->ordem;
    $this->menu      = $this->comissao->menu;
    $this->descricao = $this->comissao->descricao;
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
    
    $comissao = DBComissoes::findOrFail($this->comissao->id);
    $comissao->update([
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
    return view('livewire/configuracao/comissao/comissao-editar')->layout('layouts/bootstrap');
  }
}
