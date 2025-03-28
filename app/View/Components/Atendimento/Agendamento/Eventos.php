<?php

namespace App\View\Components\Atendimento\Agendamento;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Atendimento\Agendamento;

class Eventos extends Component
{
  public function render(): View|Closure|string
  {
    $returnedColumns = [
      'id',
      'start',
      'end',
      'id_cliente',
      'id_profexec',
      'id_servprod',
      'id_comanda',
      'valor',
      'obs',
      'status',
      // 'title',
      // 'resourceId'
    ];

    // $start  = (!empty($request->start)) ? ($request->start) : \Carbon\Carbon::today()->startOfDay();
    // $end    = (!empty($request->end))   ? ($request->end)   : \Carbon\Carbon::today()->endOfDay();

    $start  = (!empty($request->start)) ? ($request->start) : \Carbon\Carbon::today()->startOfMonth();
    $end    = (!empty($request->end))   ? ($request->end)   : \Carbon\Carbon::today()->endOfMonth();

    $eventos = Agendamento::
                          whereBetween('start', [ $start, $end ])->
                          get($returnedColumns);
    
    return $eventos->toJson();
  }
}
