<?php

namespace App\View\Components\Catalogo;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;

class ServicoProduto extends Component
{
    public function __construct()
    {
    }

    public function servprods()
    {
        // return cache()->rememberForever( //live pinguin Laravel Blade Components - Parte 2 - a partir d minuto 49
            // 'user::manager',
            // fn() => DBServicoProduto::clientes()->orderBy('apelido', 'asc')->get()
        // );

        return DBServicoProduto::
                        // where('tipo', '=', $this->tipo)->
                        // when($this->id_fornecedor, function ($q)
                        // {
                        //     $q-where('id_fornecedor', '=', $this->id_fornecedor);
                        // })->
                        get();
    }

    public function render(): View|Closure|string
    {
        return view('components.catalogo.servprod-select');
    }
}
