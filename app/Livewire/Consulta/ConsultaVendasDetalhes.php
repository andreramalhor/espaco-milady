<?php

namespace App\Livewire\Consulta;

use App\Models\PDV\ComandaDetalhe as DBComandaDetalhe;
use Livewire\Component;
use Livewire\WithPagination;

class ConsultaVendasDetalhes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $pesquisar = '';

    public $inicio;
    public $final;

    public $p_id_cliente;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount()
    {
        $this->inicio = \Carbon\Carbon::today()->startOfMonth()->format('Y-m-d');
        $this->final  = \Carbon\Carbon::today()->endOfMonth()->format('Y-m-d');
    }

    public function listar()
    {
        $inicio = $this->inicio;
        $final  = $this->final;
        $p_id_cliente  = $this->p_id_cliente;

        $vendas = DBComandaDetalhe::
                            whereHas('csoiwjeirwifjed', function ($query) use ( $inicio, $final )
                            {
                                $query->whereBetween('dt_abertura', [ $inicio, $final ]);
                            })->
                            when($p_id_cliente && $p_id_cliente != "Todos", function ($query) use ($p_id_cliente)
                            {
                                $query->
                                whereHas('sbbgaqleesuzlus', function($query) use ($p_id_cliente)
                                {
                                    if($p_id_cliente == "(Cliente não cadastrado)")
                                    {
                                        $query->where('id_cliente', '=', 0);
                                    }
                                    else
                                    {
                                        $query->where('id_cliente', '=', $p_id_cliente);
                                    }
                                });
                            })->
                            orderBy('created_at', 'asc')->
                            paginate(100);

        return $vendas;
    }

    public function render()
    {
        $vendas = $this->listar();

        return view('livewire/consulta/vendas', [
            'vendas' => $vendas,
        ])->layout('layouts/bootstrap');
    }
}
