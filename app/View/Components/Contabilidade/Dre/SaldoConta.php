<?php

namespace App\View\Components\Contabilidade\Dre;

use Closure;
use Illuminate\View\Component;

use App\Services\CalcularSaldoService;


use App\Models\Contabilidade\ContaContabil as DBContaContabil;

class SaldoConta extends Component
{
  public $conta;
  public $ano;
  public $mes;
  
  public $valor;
  
  public function __construct($idconta, $ano, $mes=null)
  {
    $this->conta  = DBContaContabil::find($idconta);
    $this->conta->novo_nivel;
    
    $this->saldoPorPeriodo($ano, $mes);
  }
  
  public function saldoPorPeriodo($ano, $mes=null)
  {
    $this->inicio = $mes == null ? \Carbon\Carbon::create($ano, $mes)->startOfYear() : \Carbon\Carbon::create($ano, $mes)->startOfMonth();
    $this->final  = $mes == null ? \Carbon\Carbon::create($ano, $mes)->endOfYear() : \Carbon\Carbon::create($ano, $mes)->endOfMonth();

    $calcularSaldoService = new CalcularSaldoService();
    $saldoTotal = $calcularSaldoService->calcularSaldoPorPeriodo($this->conta->id, $this->inicio, $this->final);
    
    $this->valor = $saldoTotal;
  }

  public function render()
  {
    return number_format($this->valor, 2, ',', '.');
  }
}
