<?php

namespace App\View\Components\Atendimento\Pessoa;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Atendimento\Pessoa;

class SobrePessoa extends Component
{
    public $pessoa;

    public function __construct($pessoa=null)
    {
        $this->pessoa = $pessoa;
    }

    public function pessoa()
    {
        return Pessoa::find($this->pessoa->id);
    }

    public function render(): View|Closure|string
    {
        return view('components.atendimento.pessoas.sobre-pessoa');
    }
}
