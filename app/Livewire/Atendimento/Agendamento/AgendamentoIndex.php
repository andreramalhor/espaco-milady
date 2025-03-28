<?php

namespace App\Livewire\Atendimento\Agendamento;

use Livewire\Component;

class AgendamentoIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/atendimento/agendamento/agendamento-index')->layout('layouts/bootstrap');
    }
}
