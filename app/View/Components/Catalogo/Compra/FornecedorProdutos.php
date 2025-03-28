<?php

namespace App\View\Components\Catalogo\Compra;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Catalogo\Compra as DBCompra;

use App\Models\Catalogo\Categoria as DBCategoria;

class FornecedorProdutos extends Component
{
    public $id_fornecedor;

    public function __construct($id_fornecedor=99)
    {
        dd($id_fornecedor);
        $this->id_fornecedor = $id_fornecedor;
        
        $produtos = DBServicoProduto::where('id_fornecedor', '=', $id_fornecedor)->get();

    }


    public function render(): View|Closure|string
    {
        $produtos = DBServicoProduto::where('id_fornecedor', '=', $id_fornecedor)->get();

        return view('livewire/catalogo/compra/auxiliar/compra-criar-fornecedor-produto', [
            'produtos' => $produtos
        ]);
    }
}
