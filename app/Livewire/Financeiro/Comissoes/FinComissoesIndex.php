<?php

namespace App\Livewire\Financeiro\Comissoes;

use Livewire\Component;

class FinComissoesIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/financeiro/comissoes/comissoes-index')->layout('layouts/bootstrap');
    }
}
