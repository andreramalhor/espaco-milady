<?php

namespace App\Livewire\Financeiro\Comissoes;

use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Financeiro\ContaInterna as DBContaInterna;
use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\Financeiro\Banco as DBBanco;
use Livewire\Component;

class FinComissoesAbertas extends Component
{
  public $id;
  public $colaboradores;
  public $comissoes_abertas;

  public $a_pagar = [];
  public $a_pagar_todos = false;
  public $a_pagar_desativado = [];

  public $bancos;
  public $banco;
  public $caixas;
  public $caixa;

  public function mount($id=null)
  {
    $this->a_pagar = collect();
    
    $this->id = $id;
    
    $this->colaboradores = DBPessoa::colaboradores()->orderBy('apelido')->get();
  }

  public function banco_mudar( $escolhido )
  {
    $this->banco = DBBanco::where('nome', '=', $escolhido)->first();
  }

  public function marcar_todos( $status )
  {
    if($status)
    {
      $this->a_pagar = $this->comissoes_abertas->pluck('id');
    }
    else
    {
      $this->a_pagar = collect();
    }
  }
  
  public function comissoes_pagar()
  {
    $comissoes = DBContaInterna::whereIn('id', $this->a_pagar)->get();

    $lancamento = DBLancamento::create([
      'tipo'                    => 'D',
      'id_banco'                => $this->caixas->rybeyykhpcgwkgr->id_banco ?? null,
      'id_conta'                => 167,
      'num_documento'           => null,
      'id_cliente'              => $this->id,
      'informacao'              => 'Pagamento de comissões de '.DBPessoa::find($this->id)->apelido,
      'vlr_bruto'               => $comissoes->sum('valor'),
      'vlr_dsc_acr'             => 0,
      'vlr_final'               => $comissoes->sum('valor'),
      'parcela'                 => '01/01',
      'id_forma_pagamento'      => 1,
      'descricao'               => null,
      'dt_vencimento'           => \Carbon\Carbon::today(),
      'dt_competencia'          => \Carbon\Carbon::today(),
      'dt_confirmacao'          => \Carbon\Carbon::today(),
      'dt_quitacao'            => \Carbon\Carbon::today(),
      'id_usuario_lancamento'   => auth()->user()->id,
      'id_usuario_confirmacao'  => auth()->user()->id,
      'id_caixa'                => $this->caixas->id ?? null,
      'id_lancamento_origem'    => null,
      'origem'                  => 'fin_conta_interna',
      'status'                  => 'Confirmado',
      'centro_custo'            => null, 
    ]);
    
    $comissoes_a_pagar = DBContaInterna::
                                        whereIn('id', $this->a_pagar)->
                                        update([
                                          'status'        => 'Confirmado',
                                          'dt_quitacao'   => $lancamento->created_at,
                                          'id_destino'    => $lancamento->id,
                                          'fonte_destino' => 'fin_lancamentos',
                                          'updated_at'    => $lancamento->created_at,
                                        ]);
                                        
    $this->dispatch('swal:alert', [
      'title'         => 'Confirmado!',
      'text'          => $texto ?? 'Comissões pagas com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
  }
  
  public function render()
  {
    if(!is_null($this->id))
    {
      $this->a_pagar_desativado = count($this->a_pagar) > 1;

      if($this->id == 0)
      {
        $this->comissoes_abertas = DBContaInterna::
                                                whereNull('id_pessoa')->
                                                where('status', '=', 'Em aberto')->
                                                whereBetween('created_at', [ \Carbon\Carbon::today()->subMonth(1)->startOfDay(), \Carbon\Carbon::today()->endOfDay() ])->
                                                get();      
      }
      else
      {
        $this->comissoes_abertas = DBContaInterna::
                                                where('id_pessoa', '=', $this->id)->
                                                where('status', '=', 'Em aberto')->
                                                get();
      }

      $this->caixas = auth()->user()->abcdefghijklmno( true )->first();

      if(!is_null(value: $this->caixas))
      {
        $this->caixa = $this->caixas->id;
        $this->banco = $this->caixas->rybeyykhpcgwkgr;
      }

      return view('livewire/financeiro/comissoes/comissoes-abertas-prof')->layout('layouts/bootstrap');
    }
    else
    {
      return view('livewire/financeiro/comissoes/comissoes-abertas')->layout('layouts/bootstrap');
    }
  }
}
