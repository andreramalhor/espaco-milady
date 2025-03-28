<?php

namespace App\Livewire\Catalogo\Saida;

use Livewire\Component;

class SaidaIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/catalogo/saida/index')->layout('layouts/bootstrap');
    }
}
