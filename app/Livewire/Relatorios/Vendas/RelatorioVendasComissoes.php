<?php

namespace App\Livewire\Relatorios\Vendas;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Financeiro\ContaInterna as DBContaInterna;

class RelatorioVendasComissoes extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $ano;
    public $formato;

    public $comissoes;
    
    public function mount()
    {
		$this->ano = \Carbon\Carbon::today()->format('Y');
	}

	public function render()
    {
		$this->comissoes = DBContaInterna::
										whereBetween('created_at', [$this->ano.'-01-01 00:00:00', $this->ano.'-12-31 23:59:59'])->
										whereIn('fonte_origem', ['pdv_vendas_detalhes'])->
										where('status', '=', 'Confirmado')->
										select(\DB::raw('SUM(valor) AS valor'), 'id_pessoa', \DB::raw('MONTH(created_at) AS month'))->
										groupby('month', 'id_pessoa')->
										orderBy('month')->
										with('xeypqgkmimzvknq')->
										get()->
										sortBy('xeypqgkmimzvknq.apelido');
		
		return view('livewire.relatorios.vendas.comissoes', [
			'comissoes' => $this->comissoes
		])->layout('layouts/bootstrap');
	}
}
