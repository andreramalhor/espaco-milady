<?php

namespace App\Livewire\Financeiro\Gerencial;

use Livewire\Component;

use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\Contabilidade\ContaContabil as DBContaContabil;

class GerencialPlanoContas extends Component
{
    public $periodo;
    public $ano;

    public $contas_contabeis;
    public $lancamentos;
    
    protected $listeners = [
        'chamarMetodo' => 'remove',
        'chamar-modal' => 'chamar_modal',
        'listar-this->lancamentos' => 'listar',
    ];

    public function mount()
    {
        $this->ano = \Carbon\Carbon::now()->year;
        $this->listar();
    }

    public function listar()
    {
        $this->inicio = $this->inicio ?? \Carbon\Carbon::create($this->ano)->startOfYear();
        $this->final  = $this->final ?? \Carbon\Carbon::create($this->ano)->endOfYear();

        $this->lancamentos = DBLancamento::whereBetween('created_at', [ $this->inicio, $this->final ])->get();
        
        // $this->contas_contabeis = DBContaContabil::get();
        $this->contas_contabeis = DBContaContabil::where('id', '!=', 3)->get(); // Ou where('id', '<>', 3)
        // $this->contas_contabeis = DBContaContabil::whereIn('id', [ 1, 2 ])->get();
    }

    public function render()
    {
        return view('livewire/financeiro/gerencial/plano-contas-2')->layout('layouts/bootstrap');
        // return view('livewire/financeiro/gerencial/plano-contas')->layout('layouts/bootstrap');
    }
}
