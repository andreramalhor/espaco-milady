<?php

namespace App\Livewire\Catalogo\Servico;

use Livewire\Component;

class Servico extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/catalogo/servico/index')->layout('layouts/bootstrap');
    }
}
