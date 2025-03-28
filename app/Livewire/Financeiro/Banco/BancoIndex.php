<?php

namespace App\Livewire\Financeiro\Banco;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Financeiro\Banco as DBBanco;

class BancoIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pesquisar = '';
    
    public function listar()
    {
        $bancos = DBBanco::
                        procurar($this->pesquisar)->
                        paginate(10);

        return $bancos;
    }

    public function render()
    {
        $bancos = $this->listar();

        return view('livewire/financeiro/banco/banco-index', [
            'bancos' => $bancos,
        ])->layout('layouts/bootstrap');
    }
}
