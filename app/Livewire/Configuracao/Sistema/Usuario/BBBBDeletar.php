<?php

namespace App\Livewire\Configuracao\Sistema\Usuario;

use App\Models\User as DBUsuario;
use Livewire\Component;

class BBBBDeletar extends Component
{
    public $usuario;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function delete($id)
    {
        $usuario = DBUsuario::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $usuario->nome,
            'text'         => 'Tem certeza que quer remover o usuário do sistema?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $usuario->id,
        ]);
    }

    public function remove($id)
    {
        $usuario = DBUsuario::find($id);

        if($usuario != null)
        {
            $usuario->delete();
                
            $this->dispatch('swal:alert', [
                'title'         => 'Deletado!',
                'text'          => $texto ?? 'Acessos do usuário removido do sistema com sucesso!',
                'icon'          => 'success',
                'iconColor'     => 'green',
            ]);
    
            session()->flash('success', 'Usuário removido!');
        }

        // Atualiza a lista de usuarios no componente AAAAIndex
        $this->dispatch('usuarioDeleted');
    }

    public function render()
    {
        return view('livewire/configuracao/sistema/usuario/usuario/usuario-delete')->layout('layouts/bootstrap');
    }
}
