<?php

namespace App\View\Components\Atendimento\Agendamento;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Gate;

use App\Models\Agendamento\Ordem as DBOrdem;
use App\Models\Atendimento\Pessoa as DBPessoa;

class Resources extends Component
{   
    public function render(): View|Closure|string
    {
        if(Gate::allows('Ver todas agendas'))
        {
            $resources = 
                auth()->user()->aslfenvkvuelkds()->
                where('nome_ordem', '=', auth()->user()->ordem ?? 'Todos' )->
                orderBy('ordem', 'asc')->
                get()->
                map(function ($pessoa)
                {
                    $pessoa->id            = $pessoa->id_pessoa;
                    $pessoa->title         = optional($pessoa->oewoekdwjzsdlkd)->apelido;
                    $pessoa->src_foto      = optional($pessoa->oewoekdwjzsdlkd)->src_foto;
                    $pessoa->primeiro_nome = optional($pessoa->oewoekdwjzsdlkd)->primeiro_nome;
                    
                    return $pessoa;
                });
        }
        elseif( Gate::allows('Ver minha agenda') || Gate::allows('Ver agendamentos') )
        {
            $resources = 
                DBPessoa::
                where('id', '=', auth()->user()->id)->
                get()->
                map(function ($pessoa)
                {
                    $pessoa->id            = $pessoa->id;
                    $pessoa->title         = $pessoa->apelido;
                    $pessoa->src_foto      = $pessoa->src_foto;
                    $pessoa->primeiro_nome = $pessoa->primeiro_nome;
                    
                    return $pessoa;
                });
        }
        else
        {
            dd(13);
            return redirect()->back();
        }

        return $resources;
    }
}

