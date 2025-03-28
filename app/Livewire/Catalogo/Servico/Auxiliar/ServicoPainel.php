<?php

namespace App\Livewire\Catalogo\Servico\Auxiliar;

use Livewire\Component;

class ServicoPainel extends Component
{
    public $servico;
    public $estoque_perc;

    public function mount($servico)
    {
        $this->servico = $servico;

        $this->estoque_perc = ( ( ( $servico->estoque_atual - $servico->estoque_min) / ($servico->estoque_max - $servico->estoque_min) ) * 100 ) ;
    }
    
    public function render()
    {
        return view('livewire/catalogo/servico/auxiliar/servico-mostrar-painel');
    }
}
