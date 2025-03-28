<?php

namespace App\Livewire\Configuracao\Sistema\Permissao;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class PermissaoMostrar extends Component
{
  public $id;
  public $pessoa;
  public $postId;

  public $tab_active = 'tab-dados_gerais';
  
  protected $listeners = ['pessoaUpdated' => 'refreshList'];
  
  public function refreshList($tab=null)
  {
    $this->tab_active = $tab ?? $this->tab_active;

    $this->render();
  }
  
  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }
  
  public function mount()
  {
    $this->pessoa = DBPessoa::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/atendimento/pessoa/pessoa-mostrar')->layout('layouts/bootstrap');
  }
  
  public function pessoaFuncaoAtualizada($pessoa, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da pessoa no componente pai utilizando os IDs recebidos
    $this->pessoa;
  }
}
