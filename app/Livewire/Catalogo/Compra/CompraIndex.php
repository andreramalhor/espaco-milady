<?php

namespace App\Livewire\Catalogo\Compra;

use Livewire\Component;

class CompraIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/catalogo/compra/index')->layout('layouts/bootstrap');
    }
}
