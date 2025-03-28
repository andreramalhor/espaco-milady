<?php

namespace App\View\Components\Financeiro\Banco;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Financeiro\Banco as DBBanco;

class BancosGrafico extends Component
{
    public $labels = [];
    public $dados  = [];

    public function __construct()
    {
        // Busque os dados do banco de dados
        $dados = DBBanco::get();

        // Prepare os dados para o gráfico
        foreach ($dados as $item)
        {
            $this->labels[] = $item->nome; // Supondo que 'nome' seja uma coluna da tabela
            $this->dados[]  = $item->saldo_atual;  // Supondo que 'valor' seja uma coluna da tabela
        }
    }
    
    public function bancos()
    {
        return DBBanco::orderBy('nome', 'asc')->get();
    }
    
    public function render(): View|Closure|string
    {
        return view('components/financeiro/banco/bancos-grafico');
    }
}
