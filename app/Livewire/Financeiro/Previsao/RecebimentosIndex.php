<?php

namespace App\Livewire\Financeiro\Previsao;

use Livewire\Component;

use App\Models\Financeiro\RecebimentoCartao as DBRecebimentoCartao;

class RecebimentosIndex extends Component
{    
    public $inicio;
    public $final;
    
    protected $listeners = ['chamarMetodo' => 'deletar'];
    
    public function mount()
    {       
        $this->inicio = \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->final  = \Carbon\Carbon::now()->endOfYear()->format('Y-m-d');
    }
    
    public function listar()
    {
        return DBRecebimentoCartao::
                                    where('status', 'Aguardando')->
                                    whereBetween('dt_prevista', [$this->inicio, $this->final])->
                                    get();
    }
    
    public function render()
    {
        $recebimentos = $this->listar();

        return view('livewire/financeiro/recebimentos/previsao', [
            'recebimentos' => $recebimentos,
        ])->layout('layouts/bootstrap');
    }
}
    