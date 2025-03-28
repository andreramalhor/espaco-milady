<?php

namespace App\Livewire\Graficos;

use App\Models\Atendimento\Agendamento as DBAgendamento;
use Livewire\Component;

class Agendamentos extends Component
{
  public $agendamentos;
  public $qtd_servicos;

  public function mount()
  {
    $retornarColunas = [
      'start',
      'id_profexec',
      'id_servprod',
      'status',
    ];

    $this->agendamentos = DBAgendamento::
                                  whereBetween('start', [ \Carbon\Carbon::today()->startOfMonth(), \Carbon\Carbon::today()->endOfMonth() ])->
                                  get($retornarColunas);

    $this->qtd_servicos = $this->agendamentos->
                                        groupBy('id_servprod')->
                                        map(function ($grupo)
                                        {
                                          return $grupo->count();
                                        });
  }

  public function render()
  {
    return view('livewire/graficos/agendamentos-por-dia');
  }
}
  

// public function eventos_pegar($start=null, $end=null)
// {
//   if(!is_null($start))
//   {
//     $dados = [
//       'start' => \Carbon\Carbon::parse($start)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
//       'end'   => \Carbon\Carbon::parse($end)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
//     ];
//   }
//   else
//   {
//     $dados = [
//       'start' => \Carbon\Carbon::parse($start)->startOfDay()->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
//       'end'   => \Carbon\Carbon::parse($end)->endOfDay()->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
//     ];
//   }

//   $returnedColumns = [
//     'id',
//     'start',
//     'end',
//     'id_cliente',
//     'id_profexec',
//     'id_servprod',
//     'id_comanda',
//     'valor',
//     'obs',
//     'status',
//     // 'title',
//     // 'resourceId'
//   ];

//   $eventos = DBAgendamento::
//                             whereBetween('start', [ $dados['start'], $dados['end'] ])->
//                             get($returnedColumns);
  
//   return $eventos;
// }