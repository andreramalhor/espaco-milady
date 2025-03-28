<?php

namespace App\Livewire\Financeiro\Comissoes;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class FinComissoesMostrar extends Component
{
  public $id;
  public $comissao;
  public $postId;

  public $tab_active = 'tab-dados_gerais';
  
  protected $listeners = ['comissaoUpdated' => 'refreshList'];
  
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
    $this->comissao = DBPessoa::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/atendimento/comissao/comissao-mostrar')->layout('layouts/bootstrap');
  }
  
  public function comissaoFuncaoAtualizada($comissao, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da comissao no componente pai utilizando os IDs recebidos
    $this->comissao;
  }
}
