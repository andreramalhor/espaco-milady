<?php

namespace App\Livewire\Configuracao\Sistema\Permissao;

use App\Models\ACL\Funcao as DBFuncao;
use App\Models\ACL\Permissao as DBPermissao;
use Livewire\Component;

class PermissaoFuncao extends Component
{
  public $id;
  public $funcao;
  public $permissoes;
  public $funcao_permissao;

  public $tab_active = 'tab-dados_gerais';
  
  protected $listeners = ['pessoaUpdated' => 'refreshList'];
  
  public function mount($id)
  {
    $this->funcao           = DBFuncao::findOrFail($this->id);
    $this->permissoes       = DBPermissao::get();
    $this->funcao_permissao = $this->funcao->yxwbgtooplyjjaz;
  }

  public function render()
  {
    return view('livewire/configuracao/profissionais/permissao/permissao-index')->layout('layouts/bootstrap');
  }
  
  public function pessoaFuncaoAtualizada($pessoa, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da pessoa no componente pai utilizando os IDs recebidos
    $this->pessoa;
  }
}
