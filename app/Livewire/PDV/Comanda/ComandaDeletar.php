<?php

namespace App\Livewire\PDV\Comanda;

use App\Models\PDV\Comanda as DBComanda;
use Livewire\Component;

class ComandaDeletar extends Component
{
    public $Comanda;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $Comanda = DBComanda::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $Comanda->nome,
            'text'         => 'Tem certeza que quer deletar a Comanda?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $Comanda->id,
        ]);
    }
    
    public function delete($id)
    {
        $Comanda = DBComanda::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $Comanda->nome,
            'text'         => 'Tem certeza que quer deletar a Comanda?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $Comanda->id,
        ]);
    }

    public function render($id)
    {
        $Comanda = DBComanda::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$Comanda->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Comanda e foto deletada com sucesso!';
        }

        $Comanda->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Comanda deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Comanda Deletada!');

        // Atualiza a lista de Comandas no componente ComandaIndex
        $this->dispatch('ComandaDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/pdv/Comanda/Comanda-delete')->layout('layouts/bootstrap');
    // }
}
