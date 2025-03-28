<?php

namespace App\Livewire\Configuracao\Sistema\Acesso;

use Livewire\Component;

class Acesso extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/configuracao/sistema/acesso/acesso/index')->layout('layouts/bootstrap');
    }
}
