<?php

namespace App\Livewire\Configuracao\Sistema\Usuario;

use Livewire\Component;

class Usuario extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/configuracao/sistema/usuario/usuario/index')->layout('layouts/bootstrap');
    }
}
