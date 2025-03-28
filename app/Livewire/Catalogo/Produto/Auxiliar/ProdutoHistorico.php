<?php

namespace App\Livewire\Catalogo\Produto\Auxiliar;

use Livewire\Component;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;

class ProdutoHistorico extends Component
{    
    public $amount = 10;

    public $p_pessoa;

    public $produto;

    public function mount(DBServicoProduto $produto)
    {
        $this->produto = $produto;
    }

    public function listar()
    {
        $p_pessoa = $this->p_pessoa;

        $vendas = $this->produto->
                                weriwjerihdwhsq()->
                                when($p_pessoa, function ($query) use ($p_pessoa)
                                {
                                    $query->where('id_servprod', '=', $p_pessoa);
                                })->
                                orderBy('created_at', 'desc')->
                                take($this->amount)->
                                get();
                                // paginate();

        return $vendas;
    }

    public function load()
    {
        $this->amount += 10;
    }

    public function render()
    {
        $vendas = $this->listar();

        return view('livewire/catalogo/produto/auxiliar/produto-mostrar-historico', [
            'vendas' => $vendas,
        ]);
    }
}
