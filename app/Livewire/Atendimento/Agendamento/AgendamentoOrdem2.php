<?php

namespace App\Livewire\Atendimento\Agendamento;

use App\Models\Agendamento\Ordem as DBOrdem;
use Livewire\Component;

class AgendamentoOrdem2 extends Component
{
  public $modal = false;
  public $agendamento_ordem;

  protected $listeners = [
    'showModalOrdem' => 'showModalOrdemHandler',
  ];

  public function mount()
  {
    $this->agendamento_ordem = DBOrdem::
                                            where('auth_user', auth()->user()->id)->
                                            orderBy(\DB::raw('ISNULL(ordem)'), 'asc')->
                                            orderBy('ordem', 'asc')->
                                            get();
  }  

  public function showModalOrdemHandler($dados)
  {
    $this->modal = $dados['modal'];
  }

  public function toggle_modal($status)
  {
    $this->modal = false;
        
    // $this->dispatch('fullcalendar-refresh');
  }

  public function cabecalhos($id, $status)
  {
    $parceiro = DBOrdem::find($id);

    if ($status)
    {
      $parceiro->update([
        'ordem' => 100,
        'area'  => null
      ]);
    }
    else
    {
      $parceiro->update([
        'ordem' => null,
        'area'  => null
      ]);
    }

    $this->dispatch('contentChanged');
  }

  public function atualiza_ordem($id, $ordem)
  {
    $parceiro = DBOrdem::find($id);

    if ($ordem >= 0)
    {
      $parceiro->update([
        'ordem' => $ordem,
        'area'  => null
      ]);
    }

    $this->dispatch('contentChanged');
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Agendamento cadastrado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
        
    $this->dispatch('FullCalendar:refresh');
  }

  public function render()
  {
    return view('livewire/atendimento/agendamento/agendamento-ordem');
  }
}
