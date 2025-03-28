<?php

namespace App\Livewire\Financeiro\Banco;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Financeiro\Banco as DBBanco;

class BancoExtrato extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $banco;

    public $inicio;
    public $final;

    protected $listeners = ['chamarMetodo' => 'deletar'];

    public function mount($id)
    {
        $this->banco = DBBanco::find($id);

        $this->inicio = \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->final  = \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    public function listar()
    {
        return DBBanco::extrato($this->banco->id, $this->inicio, $this->final);
    }

    public function render()
    {
        $saldo_inicial = DBBanco::saldoAte($this->banco->id, $this->inicio); 
        $extrato       = $this->listar();

        return view('livewire/financeiro/banco/banco-extrato', [
            'saldo_inicial' => $saldo_inicial,
            'extrato'       => $extrato,
        ])->layout('layouts/bootstrap');
    }
}
