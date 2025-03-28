<?php

namespace App\Livewire\Atendimento\Pessoa;

use Livewire\Component;

class PessoaFiltrar extends Component
{
    public $exibir_ocultar = false;
    
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function trocar_tela()
    {
        $this->exibir_ocultar = !$this->exibir_ocultar;
    }

    public function render()
    {
        return view('livewire/atendimento/pessoa/pessoa-filtrar');
    }
}
