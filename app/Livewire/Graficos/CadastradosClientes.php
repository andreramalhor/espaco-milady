<?php

namespace App\Livewire\Graficos;

use App\Models\Atendimento\Pessoa as DBCliente;
use Livewire\Component;

class CadastradosClientes extends Component
{
  public $clientes_mes;
  public $clientes_total;

  public function mount()
  {
    $this->clientes_mes   = DBCliente::whereBetween('created_at', [ \Carbon\Carbon::today()->startOfMonth(), \Carbon\Carbon::today()->endOfMonth() ])->count();
    $this->clientes_total = DBCliente::count();
  }

  public function render()
  {
    return view('livewire/graficos/clientes-cadastrados');
  }
}
