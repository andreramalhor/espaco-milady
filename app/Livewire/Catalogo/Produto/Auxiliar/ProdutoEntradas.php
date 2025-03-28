<?php

namespace App\Livewire\Catalogo\Produto\Auxiliar;

use App\Models\Catalogo\CompraDetalhe as DBCompraDetalhe;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoEntradas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $produto;

    public function mount($produto)
    {
        $this->produto = $produto;
    }
    
    public function render()
    {
        $entradas = DBCompraDetalhe::
                            where('id_servprod', '=', $this->produto->id)->
                            paginate();

        return view('livewire/catalogo/produto/auxiliar/produto-mostrar-entradas', [
            'entradas' => $entradas
        ]);
    }
}
