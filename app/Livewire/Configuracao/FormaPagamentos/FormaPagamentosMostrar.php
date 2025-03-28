<?php

namespace App\Livewire\Configuracao\FormaPagamentos;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class FormaPagamentosMostrar extends Component
{
  public $id;
  public $forma_de_pagamento;
  public $postId;

  public $tab_active = 'tab-dados_gerais';
  
  protected $listeners = ['forma_de_pagamentoUpdated' => 'refreshList'];
  
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
    $this->forma_de_pagamento = DBPessoa::findOrFail($this->id);
  }

  public function render()
  {
    return view('livewire/atendimento/forma_de_pagamento/forma_de_pagamento-mostrar')->layout('layouts/bootstrap');
  }
  
  public function forma_de_pagamentoFuncaoAtualizada($forma_de_pagamento, $funcao)
  {
    dd(1111111111);
    // Atualizar dados da forma_de_pagamento no componente pai utilizando os IDs recebidos
    $this->forma_de_pagamento;
  }
}
