<?php

namespace App\Livewire\Consulta;

use Livewire\Component;
use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\Configuracao\ContaContabil as DBContaContabil;

class ConsultaDRE extends Component
{
    public $periodo;
    public $inicio;
    public $final;
    public $ano;
    
    protected $listeners = ['asdadasdasd' => 'asdadasdasd'];

    public function mount()
    {
        $this->ano = \Carbon\Carbon::today()->year;
        
        $this->inicio = \Carbon\Carbon::today()->startOfYear();
        $this->final  = \Carbon\Carbon::today()->endOfYear();
    }

    public function asdadasdasd($start, $end)
    {
        $this->inicio = \Carbon\Carbon::parse($start)->subDays(0)->startOfDay();
        $this->final  = \Carbon\Carbon::parse($end)->subDays(1)->endOfDay();
        
        $this->listar_lancamentos();
    }    
    
    public function listar_lancamentos()
    {
        $lancamentos = DBLancamento::
                                    whereBetween('dt_pagamento', [ $this->inicio, $this->final ])->
                                    whereHas('qlwiqwuheqlefkd', function ($query)
                                    {
                                        $query->where('soma', '=', 'Sim' );
                                    })->
                                    get();

        return $lancamentos;
    }

    public function render()
    {
        $contas_contabeis = DBContaContabil::get();

        $this->periodo = $this->inicio->format('d/m/Y').' - '.$this->final->format('d/m/Y');

        $lancamentos = $this->listar_lancamentos();

        return view('livewire/consulta/dre', [
            'contas_contabeis' => $contas_contabeis,
            'lancamentos' => $lancamentos,
        ])->layout('layouts/bootstrap');
    }
}
