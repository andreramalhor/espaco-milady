<?php

namespace App\Livewire\PDV\Caixa;

use Livewire\Component;

class CaixaIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/pdv/caixa/caixa-index')->layout('layouts/bootstrap');
    }
}
