<?php

namespace App\Livewire\Catalogo\Produto\Auxiliar;

use App\Models\Catalogo\SaidaDetalhe as DBSaidaDetalhe;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoSaidas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $produto;

    public function render()
    {
        $saidas = DBSaidaDetalhe::
                            where('id_servprod', '=', $this->produto->id)->
                            paginate();

        return view('livewire/catalogo/produto/auxiliar/produto-mostrar-saidas', [
            'saidas' => $saidas
        ]);
    }
}
