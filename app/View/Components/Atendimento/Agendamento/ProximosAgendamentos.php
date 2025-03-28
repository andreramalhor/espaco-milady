<?php

namespace App\View\Components\Atendimento\Agendamento;

use Illuminate\View\Component;

use App\Models\Atendimento\Agendamento as DBAgendamento;

class ProximosAgendamentos extends Component
{
    public $proximos_agendamentos;

    public function __construct()
    {
        $this->proximos_agendamentos = DBAgendamento::
                                                    whereBetween('start', [\Carbon\Carbon::now(), \Carbon\Carbon::today()->endOfDay() ])->
                                                    orWhere(function ($query)
                                                    {
                                                        $query->
                                                                whereBetween('start', [\Carbon\Carbon::today()->startOfDay(), \Carbon\Carbon::today()->endOfDay() ])->
                                                                where('status', '=', 'Confirmado');
                                                    })->
                                                    orderBy('start', 'asc')->
                                                    get();
    }
    
    public function render()
    {
        return view('components.atendimento.agendamentos.proximos-agendamentos', [
            'proximos_agendamentos' => $this->proximos_agendamentos,
        ]);
    }
}
