<?php

namespace App\Livewire\Catalogo\Produto;

use Livewire\Component;

class Produto extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/catalogo/produto/index')->layout('layouts/bootstrap');
    }
}
