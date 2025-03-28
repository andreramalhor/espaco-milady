<?php

namespace App\Livewire\Relatorios;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;

class RelatorioCadastro extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $aaaaa; 
    
    public function mount()
    {
        $this->aaaaa = 11;
    }

    public function render()
    {
        $aaaaa = $this->aaaaa;
        
        return view('livewire.relatorios.cadastros', [
            'aaaaa' => $aaaaa
        ])->layout('layouts/bootstrap');
    }
}
