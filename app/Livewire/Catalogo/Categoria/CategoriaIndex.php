<?php

namespace App\Livewire\Catalogo\Categoria;

use App\Models\Cadastro\Categoria as DBCategoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaIndex extends Component
{
    use WithPagination;

    public $pesquisar = '';
    public $orderBy = 'nome';
    public $orderAsc = 'true';
    public $perPage = 10;
    
    public $nome;
    public $tipo;
    public $descricao;

    public function render()
    {
        $categorias = DBCategoria::
                            procurar($this->pesquisar)->
                            orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')->
                            paginate($this->perPage);

        return view('livewire/cadastro/categoria/categoria-index', [
            'categorias' => $categorias,
        ])->layout('layouts/bootstrap');
    }
}
