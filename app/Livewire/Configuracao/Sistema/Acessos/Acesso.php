<?php

namespace App\Livewire\Configuracao\Sistema\Acessos;

use Livewire\Component;

class Acesso extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        dd(1221);
        return view('livewire/configuracao/sistema/acesso/acesso/index')->layout('layouts/bootstrap');
    }
}
