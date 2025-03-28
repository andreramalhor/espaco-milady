<?php

namespace App\Livewire\Relatorios;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;
use Livewire\WithPagination;

class Estoque extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $total_estoque; 
    public $custo_estoque; 
    
    public function mount()
    {
        $this->total_estoque = DBServicoProduto::all()->collect()->sum('estoque_atual');
        $this->custo_estoque = DBServicoProduto::all()->collect()->sum('custo_estoque');
    }

    public function render()
    {
        $produtos = DBServicoProduto::paginate(9999);

        return view('livewire.relatorios.estoque', [
            'produtos' => $produtos
        ])->layout('layouts/bootstrap');
    }
}
