<?php

namespace App\Livewire\Financeiro\Comissoes;

use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Financeiro\ContaInterna as DBContaInterna;
use Livewire\Component;

class FinComissoesPagas extends Component
{
  public $id;
  public $colaboradores;
  public $pagamentos;
  public $comissoes_pagas;
  
  public function mount($id=null)
  {
    $this->id = $id;
    
    $this->colaboradores = DBPessoa::colaboradores()->orderBy('apelido')->get();

    if(!is_null($this->id))
    {
      $this->pagamentos = DBContaInterna::
                                          select('id_destino', 'dt_quitacao', \DB::raw('SUM(valor) as total_valor'), \DB::raw('COUNT(valor) as qtd_valor'))->
                                          where('id_pessoa', '=', $this->id)->
                                          where('status', '=', 'Confirmado')->
                                          groupBy('id_destino', 'dt_quitacao')->
                                          get();
    }
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
    if(!is_null($this->id))
    {
      return view('livewire/financeiro/comissoes/comissoes-pagas-prof')->layout('layouts/bootstrap');
    }
    else
    {
      return view('livewire/financeiro/comissoes/comissoes-pagas')->layout('layouts/bootstrap');
    }
  }
}
