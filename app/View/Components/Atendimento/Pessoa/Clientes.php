<?php

namespace App\View\Components\Atendimento\Pessoa;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Atendimento\Pessoa as DBPessoa;

class Clientes extends Component
{
    public function __construct()
    {

    }

    public function pessoas()
    {
        return cache()->rememberForever( //live pinguim Laravel Blade Components - Parte 2 - a partir d minuto 49
            'Atendimento::Pessoa',
            fn() => DBPessoa::
                            // clientes()->
                            orderBy('apelido', 'asc')->
                            get()
        );

        return DBPessoa::
                    // clientes()->
                    orderBy('apelido', 'asc')->
                    get();
    }

    public function render(): View|Closure|string
    {
        return view('components.atendimento.pessoas.pessoas-select');
    }
}
