<?php

namespace App\Livewire\Configuracao\FormaPagamentos;

use Livewire\Component;

class FormaPagamentosIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/configuracao/forma_de_pagamento/forma_de_pagamento-index')->layout('layouts/bootstrap');
    }
}
