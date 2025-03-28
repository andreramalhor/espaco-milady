<?php

namespace App\Livewire\Configuracao\PlanoContas;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class PlanoContasMostrar extends Component
{
  public $id;
  public $plano_de_conta;
  public $postId;

  public $tab_active = 'tab-dados_gerais';
  
  protected $listeners = ['plano_de_contaUpdated' => 'refreshList'];
  
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
    $this->plano_de_conta = DBPessoa::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/atendimento/plano_de_conta/plano_de_conta-mostrar')->layout('layouts/bootstrap');
  }
  
  public function plano_de_contaFuncaoAtualizada($plano_de_conta, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da plano_de_conta no componente pai utilizando os IDs recebidos
    $this->plano_de_conta;
  }
}
