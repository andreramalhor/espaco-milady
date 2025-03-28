<?php

namespace App\Livewire\Atendimento\Agendamento;

use App\Models\Atendimento\Agendamento as DBAgendamento;
use Livewire\Component;

class AgendamentoDeletar extends Component
{
    public $agendamento;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $agendamento = DBAgendamento::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $agendamento->nome,
            'text'         => 'Tem certeza que quer deletar a agendamento?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $agendamento->id,
        ]);
    }
    
    public function delete($id)
    {
        $agendamento = DBAgendamento::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $agendamento->nome,
            'text'         => 'Tem certeza que quer deletar a agendamento?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $agendamento->id,
        ]);
    }

    public function render($id)
    {
        $agendamento = DBAgendamento::withTrashed()->find($id);
        
        $informacao = [
            'start' => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->startOfDay()->format('Y-m-d H:i:s'),
            'end'   => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->endOfDay()->format('Y-m-d H:i:s'),
        ];

        $agendamento->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Agendamento deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Agendamento Deletada!');

        
        $this->dispatch('fullcalendar-refresh', $informacao['start'], $informacao['end'] );
              
        // Atualiza a lista de agendamentos no componente AgendamentoIndex
        $this->dispatch('agendamentoDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/atendimento/agendamento/agendamento-delete')->layout('layouts/bootstrap');
    // }
}
