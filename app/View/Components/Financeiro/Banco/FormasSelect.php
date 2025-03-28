<?php

namespace App\View\Components\Financeiro\Banco;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Configuracao\FormaPagamento as DBFormaPagamento;

class FormasSelect extends Component
{
    public function __construct()
    {

    }

    public function formas()
    {
        // return cache()->rememberForever( //live pinguin Laravel Blade Components - Parte 2 - a partir d minuto 49
            // 'user::manager',
            // fn() => Pessoa::formas()->orderBy('apelido', 'asc')->get()
        // );

        return DBFormaPagamento::
                    // orderBy('apelido', 'asc')->
                    select('forma')->
                    distinct()->
                    get();
    }

    public function render(): View|Closure|string
    {
        return view('components/financeiro/banco/formas-select');
    }
}
