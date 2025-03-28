<?php

namespace App\Livewire\Configuracao\Sistema\Permissao;

use Livewire\Component;

class PermissaoIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function render()
    {
        return view('livewire/configuracao/sistema/permissao/permissao-index')->layout('layouts/bootstrap');
    }
}
