<?php

namespace App\Livewire\PDV\Caixa;

use Livewire\Component;

class CaixaFiltrar extends Component
{
    public $exibir_ocultar = false;
    
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function trocar_tela()
    {
        $this->exibir_ocultar = !$this->exibir_ocultar;
    }

    public function render()
    {
        return view('livewire/pdv/caixa/caixa-filtrar');
    }
}
