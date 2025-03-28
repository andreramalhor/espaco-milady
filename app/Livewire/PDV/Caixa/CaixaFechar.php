<?php

namespace App\Livewire\PDV\Caixa;

use Livewire\Component;

use App\Models\PDV\Caixa as DBCaixa;
use App\Models\Financeiro\LancamentoGeral as DBLancamentoGeral;

class CaixaFechar extends Component
{
  public $id;
  public $caixa;
  public $fechar = false;
  
  public $nota200 = 0;
  public $nota100 = 0;
  public $nota050 = 0;
  public $nota020 = 0;
  public $nota010 = 0;
  public $nota005 = 0;
  public $nota002 = 0;
  public $moeda100 = 0;
  public $moeda050 = 0;
  public $moeda025 = 0;
  public $moeda010 = 0;
  public $moeda005 = 0;
  public $moeda001 = 0;
  
  public $cartoes_totais = [];
  public $cartoes_marcados = [];

  public $saldo_notas = 0;
  public $saldo_moedas = 0;
  public $saldo_dinheiro = 0;
  public $diferenca = 0;

  protected $listeners = ['caixaUpdated' => 'refreshList'];
  
  public function mount()
  {
    $this->caixa = DBCaixa::findOrFail($this->id);
    
    $this->nota200  = $this->caixa->nota200;
    $this->nota100  = $this->caixa->nota100;
    $this->nota050  = $this->caixa->nota050;
    $this->nota020  = $this->caixa->nota20;
    $this->nota010  = $this->caixa->nota10;
    $this->nota005  = $this->caixa->nota005;
    $this->nota002  = $this->caixa->nota2;
    $this->moeda100 = $this->caixa->moeda100;
    $this->moeda050 = $this->caixa->moeda50;
    $this->moeda025 = $this->caixa->moeda25;
    $this->moeda010 = $this->caixa->moeda10;
    $this->moeda005 = $this->caixa->moeda5;
    $this->moeda001 = $this->caixa->moeda1;

    $this->cartoes_totais = $this->caixa->ssqlnxsbyywplan()->where('id_forma_pagamento', '!=', 1)->get()->where('id_forma_pagamento', '!=', 1)->pluck('id')->toArray();

    $this->atualizar_saldos();
  }

  public function mais($moeda)
  {
    $this->$moeda = $this->$moeda + 1;
    $this->atualizar_saldos();
  }
  
  public function menos($moeda)
  {
    if($this->$moeda > 0)
    {
      $this->$moeda = $this->$moeda - 1;
    }
    $this->atualizar_saldos();
  }
  
  public function atualizar_saldos()
  {
    $this->saldo_notas  = round(( $this->nota200 * 200 ) + ( $this->nota100 * 100 )   + ( $this->nota050 * 50 )    + ( $this->nota020 * 20 )    + ( $this->nota010 * 10 )    + ( $this->nota005 * 5 ) + ( $this->nota002 * 2 ), 2);
    $this->saldo_moedas = round(( $this->moeda100 * 1 )  + ( $this->moeda050 * 0.50 ) + ( $this->moeda025 * 0.25 ) + ( $this->moeda010 * 0.10 ) + ( $this->moeda005 * 0.05 ) + ( $this->moeda001 * 0.01 ), 2);

    $this->saldo_dinheiro = $this->saldo_notas + $this->saldo_moedas;
    
    $this->diferenca = $this->caixa->saldo_atual - $this->saldo_dinheiro;

    $this->cartoes_totais = [];
    $this->cartoes_marcados = [];
    
    if(round($this->caixa->saldo_atual, 2) == round($this->saldo_dinheiro, 2) && empty(array_diff($this->cartoes_totais, $this->cartoes_marcados)))
    {
      $this->fechar = true;
    }
    else
    {
      $this->fechar = false;
    }
  }

  public function lancar_financeiro()
  {
    $servprod_detalhes = [];
    foreach ($this->caixa->oiefhueyedosaia as $key => $detalhe)
    {
      $servprod_detalhes[$key] = $detalhe->toArray();
      $servprod_detalhes[$key]['tipo'] = optional($detalhe->kcvkongmlqeklsl)->tipo;
      $servprod_detalhes[$key]['id_profexec'] = optional($detalhe->hgihnjekboyabez)->id_pessoa;
      $servprod_detalhes[$key]['vlr_comissao'] = optional($detalhe->hgihnjekboyabez)->valor;
      $servprod_detalhes[$key]['nome_profexec'] = optional($detalhe->flielwjewjdasld)->apelido;
    }
    
    $lancamentos_detalhes = [];
    foreach(collect($servprod_detalhes)->groupBy('tipo') as $tipo => $teste)
    {
      foreach($teste->groupBy('id_profexec') as $comsisao_profissional)
      {
        if($comsisao_profissional->first()['id_profexec'] != null)
        {
          DBLancamentoGeral::create([
            'id_empresa'             => 1,
            'tipo'                   => 'D',
            'id_banco'               => $this->caixa->id_banco,
            'id_conta'               => $tipo == 'Serviço' ? 6 : 7,
            'num_documento'          => null,
            'id_cliente'             => $comsisao_profissional->first()['id_profexec'],
            'informacao'             => 'Comissão por venda/execução de '. $tipo .' do caixa '. $this->caixa->id,
            'vlr_bruto'              => $comsisao_profissional->sum('vlr_comissao'),
            'vlr_dsc_acr'            => 0,
            'vlr_final'              => $comsisao_profissional->sum('vlr_comissao'),
            'parcela'                => '01/01',
            'id_forma_pagamento'     => 1,
            'descricao'              => 'Dinheiro',
            'dt_vencimento'          => \Carbon\Carbon::parse($comsisao_profissional->last()['created_at'])->format('Y-m-d'),
            'dt_recebimento'         => null,
            'dt_confirmacao'         => null,
            'dt_pagamento'           => null,
            'dt_competencia'         => \Carbon\Carbon::parse($comsisao_profissional->last()['created_at'])->format('Y-m-d'),
            'id_usuario_lancamento'  => $this->caixa->id_usuario_abertura,
            'id_usuario_confirmacao' => null,
            'id_caixa'               => $this->caixa->id,
            'id_lancamento_origem'   => null,
            'origem'                 => null,
            'status'                 => 'Agaurdando',
            'centro_custo'           => null,
          ]);
        }
      }
    }
  }
  
  public function fechar_caixa()
  {
    $this->lancar_financeiro();

    $this->caixa->update([
      'vlr_fechamento'       => $this->saldo_dinheiro,
      'status'               => 'Fechado',
      'dt_fechamento'        => \Carbon\Carbon::now(),
      'nota200'              => $this->nota200 ?? 0,
      'nota100'              => $this->nota100 ?? 0,
      'nota50'               => $this->nota050 ?? 0,
      'nota20'               => $this->nota020 ?? 0,
      'nota10'               => $this->nota010 ?? 0,
      'nota5'                => $this->nota005 ?? 0,
      'nota2'                => $this->nota002 ?? 0,
      'moeda100'             => $this->moeda100 ?? 0,
      'moeda50'              => $this->moeda050 ?? 0,
      'moeda25'              => $this->moeda025 ?? 0,
      'moeda10'              => $this->moeda010 ?? 0,
      'moeda5'               => $this->moeda005 ?? 0,
      'moeda1'               => $this->moeda001 ?? 0,
    ]);

    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Caixa fechado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('pdv.caixas.index')); 
  }
  
  public function reabrir()
  {
    dd(11114121111111);
    dd(1111111111);
    dd(1111111111);
    dd(1111111111);
  }
  
  public function validar()
  {
    dd(1111111111);
    // Atualizar dados da caixa no componente pai utilizando os IDs recebidos
    $this->caixa;
  }
  
  public function render()
  {
    return view('livewire/pdv/caixa/caixa-fechar')->layout('layouts/bootstrap');
  }
}
