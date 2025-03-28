<?php

namespace App\View\Components\Financeiro\Grafico;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\PDV\Comanda as DBComanda;

class FluxoDeCaixa extends Component
{
    public $dias = [];  
    public $receitas = [];
    public $despesas = [];

    public function lancamentos()
    {
        $periodo = \Carbon\CarbonPeriod::create(\Carbon\Carbon::today()->startOfMonth(), \Carbon\Carbon::today()->endOfMonth());

        foreach($periodo as $dia)
        {
            $this->dias[] = \Carbon\Carbon::parse($dia)->format('d');
        
            $receitas = DBLancamento::
                                    whereBetween('created_at', [ \Carbon\Carbon::parse($dia)->startOfDay(), \Carbon\Carbon::parse($dia)->endOfDay() ])->
                                    where('tipo', 'R')->
                                    sum('vlr_final');
            
            $vendas = DBComanda::
                            whereBetween('created_at', [ \Carbon\Carbon::parse($dia)->startOfDay(), \Carbon\Carbon::parse($dia)->endOfDay() ])->
                            sum('vlr_final');

            $this->receitas[] = $receitas + $vendas;

            $this->despesas[] = DBLancamento::
                                      whereBetween('created_at', [ \Carbon\Carbon::parse($dia)->startOfDay(), \Carbon\Carbon::parse($dia)->endOfDay() ])->
                                      where('tipo', 'D')->
                                      sum('vlr_final')+1;
        }
    }

    public function render(): View|Closure|string
    {
        $this->lancamentos();

        return view('components/financeiro/grafico/fluxo-de-caixa');
    }
}
