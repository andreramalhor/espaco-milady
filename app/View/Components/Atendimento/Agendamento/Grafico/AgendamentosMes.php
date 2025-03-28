<?php

namespace App\View\Components\Atendimento\Agendamento\Grafico;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\PDV\Comanda as DBComanda;

class AgendamentosMes extends Component
{
    public $periodo = [];  
    public $dias = [];  
    public $agendamentos_confirmado = [];
    public $agendamentos_agendado   = [];
    public $agendamentos_faltou     = [];

    public function __construct()
    {
        $this->periodo = \Carbon\CarbonPeriod::create(\Carbon\Carbon::today()->startOfMonth(), \Carbon\Carbon::today()->endOfMonth());
    }
    
    public function contar(): void
    {
        foreach($this->periodo as $dia)
        {
            $this->dias[] = \Carbon\Carbon::parse($dia)->format('d');
        
            $this->agendamentos_confirmado[] = DBAgendamento::
                                                        whereBetween('start', [ \Carbon\Carbon::parse($dia)->startOfDay(), \Carbon\Carbon::parse($dia)->endOfDay() ])->
                                                        whereIn('status', ['Confirmado', 'Finalizado'])->
                                                        count();

            $this->agendamentos_agendado[] = DBAgendamento::
                                                        whereBetween('start', [ \Carbon\Carbon::parse($dia)->startOfDay(), \Carbon\Carbon::parse($dia)->endOfDay() ])->
                                                        whereIn('status', ['Agendado','Agendado pela internet', 'Fixa'])->
                                                        count();

            $this->agendamentos_faltou[] = DBAgendamento::
                                                        whereBetween('start', [ \Carbon\Carbon::parse($dia)->startOfDay(), \Carbon\Carbon::parse($dia)->endOfDay() ])->
                                                        whereIn('status', ['Faltou'])->
                                                        count();
        }
    }

    public function render(): View|Closure|string
    {
        $this->contar();

        return view('components/atendimento/agendamentos/graficos/agendamentos-mes');
    }
}
