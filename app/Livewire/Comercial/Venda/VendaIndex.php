<?php

namespace App\Livewire\Comercial\Venda;

use Livewire\Component;

class VendaIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/comercial/venda/venda-index')->layout('layouts/bootstrap');
    }
}
