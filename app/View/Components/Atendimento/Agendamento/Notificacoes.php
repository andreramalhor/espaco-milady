<?php

namespace App\View\Components\Atendimento\Agendamento;

use Illuminate\View\Component;

use App\Models\Atendimento\Agendamento as DBAgendamento;

class Notificacoes extends Component
{
    public $agendamentos;

    public function __construct()
    {
        $this->agendamentos = DBAgendamento::where('status', '=', 'Agendado pela internet')->get();
    }
    
    public function render()
    {
        return view('components.atendimento.agendamentos.notificacoes', [
            'agendamentos' => $this->agendamentos,
        ]);
    }
}
