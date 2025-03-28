<?php

namespace App\Livewire\Consulta;

use App\Models\PDV\Comanda as DBComanda;
use App\Models\PDV\Caixa as DBCaixa;
use Livewire\Component;
use Livewire\WithPagination;

class ConsultaVendas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $quadro = 'resumo';

    public $inicio;
    public $final;

    public $p_id_cliente;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount()
    {
        $this->inicio = \Carbon\Carbon::today()->startOfMonth()->format('Y-m-d');
        $this->final  = \Carbon\Carbon::today()->endOfMonth()->format('Y-m-d');
    }

    public function trocar_quadro( $quadro )
    {
        $this->quadro = $quadro;
    }

    public function listar_vendas_detalhes()
    {
        $inicio = $this->inicio;
        $final  = $this->final;
        $p_id_cliente  = $this->p_id_cliente;

        $vendas_detalhes = DBComanda::
                        whereHas('opadsiwmeqwiiwe', function ($query) use ( $inicio, $final )
                        {
                            $query->whereBetween('dt_abertura', [ $inicio, $final ]);
                        })->
                        when($p_id_cliente && $p_id_cliente != "Todos", function ($query) use ($p_id_cliente)
                        {
                            if($p_id_cliente == "(Cliente não cadastrado)")
                            {
                                $query->where('id_cliente', '=', 0);
                            }
                            else
                            {
                                $query->where('id_cliente', '=', $p_id_cliente);
                            }
                        })->
                        orderBy('id', 'asc')->
                        with(['opadsiwmeqwiiwe'])->
                        paginate(100);

        return $vendas_detalhes;
    }

    public function listar_vendas_caixas()
    {
        $inicio = $this->inicio;
        $final  = $this->final;

        $caixas = DBCaixa::
                        whereBetween('dt_abertura', [ $inicio, $final ])->
                        orderBy('id', 'asc')->
                        get();

        return $caixas;
    }

    public function render()
    {
        $vendas_detalhes = $this->listar_vendas_detalhes();
        $vendas_caixas   = $this->listar_vendas_caixas();

        return view('livewire/consulta/vendas', [
            'vendas_detalhes' => $vendas_detalhes,
            'vendas_caixas'   => $vendas_caixas,
        ])->layout('layouts/bootstrap');
    }
}
