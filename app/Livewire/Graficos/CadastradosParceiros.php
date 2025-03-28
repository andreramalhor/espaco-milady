<?php

namespace App\Livewire\Graficos;

use App\Models\Atendimento\Pessoa as DBParceiro;
use Livewire\Component;

class CadastradosParceiros extends Component
{
  public $parceiros;

  public function mount()
  {
    $this->parceiros = DBParceiro::parceiros()->count();
  }

  public function render()
  {
    return view('livewire/graficos/parceiros-cadastrados');
  }
}
