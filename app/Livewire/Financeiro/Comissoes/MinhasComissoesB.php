<?php

namespace App\Livewire\Financeiro\Comissoes;

use App\Models\Financeiro\ContaInterna as DBContaInterna;
use Livewire\Component;

class MinhasComissoesB extends Component
{
  public $id;
  public $pagamentos;
  public $comissoes_pagas;
  
  public function mount($id=null)
  {
    $this->id = auth()->user()->id;
    $this->pagamentos = DBContaInterna::
                                      select('id_destino', 'dt_quitacao', \DB::raw('SUM(valor) as total_valor'), \DB::raw('COUNT(valor) as qtd_valor'))->
                                      where('id_pessoa', '=', $this->id)->
                                      where('status', '=', 'Confirmado')->
                                      groupBy('id_destino', 'dt_quitacao')->
                                      get();
  }

  public function ver_comissoes( $id_pagamento )
  {
    $this->comissoes_pagas = DBContaInterna::
                                            where('id_pessoa', '=', $this->id)->
                                            where('status', '=', 'Confirmado')->
                                            where('id_destino', '=', $id_pagamento)->
                                            get();
  }

  public function render()
  {
    return view('livewire/financeiro/comissoes/minhas-comissoes-pagas')->layout('layouts/bootstrap');
  }
}
