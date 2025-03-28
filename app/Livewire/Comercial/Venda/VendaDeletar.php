<?php

namespace App\Livewire\Comercial\Venda;

use App\Models\Comercial\Venda as DBComanda;
use Livewire\Component;

class VendaDeletar extends Component
{
    public $venda;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $venda = DBComanda::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $venda->nome,
            'text'         => 'Tem certeza que quer deletar a venda?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $venda->id,
        ]);
    }
    
    public function delete($id)
    {
        $venda = DBComanda::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $venda->nome,
            'text'         => 'Tem certeza que quer deletar a venda?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $venda->id,
        ]);
    }

    public function render($id)
    {
        $venda = DBComanda::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$venda->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Permissão e foto deletada com sucesso!';
        }

        $venda->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Permissão deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Permissão Deletada!');

        // Atualiza a lista de vendas no componente PermissãoIndex
        $this->dispatch('vendaDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/atendimento/venda/venda-delete')->layout('layouts/bootstrap');
    // }
}
