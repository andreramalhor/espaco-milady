<?php

namespace App\Livewire\Configuracao\PlanoContas;

use Livewire\Component;
use App\Models\Contabilidade\ContaContabil as DBContaContabil;

class PlanoContasEditar extends Component
{
  public $plano_de_conta;
  
  public $nome;
  public $grupo;
  public $nivel;
  public $ordem;
  public $menu;
  public $descricao;
  
  public function mount($id)
  {
    $this->plano_de_conta = DBContaContabil::findOrFail($id);
    $this->nome      = $this->plano_de_conta->nome;
    $this->grupo     = $this->plano_de_conta->grupo;
    $this->nivel     = $this->plano_de_conta->nivel;
    $this->ordem     = $this->plano_de_conta->ordem;
    $this->menu      = $this->plano_de_conta->menu;
    $this->descricao = $this->plano_de_conta->descricao;
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
    
    $plano_de_conta = DBContaContabil::findOrFail($this->plano_de_conta->id);
    $plano_de_conta->update([
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
    return view('livewire/configuracao/plano_de_conta/plano_de_conta-editar')->layout('layouts/bootstrap');
  }
}
