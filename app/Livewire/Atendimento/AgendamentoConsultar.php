<?php

namespace App\Livewire\Atendimento;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class AgendamentoConsultar extends Component
{
    public $exibir_ocultar = false;

    public $telefone;
    public $agendamentos = [];

    public function trocar_tela()
    {
        $this->exibir_ocultar = !$this->exibir_ocultar;
    }
    
    public function consultar()
    {
        $validated = $this->validate([ 
            'telefone' => 'required',
        ]);
        
        $telefone = preg_replace('/[^0-9]/', '', $this->telefone);

        $this->agendamentos = \App\Models\Atendimento\Agendamento::
                                                            where('start', '>=', \Carbon\Carbon::now())->
                                                            whereHas('xhooqvzhbgojbtg', function(Builder $query) use ($telefone)
                                                            {
                                                              $query->where('telefone1', '=', $telefone)->orWhere('telefone2', '=', $telefone);
                                                            })->
                                                            get();
    }

    public function render()
    {
        return view('livewire.agendamento.consultar_agendamentos');
    }
}
