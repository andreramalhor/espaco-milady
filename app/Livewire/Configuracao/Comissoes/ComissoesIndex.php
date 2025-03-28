<?php

namespace App\Livewire\Configuracao\Comissoes;

use Livewire\Component;

class ComissoesIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/configuracao/comissoes/comissoes-index')->layout('layouts/bootstrap');
    }
}
