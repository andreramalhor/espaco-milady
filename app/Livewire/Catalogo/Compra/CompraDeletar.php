<?php

namespace App\Livewire\Catalogo\Compra;

use App\Models\Catalogo\Compra as DBCompra;
use Livewire\Component;

class CompraDeletar extends Component
{
    public $compra;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $compra = DBCompra::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $compra->nome,
            'text'         => 'Tem certeza que quer deletar a compra?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $compra->id,
        ]);
    }
    
    public function delete($id)
    {
        $compra = DBCompra::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $compra->nome,
            'text'         => 'Tem certeza que quer deletar a compra?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $compra->id,
        ]);
    }

    public function render($id)
    {
        $compra = DBCompra::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$compra->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Compra e foto deletada com sucesso!';
        }

        $compra->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Compra deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Compra Deletada!');

        // Atualiza a lista de compras no componente CompraIndex
        $this->dispatch('compraDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/catalogo/compra/compra-delete')->layout('layouts/bootstrap');
    // }
}
