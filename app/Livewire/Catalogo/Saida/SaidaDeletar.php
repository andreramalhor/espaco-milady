<?php

namespace App\Livewire\Catalogo\Saida;

use App\Models\Catalogo\Saida as DBSaida;
use Livewire\Component;

class SaidaDeletar extends Component
{
    public $saida;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $saida = DBSaida::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $saida->nome,
            'text'         => 'Tem certeza que quer deletar a saida?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $saida->id,
        ]);
    }
    
    public function delete($id)
    {
        $saida = DBSaida::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $saida->nome,
            'text'         => 'Tem certeza que quer deletar a saida?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $saida->id,
        ]);
    }

    public function render($id)
    {
        $saida = DBSaida::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$saida->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Saida e foto deletada com sucesso!';
        }

        $saida->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Saida deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Saida Deletada!');

        // Atualiza a lista de saidas no componente SaidaIndex
        $this->dispatch('saidaDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/catalogo/saida/saida-delete')->layout('layouts/bootstrap');
    // }
}
