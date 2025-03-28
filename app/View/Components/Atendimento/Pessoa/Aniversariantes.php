<?php

namespace App\View\Components\Atendimento\Pessoa;

use Illuminate\View\Component;

use App\Models\Atendimento\Pessoa as DBPessoa;

class Aniversariantes extends Component
{
    public $aniversariantes;

    public function __construct()
    {
        $this->aniversariantes = DBPessoa::where('dt_nascimento', '=', \Carbon\Carbon::today())->get();
    }
    
    public function render()
    {
        return view('components.atendimento.pessoas.aniversariantes', [
            'aniversariantes' => $this->aniversariantes,
        ]);
    }
}
