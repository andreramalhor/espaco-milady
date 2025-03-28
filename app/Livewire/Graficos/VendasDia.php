<?php

namespace App\Livewire\Graficos;

use App\Models\PDV\Comanda as DBComanda;
use Livewire\Component;

class VendasDia extends Component
{
  public $vendas = [];
  public $dias = [];
  
  public function mount()
  {
    $periodo = \Carbon\CarbonPeriod::create(\Carbon\Carbon::today()->startOfMonth(), \Carbon\Carbon::today()->endOfMonth());
    
    foreach($periodo as $dia)
    {
      $this->dias[] = \Carbon\Carbon::parse($dia)->format('d');
    
      $this->vendas[] = DBComanda::whereBetween('created_at', [ \Carbon\Carbon::parse($dia)->startOfDay(), \Carbon\Carbon::parse($dia)->endOfDay() ])->sum('vlr_final');
    }
  }

  public function render()
  {
    return view('livewire/graficos/vendas-no-dia');
  }
}
