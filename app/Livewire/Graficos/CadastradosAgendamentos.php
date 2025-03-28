<?php

namespace App\Livewire\Graficos;

use App\Models\Atendimento\Agendamento as DBAgendamento;
use Livewire\Component;

class CadastradosAgendamentos extends Component
{
  public $agendamentos_mes;
  public $agendamentos_total;

  public function mount()
  {
    $this->agendamentos_mes   = DBAgendamento::whereBetween('created_at', [ \Carbon\Carbon::today()->startOfMonth(), \Carbon\Carbon::today()->endOfMonth() ])->count();
    $this->agendamentos_total = DBAgendamento::count();
  }

  public function render()
  {
    return view('livewire/graficos/agendamentos-cadastrados');
  }
}
