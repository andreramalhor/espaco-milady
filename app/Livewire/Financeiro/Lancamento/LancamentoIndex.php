<?php

namespace App\Livewire\Financeiro\Lancamento;

use Livewire\Component;

class LancamentoIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/financeiro/lancamento/lancamento-index')->layout('layouts/bootstrap');
    }
}
