<?php

namespace App\Livewire\Atendimento\Pessoa\Auxiliar;

use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use Livewire\Component;
use Livewire\WithPagination;

class PessoaAgendamentos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $pessoa;

    public function render()
    {
        $agendamentos = DBAgendamento::
                                    where('id_cliente', '=', $this->pessoa->id)->
                                    paginate();

        return view('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-agendamentos', [
            'agendamentos' => $agendamentos
        ]);
    }
}
