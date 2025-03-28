<?php

namespace App\Livewire\Configuracao\PlanoContas;

use App\Models\Contabilidade\ContaContabil as DBContaContabil;
use Livewire\Component;

class PlanoContasDeletar extends Component
{
    public $plano_de_conta;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $plano_de_conta = DBContaContabil::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $plano_de_conta->nome,
            'text'         => 'Tem certeza que quer deletar a plano_de_conta?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $plano_de_conta->id,
        ]);
    }
    
    public function delete($id)
    {
        $plano_de_conta = DBContaContabil::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $plano_de_conta->nome,
            'text'         => 'Tem certeza que quer deletar a plano_de_conta?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $plano_de_conta->id,
        ]);
    }

    public function render($id)
    {
        $plano_de_conta = DBContaContabil::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$plano_de_conta->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Permissão e foto deletada com sucesso!';
        }

        $plano_de_conta->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Permissão deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Permissão Deletada!');

        // Atualiza a lista de plano_de_contas no componente PermissãoIndex
        $this->dispatch('plano_de_contaDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/atendimento/plano_de_conta/plano_de_conta-delete')->layout('layouts/bootstrap');
    // }
}
