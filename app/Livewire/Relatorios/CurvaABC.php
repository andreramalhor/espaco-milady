<?php

namespace App\Livewire\Relatorios;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class CurvaABC extends Component
{
    public $produtos;
    public $custo_total_estoque;
    
    public function mount()
    {
        $this->produtos = DBServicoProduto::get();
        $this->custo_total_estoque = $this->produtos->sum('custo_estoque');
    }

    public function render()
    {
        return view('livewire.relatorios.curva-abc')->layout('layouts/bootstrap');
    }
}
