<?php

namespace App\Livewire\PDV\Caixa;

use App\Models\PDV\Caixa as DBCaixa;
use Livewire\Component;

class CaixaDeletar extends Component
{
    public $caixa;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $caixa = DBCaixa::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $caixa->nome,
            'text'         => 'Tem certeza que quer deletar a caixa?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $caixa->id,
        ]);
    }
    
    public function delete($id)
    {
        $caixa = DBCaixa::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $caixa->nome,
            'text'         => 'Tem certeza que quer deletar a caixa?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $caixa->id,
        ]);
    }

    public function render($id)
    {
        $caixa = DBCaixa::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$caixa->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Caixa e foto deletada com sucesso!';
        }

        $caixa->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Caixa deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Caixa Deletada!');

        // Atualiza a lista de caixas no componente CaixaIndex
        $this->dispatch('caixaDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/pdv/caixa/caixa-delete')->layout('layouts/bootstrap');
    // }
}
