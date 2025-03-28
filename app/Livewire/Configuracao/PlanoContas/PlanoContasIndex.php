<?php

namespace App\Livewire\Configuracao\PlanoContas;

use Livewire\Component;

class PlanoContasIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/configuracao/plano_de_conta/plano_de_conta-index')->layout('layouts/bootstrap');
    }
}
