<?php

namespace App\Livewire\Configuracao\Sistema\Usuario;

use App\Models\Atendimento\Usuario as DBUsuario;
use Livewire\Component;

class BBBBMostrar extends Component
{
  public $id;
  public $pessoa;
  public $tab_active = 'tab-sobre';

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
    return view('livewire/configuracao/sistema/usuario/usuario/usuario-mostrar')->layout('layouts/bootstrap');
  }
}
