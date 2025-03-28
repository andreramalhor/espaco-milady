<?php

namespace App\Livewire\Catalogo\Compra\Auxiliar;

use App\Models\Catalogo\Compra as DBCompra;
use App\Models\Catalogo\Agendamento as DBAgendamento;
use Livewire\Component;
use Livewire\WithPagination;

class CompraAgendamentos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $compra;

    public function render()
    {
        $agendamentos = DBAgendamento::
                                    where('id_cliente', '=', $this->compra->id)->
                                    paginate();

        return view('livewire/catalogo/compra/auxiliar/compra-mostrar-agendamentos', [
            'agendamentos' => $agendamentos
        ]);
    }
}
