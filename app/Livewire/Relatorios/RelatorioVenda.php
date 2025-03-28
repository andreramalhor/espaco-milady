<?php

namespace App\Livewire\Relatorios;

use Livewire\Component;

class RelatorioVenda extends Component
{    
    public function render()
    {        
        return view('livewire.relatorios.vendas')->layout('layouts/bootstrap');
    }
}
