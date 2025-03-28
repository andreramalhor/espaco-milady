<?php

namespace App\Livewire\Atendimento\Pessoa;

use Livewire\Component;

class Pessoa extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/atendimento/pessoa/index')->layout('layouts/bootstrap');
    }
}
