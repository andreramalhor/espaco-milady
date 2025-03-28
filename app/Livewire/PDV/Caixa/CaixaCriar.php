<?php

namespace App\Livewire\PDV\Caixa;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\PDV\Caixa as DBCaixa;
use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\Financeiro\RecebimentoCartao as DBRecebimentoCartao;

class CaixaCriar extends Component
{
  public $user_possui_caixa_aberto;
  public $ultimo_caixa_id_banco;
  public $saldo_caixa_escolhido;
  public $lancamentos_pendentes;
  public $cartoes_pendentes;
  public $abertura_atual;

  public $id_banco;
// id_usuario_abertura
// vlr_abertura
// vlr_fechamento
// status
// dt_abertura
// dt_fechamento
// dt_validacao
// id_usuario_validacao
// nota200
// nota100
// nota50
// nota20
// nota10
// nota5
// nota2
// moeda100
// moeda50
// moeda25
// moeda10
// moeda5
// moeda1
// created_at
// updated_at
// deleted_at

  public $abrir = false;

  protected $listeners = ['caixaUpdated' => 'refreshList'];
    
  public function mount()
  {
    $this->user_possui_caixa_aberto = auth()->user()->abcdefghijklmno;
  } 
  
  public function caixa_escolhido( $id )
  {
    if($id != "")
    {
      $this->ultimo_caixa_id_banco = DBCaixa::orderBy('id', 'desc')->where('id_banco', '=', $id)->first();
  
      if(!is_null($this->ultimo_caixa_id_banco))
      {
        $this->lancamentos_pendentes = DBLancamento::
                                                    where('id_banco', '=', $id)->
                                                    where('status', '=', 'Pendente')->
                                                    whereNull('id_caixa')->
                                                    get();




        $this->cartoes_pendentes = DBRecebimentoCartao::
                                                    where('id_banco', '=', $id)->
                                                    where('status', '=', 'Aguardando validação')->
                                                    whereDate('dt_prevista', '<=', \Carbon\Carbon::today()->endOfDay())->
                                                    orderBy('dt_prevista', 'desc')->
                                                    get();
    
        $this->saldo_caixa_escolhido = 
                                        ( $this->ultimo_caixa_id_banco->nota200 * 200 ) + 
                                        ( $this->ultimo_caixa_id_banco->nota100 * 100 ) + 
                                        ( $this->ultimo_caixa_id_banco->nota50 * 50 ) + 
                                        ( $this->ultimo_caixa_id_banco->nota20 * 20 ) + 
                                        ( $this->ultimo_caixa_id_banco->nota10 * 10 ) + 
                                        ( $this->ultimo_caixa_id_banco->nota5 * 5 ) + 
                                        ( $this->ultimo_caixa_id_banco->nota2 * 2 ) + 
                                        ( $this->ultimo_caixa_id_banco->moeda100 * 1 ) + 
                                        ( $this->ultimo_caixa_id_banco->moeda50 * 0.50 ) + 
                                        ( $this->ultimo_caixa_id_banco->moeda25 * 0.25 ) + 
                                        ( $this->ultimo_caixa_id_banco->moeda10 * 0.10 ) + 
                                        ( $this->ultimo_caixa_id_banco->moeda5 * 0.05 ) + 
                                        ( $this->ultimo_caixa_id_banco->moeda1 * 0.01 );

        $this->abertura_atual = floatval($this->lancamentos_pendentes->sum('vlr_final')) + floatval($this->cartoes_pendentes->sum('vlr_final')) + floatval($this->saldo_caixa_escolhido);
      }
      else
      {
        $this->saldo_caixa_escolhido = 0;
      }
      
      $this->abrir = true;
    }
    else
    {
      $this->abrir = false;
    }
  }

  public function store()
  {
    $caixa = DBCaixa::create([
      'id_banco'             => $this->id_banco,
      'id_usuario_abertura'  => auth()->user()->id,
      'vlr_abertura'         => $this->ultimo_caixa_id_banco->vlr_fechamento ?? 0,
      'vlr_fechamento'       => null,
      'status'               => 'Aberto',
      'dt_abertura'          => \Carbon\Carbon::now(),
      'dt_fechamento'        => null,
      'dt_validacao'         => null,
      'id_usuario_validacao' => null,
      'nota200'              => $this->ultimo_caixa_id_banco->nota200 ?? 0,
      'nota100'              => $this->ultimo_caixa_id_banco->nota100 ?? 0,
      'nota50'               => $this->ultimo_caixa_id_banco->nota50 ?? 0,
      'nota20'               => $this->ultimo_caixa_id_banco->nota20 ?? 0,
      'nota10'               => $this->ultimo_caixa_id_banco->nota10 ?? 0,
      'nota5'                => $this->ultimo_caixa_id_banco->nota5 ?? 0,
      'nota2'                => $this->ultimo_caixa_id_banco->nota2 ?? 0,
      'moeda100'             => $this->ultimo_caixa_id_banco->moeda100 ?? 0,
      'moeda50'              => $this->ultimo_caixa_id_banco->moeda50 ?? 0,
      'moeda25'              => $this->ultimo_caixa_id_banco->moeda25 ?? 0,
      'moeda10'              => $this->ultimo_caixa_id_banco->moeda10 ?? 0,
      'moeda5'               => $this->ultimo_caixa_id_banco->moeda5 ?? 0,
      'moeda1'               => $this->ultimo_caixa_id_banco->moeda1 ?? 0,
    ]);

    foreach ($this->lancamentos_pendentes as $lancamento)
    {
      $lancamento->update([
        'id_caixa' => $caixa->id,
        'status' => 'Confirmado',
      ]);
    }

    foreach ($this->cartoes_pendentes as $cartao)
    {
      $cartao->update([
        'id_caixa' => $caixa->id,
        'status' => 'Confirmado',
      ]);
    }

    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Caixa aberto com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('pdv.caixas.index')); 
  }
  
  public function render()
  {
    return view('livewire/pdv/caixa/caixa-criar')->layout('layouts/bootstrap');
  }
}
