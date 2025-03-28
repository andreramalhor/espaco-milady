<?php

namespace App\Livewire\Configuracao\Comissoes;

use App\Models\ACL\Comissoes as DBComissoes;
use Livewire\Component;

class ComissoesDeletar extends Component
{
    public $comissao;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $comissao = DBComissoes::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $comissao->nome,
            'text'         => 'Tem certeza que quer deletar a comissao?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $comissao->id,
        ]);
    }
    
    public function delete($id)
    {
        $comissao = DBComissoes::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $comissao->nome,
            'text'         => 'Tem certeza que quer deletar a comissao?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $comissao->id,
        ]);
    }

    public function render($id)
    {
        $comissao = DBComissoes::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$comissao->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Permissão e foto deletada com sucesso!';
        }

        $comissao->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Permissão deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Permissão Deletada!');

        // Atualiza a lista de comissaos no componente PermissãoIndex
        $this->dispatch('comissaoDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/atendimento/comissao/comissao-delete')->layout('layouts/bootstrap');
    // }
}
