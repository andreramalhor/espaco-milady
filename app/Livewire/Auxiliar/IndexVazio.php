<?php

namespace App\Livewire\Auxiliar;

use Livewire\Component;

class IndexVazio extends Component
{
  public function render()
  {
    return view('livewire/auxiliar/index')->layout('layouts/bootstrap');
  }
}
