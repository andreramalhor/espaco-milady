<?php

namespace App\Livewire;

use Livewire\Component;

class MeuComponente extends Component
{
    public $showComponent = false;

    public function renderizarComponente()
    {
        $this->showComponent = true;
    }
}
