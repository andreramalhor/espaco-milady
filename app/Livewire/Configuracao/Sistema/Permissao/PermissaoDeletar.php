<?php

namespace App\Livewire\Configuracao\Sistema\Permissao;

use App\Models\ACL\Permissao as DBPermissao;
use Livewire\Component;

class PermissaoDeletar extends Component
{
    public $permissao;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $permissao = DBPermissao::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $permissao->nome,
            'text'         => 'Tem certeza que quer deletar a permissao?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $permissao->id,
        ]);
    }
    
    public function delete($id)
    {
        $permissao = DBPermissao::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $permissao->nome,
            'text'         => 'Tem certeza que quer deletar a permissao?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $permissao->id,
        ]);
    }

    public function render($id)
    {
        $permissao = DBPermissao::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$permissao->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Permissão e foto deletada com sucesso!';
        }

        $permissao->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Permissão deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Permissão Deletada!');

        // Atualiza a lista de permissaos no componente PermissãoIndex
        $this->dispatch('permissaoDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/atendimento/permissao/permissao-delete')->layout('layouts/bootstrap');
    // }
}
