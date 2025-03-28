<?php

namespace App\Livewire\Atendimento\Agendamento;

use Illuminate\Support\Facades\Gate;

use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class AgendamentoBook extends Component
{
  public $start;

  public $parceiros;
  public $eventos;

  public $novo_horario;
  
  protected $listeners = [
    'modal-agendamento-ordem'   => 'modal_agendamento_ordem',
    'modal-agendamento-criar'   => 'modal_agendamento_criar',
    'modal-agendamento-editar'  => 'modal_agendamento_editar',
    'metodoEditar'              => 'confirmar_edicao',
    'modal-agendamento-mostrar' => 'modal_agendamento_mostrar',
    'modal-agendamento-eventos' => 'eventos_pegar',
    'fullcalendar-refresh'      => 'fullcalendar_refresh',
  ];

  public function mount()
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
      'grupo',
      // 'title',
      // 'resourceId'
    ];

    $start  = (!empty($request->start)) ? ($request->start) : \Carbon\Carbon::today()->startOfDay();
    $end    = (!empty($request->end))   ? ($request->end)   : \Carbon\Carbon::today()->endOfDay();

    $this->eventos = DBAgendamento::
                                whereBetween('start', [ $start, $end ])->
                                get($returnedColumns);
  }
  
  public function modal_agendamento_ordem()
  {
    $dados = [
      'modal' => true
    ];
  
    $this->dispatch('showModalOrdem', $dados);
  }

  public function eventos_pegar($start=null, $end=null)
  {
    if(!is_null($start))
    {
      $dados = [
        'start' => \Carbon\Carbon::parse($start)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
        'end'   => \Carbon\Carbon::parse($end)->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
      ];
    }
    else
    {
      $dados = [
        'start' => \Carbon\Carbon::parse($start)->startOfDay()->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
        'end'   => \Carbon\Carbon::parse($end)->endOfDay()->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
      ];
    }

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

    $eventos = DBAgendamento::
                              whereBetween('start', [ $dados['start'], $dados['end'] ])->
                              get($returnedColumns);
    
    return $eventos;
  }
  
  public function modal_agendamento_criar($info)
  {
    if (Gate::allows('Criar novo agendamento'))
    {
      // if($resource == null)
      // {
      //   $dados = [
      //     'dia'      => $this->arredondar_hora( $info['start'])->format('Y-m-d') ,
      //     'start'    => $this->arredondar_hora( $info['start'])->format('Y-m-d H:i:s') ,
      //     'end'      => $this->arredondar_hora( $info['start'])->addhours(1)->format('Y-m-d H:i:s') ,
      //     'modal'    => true
      //   ];
      // }
      // else
      // {
        $dados = [
          'dia'      => \Carbon\Carbon::parse($info['start'])->setTimezone('America/Sao_Paulo')->format('Y-m-d'),
          'start'    => \Carbon\Carbon::parse($info['start'])->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
          'end'      => \Carbon\Carbon::parse($info['end'])->setTimezone('America/Sao_Paulo')->format('Y-m-d H:i:s'),
          'resource' => $info['resource']['id'],
          'modal'    => true
        ];
      // }
  
      $this->dispatch('showModalCriar', $dados);
    }
    else
    {
      $this->dispatch('swal:alert', [
        'text'      => 'Vc não tem autorização para criar agendamentos!',
        'icon'      => 'warning',
        'iconColor' => 'red',
      ]);
    }
  }

  public function arredondar_hora( $hora )
  {
    // Obtém os minutos e arredonda para cima para o próximo múltiplo de 30
    $hora = \Carbon\Carbon::parse($hora)->setTimezone('America/Sao_Paulo');

    if($hora->minute == 0 )
    {
      return $hora->addHours(1);
    }
    else
    {
      return $hora->subMinutes($hora->minute)->subSeconds($hora->second)->addHours(1);
    }
  }
  
  public function modal_agendamento_mostrar($id)
  {
    if (Gate::allows('Ver detalhes de agendamento'))
    {
      $dados = [
        'id'       => $id,
        'modal'    => true
      ];
  
      $this->dispatch('showModalMostrar', $dados);
    }
    else
    {
      $this->dispatch('swal:alert', [
        'text'      => 'Vc não tem autorização para ver detalhes dos agendamentos!',
        'icon'      => 'warning',
        'iconColor' => 'red',
      ]);
    }
  }

  public function eventReceive($event)
  {
    dd('fn eventReceive');   
    // Handle new events
  }
  
  public function eventDrop($info)
  {
    $agendamento = DBAgendamento::find($info['event']['id']);
    
    $this->novo_horario = [
      'novo_horario_start' => \Carbon\Carbon::parse($info['event']['start']),
      'novo_horario_end'   => \Carbon\Carbon::parse($info['event']['end']),
      'novo_resource'      => $info['newResource']['id'] ?? $agendamento->id_profexec,
    ];

    $this->dispatch('swal:edit', [
      'title'        => $agendamento->title,
      'text'         => 'Tem certeza que quer alterar o agendamento?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $agendamento->id,
    ]);    
  }

  public function eventResize($info)
  {
    $agendamento = DBAgendamento::find($info['event']['id']);
    
    $this->novo_horario = [
      'novo_horario_start' => \Carbon\Carbon::parse($info['event']['start']),
      'novo_horario_end'   => \Carbon\Carbon::parse($info['event']['end']),
    ];

    $this->dispatch('swal:edit', [
      'title'        => $agendamento->title,
      'text'         => 'Tem certeza que quer alterar a duração do agendamento?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $agendamento->id,
    ]);    
  }

  public function confirmar_edicao($id)
  {
    $agendamento = DBAgendamento::find($id);

    $agendamento->update([
      'start'       => $this->novo_horario['novo_horario_start'],
      'end'         => $this->novo_horario['novo_horario_end'],
      'id_profexec' => $this->novo_horario['novo_resource'] ?? $agendamento->id_profexec,
    ]);
    
    $this->dispatch('swal:alert', [
      'text'      => 'Evento alterado com sucesso!',
      'icon'      => 'confirm',
      'iconColor' => 'green',
    ]);
  }

  public function mostrar_perfil_ordem($ordem)
  {
    $colab = DBPessoa::find(auth()->user()->id);
    $colab->timestamps = false;
    $colab->ordem = $ordem;
    $colab->save();

    $this->fullcalendar_refresh();
    
    return redirect()->route('atd.agendamentos.book');
  }
  
  public function fullcalendar_refresh($start=null, $end=null)
  {
    $this->eventos = $this->eventos_pegar($start, $end);

    $this->dispatch('FullCalendar:refresh', $this->eventos);
  }

  public function render()
  {
    return view('livewire/atendimento/agendamento/agendamento-book')->layout('layouts/bootstrap');
  }
}
  