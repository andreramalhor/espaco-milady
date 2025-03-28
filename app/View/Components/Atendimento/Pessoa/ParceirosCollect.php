<?php

namespace App\View\Components\Atendimento\Pessoa;

use Closure;
use Illuminate\View\Component;

use App\Models\Agendamento\Ordem as DBOrdem;

class ParceirosCollect extends Component
{
    public $relacionamento;
    public $selecionado;

    public function __construct($relacionamento=null, $selecionado=null)
    {
        $this->relacionamento = $relacionamento;
        $this->selecionado    = $selecionado;
    }

    public function render()
    {
        $ordem = DBOrdem::
                                select('ordem', 'area', 'id_pessoa' )->
                                where('auth_user', '=', auth()->User()->id)->
                                with('oewoekdwjzsdlkd')->
                                get();

        return $ordem;
    }
}