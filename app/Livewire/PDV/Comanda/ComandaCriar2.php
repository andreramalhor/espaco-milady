<?php

namespace App\Livewire\PDV\Comanda;

use Livewire\Component;
use App\Models\PDV\Comanda as DBComanda;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\Configuracao\FormaPagamento as DBFormaPagamento;

class ComandaCriar2 extends Component
{
  public $caixa;
  
  public $AA_id_cliente = '';
  public $AA_tem_agendamentos;
  public $AA_etapa_1_concluida = false;
  public $AA_collapso = 'fase-1';
  public $focus_input = 'ipt_id_cliente';
  
  public $tipo_adicao = 'tradicional';
  
  public $AA_vendas_detalhes   = [];
  public $AA_vendas_pagamentos = [];
  
  public $venda = [
    'id'             => null, 
    'id_caixa'       => null, 
    'id_usuario'     => null,
    'id_cliente'     => null, 
    'qtd_produtos'   => null, 
    'vlr_prod_serv'  => null, 
    'vlr_negociados' => null, 
    'vlr_dsc_acr'    => null, 
    'vlr_final'      => null, 
    'status'         => null,
  ];
  
  public $venda_detalhes = [
    'id_venda'      => null,
    'id_servprod'   => null,
    'quantidade'    => null,
    'vlr_venda'     => null,
    'vlr_negociado' => null,
    'vlr_dsc_acr'   => null,
    'vlr_final'     => null,
    'obs'           => null,
    'status'        => null,
  ];
  
  public $conta_internas = [
    'id_origem'    => null, 
    'fonte_origem' => null, 
    'id_pessoa'    => null, 
    'tipo'         => null, 
    'percentual'   => null, 
    'valor'        => null, 
    'dt_prevista'  => null, 
    'dt_quitacao'  => null, 
    'id_destino'   => null, 
    'fonte_destino'=> null, 
    'status'       => null, 
  ];
  
  public $venda_pagamentos;
  public $finan_lancamentos;
  
  public $servico_produto = [
    // Sobre o produto
    'id'                            => null,
    'tipo'                          => null,
    'nome'                          => null,
    'descricao'                     => null,
    'ativo'                         => null,
    'id_categoria'                  => null,
    'id_fornecedor'                 => null,
    'marca'                         => null,
    'unidade'                       => null,
    'duracao'                       => null,
    'tipo_preco'                    => null,
    'status'                        => null,
    'cod_nota'                      => null,
    'cod_barras'                    => null,
    // Sobre o estoque
    'estoque_min'                   => null,
    'estoque_max'                   => null,
    'estoque_atual'                 => null,
    // Sobre a comissão
    'tipo_comissao'                 => null,
    'prc_comissao'                  => null,
    'vlr_comissao'                  => null,
    // Sobre os valores
    'vlr_venda'                     => null,
    'vlr_mercado'                   => null,                      // remover, desnecessário!
    'vlr_nota'                      => null,
    'vlr_frete'                     => null,
    'vlr_impostos'                  => null,
    'vlr_marg_contribuicao'         => null,
    'vlr_cst_adicional'             => null,
    'vlr_custo'                     => null,
    'vlr_custo_estoque'             => null,
    'vlr_custo_comissao'            => null,
    // Sobre os impostos
    'ncm_prod_serv'                 => null,
    'ipi_prod_serv'                 => null,
    'icms_prod_serv'                => null,
    'simples_prod_serv'             => null,
    // Sobre os índices
    'tempo_retorno'                 => null,
    'marg_contribuicao'             => null,
    'margem_custo'                  => null,
    'consumo_medio'                 => null,
    'cmv_prod_serv'                 => null,
    'curva_abc'                     => null,
    // Sobre pontos de fidelidade
    'fidelidade_pontos_ganhos'      => null,
    'fidelidade_pontos_necessarios' => null,
  ];
  
  public $id_chave;
  public $id_servprod;
  public $quantidade = 1;
  public $tipo_preco;
  public $vlr_venda     = '0,00';
  public $vlr_negociado = '0,00';
  public $vlr_dsc_acr   = '0,00';
  public $vlr_final     = '0,00';
  public $id_agendamento;
  
  public $profissionals = [];
  public $id_pessoa;
  public $percentual   = 0;
  public $valor        = 0;
  
  
  
  
  
  public $ultimo_comanda_id_banco;
  
  
  
  public $id_banco;
  public $cliente;
  public $feedback_cliente;
  
  public $item_comanda;
  public $item_quantidade = 1;
  public $item_vlr_negociado;
  public $item_vlr_dsc_acr = 0;
  public $feedback_item_comanda;
  public $feedback_item_comanda_status;
  public $feedback_item_comanda_negociado;
  
  public $profissionais;
  public $profissional;
  public $prof_exec;
  public $feedback_profexec;
  public $tipo_comissao = 'Comissão Sob Valor Final';
  public $manual_comissao;
  
  // INFORMAÇÕES DO PAGAMENTO ==========================================================================================================================================
  public $opcoes_formas;
  public $opcoes_bandeiras;
  public $opcoes_parcelas;
  public $forma_pagamento;
  public $pgto_forma;
  public $pgto_bandeira;
  public $pgto_parcela;
  public $pgto_tipo;
  public $pgto_taxa;
  public $pgto_prazo;
  public $pgto_pri_vcto;
  public $destino;
  public $pgto_valor;
  public $pgto_proximo = false;
  public $cmd_valor_total = '0,00';
  public $cmd_valor_pago = '0,00';
  public $cmd_valor_restante = '0,00';
  public $cmd_valor_pagando = '0,00';
  public $comanda_finalizada = false;
  
  protected $listeners = [
    'agendamentos_adicionar'   => 'adicionar_servprod',
    'saldo_negativo_adicionar' => 'saldo_negativo',
    'saldo_positivo_adicionar' => 'saldo_positivo',
    'comandaUpdated'           => 'refreshList'
  ];
  
  public function mount()
  {
    $this->caixa = auth()->user()->abcdefghijklmno;
    
    $this->venda['id_caixa']   = $this->caixa->id;
    $this->venda['id_usuario'] = auth()->user()->id;
    $this->venda['id_cliente'] = $this->cliente->id ?? null;
    
    $this->calcular_valores();
  }
  
  public function mudar_fase( $fase )
  {
    $this->AA_collapso = $fase;
  }
  
  public function cliente_selecionado( $id_cliente )
  {
    $this->AA_id_cliente = $id_cliente;
    
    if($this->AA_id_cliente != '')
    {
      $this->AA_tem_agendamentos = DBAgendamento::
                                                whereBetween('start', [
                                                  \Carbon\Carbon::today()->startOfDay(),
                                                  \Carbon\Carbon::today()->endOfDay()
                                                ])->
                                                where('id_cliente', '=', $id_cliente)->
                                                // where('status', '=', 'Agendado')->
                                                get();

      $this->modal_saldo();
      
      $this->modal_agendamentos();
      
      $this->mudar_fase( 'fase-2' );
      
      $this->focus_input = 'ipt_id_servprod';
    }
    else
    {
      $this->mudar_fase( 'fase-1' );
    }
    
    // <livewire:PDV.Comanda.ComandaAgendamentos :AA_id_cliente="$AA_id_cliente" />
  }
  
  public function modal_saldo()
  {
    $saldo = optional(DBPessoa::find($this->AA_id_cliente))->saldo_conta;

    if($saldo != null || $saldo != 0)
    {
      $this->dispatch('saldos_ver', $this->AA_id_cliente);
    }
  }
  
  public function modal_agendamentos()
  {
    $this->dispatch('agendamentos_ver', $this->AA_id_cliente);
  }
  
  public function servico_selecionado( $id_servico , $adicionando=false )
  {
    $this->focus_input = 'ipt_quantidade';
        
    $this->id_servprod = $id_servico;
    
    if( $id_servico != '' )
    {
      $this->reset(['id_chave', 'quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'percentual', 'valor']);
      
      $servico = DBServicoProduto::find($id_servico);
      $this->vlr_venda     = $this->num_convert_brasil($servico->vlr_venda);
      $this->vlr_negociado = $this->num_convert_brasil($servico->vlr_venda);
      $this->tipo_preco    = $servico->tipo_preco;
      
      $this->atualizar_valor_final();
      
      $this->profissionals = $servico->smenhgskqwmdjwe;
    }
    else
    {
      $this->reset(['id_chave', 'id_servprod', 'quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'percentual', 'valor']);
    }
  }
  
  public function adicionar_servprod( $dados=null )
  {
    if($dados['origem_adicao'] == 'agendamentos')
    {
      foreach ($dados['agendamentos'] as $key => $item_agendamento)
      {
        $venda_detalhe = [
          'id_chave'       => $key,
          'id_servprod'    => $item_agendamento['id_servprod'],
          'quantidade'     => 1,
          'vlr_venda'      => $item_agendamento['valor'],
          'vlr_negociado'  => $item_agendamento['valor'],
          'vlr_dsc_acr'    => 0,
          'vlr_final'      => $item_agendamento['valor'],
          'obs'            => null,
          'id_agendamento' => $item_agendamento['id'],
          'conta_interna'  => [
            'id_origem'    => null, 
            'fonte_origem' => 'pdv_vendas_detalhes', 
            'id_pessoa'    => $item_agendamento['id_profexec'], 
            'tipo'         => 'Comissão Sob Valor Final', 
            'percentual'   => $item_agendamento['prc_comissao'], 
            'valor'        => $item_agendamento['vlr_comissao'], 
            'dt_prevista'  => \Carbon\Carbon::now(), 
            'dt_quitacao'  => null, 
            'id_destino'   => null, 
            'fonte_destino'=> null, 
            'status'       => 'Em aberto', 
          ],
        ];
        
        if(!collect($this->AA_vendas_detalhes)->contains('id_agendamento', $item_agendamento['id']))
        {
          array_push($this->AA_vendas_detalhes, $venda_detalhe);
        }
      }
      
      $this->mudar_fase($dados['fase']);
      
    }
    elseif($this->tipo_adicao == 'tradicional')
    {
      $venda_detalhe = [
        'id_chave'       => array_key_last($this->AA_vendas_detalhes) + 1,
        'id_servprod'    => $this->id_servprod,
        'quantidade'     => $this->quantidade,
        'vlr_venda'      => $this->num_convert_decimal($this->vlr_venda),
        'vlr_negociado'  => $this->num_convert_decimal($this->vlr_negociado),
        'vlr_dsc_acr'    => $this->num_convert_decimal($this->vlr_dsc_acr),
        'vlr_final'      => $this->num_convert_decimal($this->vlr_final),
        'obs'            => $this->obs ?? null,                                             // incluir campo observação
        'id_agendamento' => null,
        'conta_interna'  => [
          'id_origem'    => null, 
          'fonte_origem' => 'pdv_vendas_detalhes', 
          'id_pessoa'    => $this->id_pessoa,
          'tipo'         => 'Comissão Sob Valor Final',
          'percentual'   => $this->num_convert_decimal($this->percentual ?? 0),
          'valor'        => $this->num_convert_decimal($this->percentual ?? 0) * $this->num_convert_decimal($this->vlr_final) / 100, 
          'dt_quitacao'  => null, 
          'id_destino'   => null, 
          'fonte_destino'=> null, 
          'status'       => 'Em aberto',          
        ],
      ];
      
      array_push($this->AA_vendas_detalhes, $venda_detalhe);
    }
    elseif($this->tipo_adicao == 'editar')
    {
      $this->AA_vendas_detalhes[$this->id_chave]['id_chave']       = $this->id_chave;
      $this->AA_vendas_detalhes[$this->id_chave]['id_servprod']    = $this->id_servprod;
      $this->AA_vendas_detalhes[$this->id_chave]['quantidade']     = $this->quantidade;
      $this->AA_vendas_detalhes[$this->id_chave]['vlr_venda']      = $this->num_convert_decimal($this->vlr_venda);
      $this->AA_vendas_detalhes[$this->id_chave]['vlr_negociado']  = $this->num_convert_decimal($this->vlr_negociado);
      $this->AA_vendas_detalhes[$this->id_chave]['vlr_dsc_acr']    = $this->num_convert_decimal($this->vlr_dsc_acr);
      $this->AA_vendas_detalhes[$this->id_chave]['vlr_final']      = $this->num_convert_decimal($this->vlr_final);
      $this->AA_vendas_detalhes[$this->id_chave]['obs']            = $this->obs ?? null;
      $this->AA_vendas_detalhes[$this->id_chave]['id_agendamento'] = $this->id_agendamento;
      
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['id_origem']     = $this->id_origem;
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['fonte_origem']  = $this->fonte_origem;
      $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['id_pessoa']     = $this->id_pessoa;
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['tipo']          = $this->tipo;
      $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['percentual']    = $this->num_convert_decimal($this->percentual);
      $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['valor']         = $this->num_convert_decimal($this->valor);
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['dt_prevista']   = $this->dt_prevista;
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['dt_quitacao']   = $this->dt_quitacao;
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['id_destino']    = $this->id_destino;
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['fonte_destino'] = $this->fonte_destino;
      // $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['status']        = $this->status;
    }
    elseif($dados['origem_adicao'] == 'saldos')
    {
      dd(11);
    }
    
    $this->reset(['id_chave', 'id_servprod', 'quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'percentual', 'valor']);
    // $this->pgto_valor = $this->comanda->dfyejmfcrkolqjh->sum('vlr_final');
    
    $this->calcular_valores();
    
    $this->tipo_adicao = 'tradicional';
    
    $this->dispatch('swal:alert', [
      'title'     => 'Adicionado!',
      'text'      => 'Item adiconado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }
  
  public function editar_detalhe( $key )
  {
    $servico = DBServicoProduto::find($this->AA_vendas_detalhes[$key]['id_servprod']);
    // $this->reset(['id_chave', 'id_servprod', 'quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'percentual', 'valor']);
    $this->tipo_adicao    = 'editar';
    $this->id_chave       = $this->AA_vendas_detalhes[$key]['id_chave'];
    $this->id_servprod    = $this->AA_vendas_detalhes[$key]['id_servprod'];
    $this->quantidade     = $this->AA_vendas_detalhes[$key]['quantidade'];
    $this->tipo_preco     = $servico->tipo_preco;
    $this->vlr_venda      = $this->num_convert_brasil($this->AA_vendas_detalhes[$key]['vlr_venda'] ?? $servico->vlr_venda);
    $this->vlr_negociado  = $this->num_convert_brasil($this->AA_vendas_detalhes[$key]['vlr_negociado'] ?? $servico->vlr_venda);
    
    $this->vlr_dsc_acr    = $this->num_convert_brasil($this->AA_vendas_detalhes[$key]['vlr_dsc_acr'] ?? $servico->vlr_dsc_acr);
    $this->vlr_final      = $this->num_convert_brasil($this->AA_vendas_detalhes[$key]['vlr_final'] ?? $servico->vlr_final);
    
    $this->profissionals  = DBServicoProduto::find($this->AA_vendas_detalhes[$key]['id_servprod'])->smenhgskqwmdjwe;
    $this->id_pessoa      = $this->AA_vendas_detalhes[$key]['conta_interna']['id_pessoa'];
    
    $this->id_agendamento = $this->AA_vendas_detalhes[$key]['id_agendamento'];
    
    $this->profissional_selecionado();
    $this->atualizar_valor_final();
  }
  
  public function remover_detalhe( $key )
  {
    unset($this->AA_vendas_detalhes[$key]);
    
    $this->calcular_valores();
  }
  
  public function saldo_negativo( $dados )
  {
    $dados = [
      'origem_adicao' => 'saldos',
      'id_servico'    => 131,
      'saldos'        => $dados['saldos'],
      'fase'          => 'fase-2'
    ];

    
    dd($this->AA_vendas_pagamentos, $this->AA_vendas_detalhes,'saldo_negativo', $dados);
  }
  
  public function saldo_positivo( $dados )
  {
    // $this->pgto_forma = 'Crédito Interno';
    // $this->pgto_valor = $dados['saldos'] + -1;

    // $this->selecionar_bandeiras();
    // $this->pagamento_selecionar();

    // $this->mudar_fase($dados['fase']);
  }
  
  public function atualizar_valor_final()
  {    
    $this->vlr_final     = ( $this->num_convert_brasil( ($this->num_convert_decimal($this->vlr_negociado) + $this->num_convert_decimal($this->vlr_dsc_acr) ) * $this->quantidade) );
    $this->valor         = $this->num_convert_brasil($this->num_convert_decimal($this->percentual ?? 0) / 100 * $this->num_convert_decimal($this->vlr_final ?? 0));
    
    $this->vlr_venda     = $this->num_convert_brasil($this->num_convert_decimal($this->vlr_venda));
    $this->vlr_dsc_acr   = $this->num_convert_brasil($this->num_convert_decimal($this->vlr_dsc_acr));
    $this->vlr_negociado = $this->num_convert_brasil($this->num_convert_decimal($this->vlr_negociado));
  }
  
  public function profissional_selecionado()
  {
    if($this->id_pessoa != "NULL")
    {
      $profissional     = DBPessoa::find($this->id_pessoa);
      $this->id_pessoa  = $profissional->id;
      
      $colabserv        = $profissional->aeahvtsijjoprlc->where('id_servprod', $this->id_servprod)->first();
      $this->percentual = $this->num_convert_brasil($colabserv->prc_comissao * 100, 1);
      $this->valor      = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
    }
    else
    {
      $this->id_pessoa  = null;
      $this->percentual = null;
      $this->valor      = null;
    }
  }
  
  public function atualizar_comissao( $indice )
  {
    if($indice == 'valor')
    {
      $this->percentual    = $this->num_convert_brasil($this->num_convert_decimal($this->valor) / $this->num_convert_decimal($this->vlr_final) * 100, 1);
      $this->valor         = $this->num_convert_brasil($this->num_convert_decimal($this->valor));
      $this->tipo_comissao = 'Comissão Manual'; 
    }
    elseif($indice == 'percentual')
    {
      $this->valor         = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
      $this->percentual    = $this->num_convert_brasil($this->num_convert_decimal($this->percentual), 1);
      $this->tipo_comissao = 'Comissão Manual'; 
    }
    
    if($this->num_convert_decimal($this->percentual) == 0 || $this->num_convert_decimal($this->valor) == 0)
    {
      $this->tipo_comissao = 'Comissão Zerada'; 
    }    
  }
  
  // ========================================================================================================================================================================      PAGAMENTO
  
  public function selecionar_bandeiras()
  {
    $this->reset(['pgto_bandeira', 'pgto_parcela', 'pgto_pri_vcto', 'pgto_tipo', 'pgto_prazo']);
    
    $this->opcoes_formas    = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->orderBy('forma', 'asc')->distinct()->get(['forma']);
    $this->opcoes_bandeiras = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->where('forma', '=', $this->pgto_forma)->orderBy('bandeira', 'asc')->distinct()->get(['bandeira']);
    
    if($this->opcoes_bandeiras->count() == 1)
    {
      $this->pgto_proximo = 'confirmar';
      $this->selecionar_forma();
    }
    else
    {
      $this->pgto_proximo = 'bandeira';
    }
  }
  
  public function selecionar_parcelas()
  {
    $this->reset(['pgto_parcela', 'pgto_pri_vcto', 'pgto_tipo', 'pgto_prazo']);
    
    $this->opcoes_formas    = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->orderBy('forma', 'asc')->distinct()->get(['forma']);
    $this->opcoes_bandeiras = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->where('forma', '=', $this->pgto_forma)->orderBy('bandeira', 'asc')->distinct()->get(['bandeira']);
    $this->opcoes_parcelas  = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->where('forma', '=', $this->pgto_forma)->where('bandeira', '=', $this->pgto_bandeira)->orderBy('parcela', 'asc')->distinct()->get(['parcela']);
    
    if($this->opcoes_parcelas->count() == 1)
    {
      $this->pgto_proximo = 'confirmar';
      $this->selecionar_forma();
    }
    else
    {
      $this->pgto_proximo = 'parcela';
    }
  }
  
  public function selecionar_forma()
  {  
    $this->opcoes_formas    = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->orderBy('forma', 'asc')->distinct()->get(['forma']);
    $this->opcoes_bandeiras = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->where('forma', '=', $this->pgto_forma)->orderBy('bandeira', 'asc')->distinct()->get(['bandeira']);
    $this->opcoes_parcelas  = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->where('forma', '=', $this->pgto_forma)->where('bandeira', '=', $this->pgto_bandeira)->orderBy('parcela', 'asc')->distinct()->get(['parcela']);
    
    $selecionados = [
      'forma'    => $this->pgto_forma,
      'bandeira' => $this->pgto_bandeira,
      'parcela'  => $this->pgto_parcela,
    ];
    
    $forma_pagamento = DBFormaPagamento::
                                      where('local', '=', 'venda')->
                                      orWhere('local', '=', 'ambos')->
                                      where( function ($query) use ($selecionados)
                                      {
                                        if ( isset( $selecionados['forma'] ) )
                                        {
                                          $query->where('forma', '=', $selecionados['forma'] );
                                        }
                                        if ( isset( $selecionados['bandeira'] ) )
                                        {
                                          $query->where('bandeira', '=', $selecionados['bandeira'] );
                                        } 
                                        if ( isset( $selecionados['parcela'] ) )
                                        {
                                          $query->where('parcela', '=', $selecionados['parcela'] );
                                        } 
                                      })->
                                      get();
  
    if($forma_pagamento->count() == 1)
    {
      $this->forma_pagamento = $forma_pagamento->first();
      $this->pgto_tipo       = $this->forma_pagamento->tipo;
      $this->pgto_taxa       = $this->forma_pagamento->taxa;
      $this->pgto_prazo      = $this->forma_pagamento->prazo;
      $this->destino         = $this->forma_pagamento->destino;
      $this->pgto_pri_vcto   = \Carbon\Carbon::today()->addDays($this->forma_pagamento->pri_vcto)->format('Y-m-d');
    }
  }
  
  public function pagamento_selecionar()
  {
    $id_grupo = collect($this->AA_vendas_pagamentos)->count() + 1;
    $pgto_parcela = $this->pgto_parcela ?? 1;
    
    for ($i=0; $i < $pgto_parcela; $i++)
    {
      $venda_pagamento = [
        'id_chave'           => count($this->AA_vendas_pagamentos) + 1,
        'id_grupo'           => $id_grupo,
        'id_forma_pagamento' => $this->forma_pagamento->id,
        'descricao'          => $this->pgto_forma.' - '.$this->pgto_bandeira,
        'parcela'            => str_pad((string) $i+1, 2, '0', STR_PAD_LEFT).'/'.str_pad((string) $pgto_parcela, 2, '0', STR_PAD_LEFT), 
        'valor'              => $this->num_convert_decimal($this->cmd_valor_pagando) / $pgto_parcela,
        'status'             => 'Em aberto',
        'dt_prevista'        => \Carbon\Carbon::parse($this->pgto_pri_vcto)->addDays($this->pgto_prazo / $pgto_parcela * $i)->format('Y-m-d'),
        'forma'              => $this->pgto_forma,
        'bandeira'           => $this->pgto_bandeira,
        'taxa'               => $this->forma_pagamento->taxa ?? 1,  
        'destino'            => $this->destino,
      ]; //$this->comanda->xzxfrjmgwpgsnta()->create()
      
      switch($this->forma_pagamento->destino)
      {
        case 'fin_recebimentos_cartoes':
          $venda_pagamento['recebimento_cartoes'] = [
            'id_forma_pagamento' => $this->forma_pagamento->id,
            'vlr_real'           => $venda_pagamento['valor'],
            'prc_descontado'     => $this->forma_pagamento->taxa,
            'vlr_final'          => $venda_pagamento['valor'] - ($this->forma_pagamento->taxa * $venda_pagamento['valor'] / 100 ),
            'dt_prevista'        => $venda_pagamento['dt_prevista'],
            'status'             => 'Aguardando validação',
          ]; //->fjwlfkjalpdwepf()->create();
          break;
          
        case 'fin_contas_internas':
          $venda_pagamento['conta_interna'] = [
            'fonte_origem'  => 'pdv_vendas_pagamentos', 
            'id_pessoa'     => $this->AA_id_cliente, 
            'tipo'          => $this->pgto_forma, 
            'percentual'    => 1, 
            'valor'         => $venda_pagamento['valor'] * -1, 
            'dt_prevista'   => $venda_pagamento['dt_prevista'], 
            'status'        => 'Em aberto', 
          ]; //->pqwnldkwjfencsb()->create();
          break;
      }
      
      array_push($this->AA_vendas_pagamentos, $venda_pagamento);
    }
    
    $id_grupo = $id_grupo + 1;
    
    // $this->reset(['opcoes_bandeiras', 'opcoes_parcelas', 'forma_pagamento', 'pgto_forma', 'pgto_bandeira', 'pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto', 'pgto_valor', 'pgto_proximo', 'cmd_valor_total', 'cmd_valor_pago']); 
    $this->reset(['opcoes_bandeiras', 'opcoes_parcelas', 'forma_pagamento', 'pgto_forma', 'pgto_bandeira', 'pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto', 'pgto_valor', 'pgto_proximo']); 
    
    $this->calcular_valores();
    
    $this->dispatch('swal:alert', [
      'text'      => 'Pagamento incluído com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }
  
  public function deletar_pagamento($id_chave, $id_grupo)
  {
    $novasComandas = array_filter($this->AA_vendas_pagamentos, function ($pagamento) use ($id_grupo)
    {
      return $pagamento['id_grupo'] !== $id_grupo;
    });
    
    
    dd($this->AA_vendas_pagamentos, $novasComandas);
    unset($this->AA_vendas_pagamentos[$key]);
    
    // $this->calcular_valores();
    
    // foreach($this->comanda->xzxfrjmgwpgsnta->where('created_at', '=', $created_at) as $pagamento)
    // {
    //   if(isset($pagamento->fjwlfkjalpdwepf))
    //   {
    //     $pagamento->fjwlfkjalpdwepf->delete();
    //     $pagamento->delete();
    //   }
      
    //   if(isset($pagamento->pqwnldkwjfencsb))
    //   {
    //     $pagamento->pqwnldkwjfencsb->delete();
    //     $pagamento->delete();
    //   }    
    // }
    
    // $this->comanda->xzxfrjmgwpgsnta()->where('created_at', '=', $created_at)->delete();
    
    $this->reset(['opcoes_bandeiras', 'opcoes_parcelas', 'forma_pagamento', 'pgto_forma', 'pgto_bandeira', 'pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto', 'pgto_valor', 'pgto_proximo', 'cmd_valor_total', 'cmd_valor_pago']); 
    
    $this->calcular_valores();
    
    $this->dispatch('swal:alert', [
      'title'     => 'Deletado!',
      'text'      => 'Pagamento(s) deletado(s) com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }
  
  // ========================================================================================================================================================================      FIM PAGAMENTO
  
  public function calcular_valores()
  {
    $this->opcoes_formas      = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->orderBy('forma', 'asc')->distinct()->get(['forma']);
    
    $this->cmd_valor_total    = $this->num_convert_brasil(collect($this->AA_vendas_detalhes)->sum('vlr_final'));
    $this->cmd_valor_pago     = $this->num_convert_brasil(collect($this->AA_vendas_pagamentos)->sum('valor'));
    $this->cmd_valor_restante = $this->num_convert_brasil($this->num_convert_decimal($this->cmd_valor_total) - $this->num_convert_decimal($this->cmd_valor_pago));
    $this->cmd_valor_pagando  = $this->num_convert_brasil($this->num_convert_decimal($this->cmd_valor_total) - $this->num_convert_decimal($this->cmd_valor_pago));
    
    if( $this->num_convert_decimal($this->cmd_valor_restante) == 0 && $this->num_convert_decimal($this->cmd_valor_total) != 0)
    {
      $this->comanda_finalizada = true;
    }
    else
    {
      $this->comanda_finalizada = false;
    }
  }
  
  public function corrigir_valor_pagando( $valor )
  {
    $this->cmd_valor_pagando = $this->num_convert_brasil($this->num_convert_decimal($valor));
  }
  
  public function num_convert_brasil( $valor , $casas=2 )
  {
    return number_format($valor, $casas, ',', '.');
  }
  
  public function num_convert_decimal( $valor )
  {
    return str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $valor)));
  }
  
  public function finalizar_comanda($resp)
  {
    if($resp)
    {
      $venda = DBComanda::create([
        'id_caixa'       => $this->caixa->id,
        'id_usuario'     => auth()->user()->id,
        'id_cliente'     => $this->AA_id_cliente,
        'qtd_produtos'   => collect($this->AA_vendas_detalhes)->sum('quantidade'),
        'vlr_prod_serv'  => collect($this->AA_vendas_detalhes)->sum('vlr_venda'),
        'vlr_negociado'  => collect($this->AA_vendas_detalhes)->sum('vlr_negociado'),
        'vlr_dsc_acr'    => collect($this->AA_vendas_detalhes)->sum('vlr_dsc_acr'),
        'vlr_final'      => collect($this->AA_vendas_detalhes)->sum('vlr_final'),
        'status'         => 'Concluído',
      ]);
      
      foreach(collect($this->AA_vendas_detalhes) as $venda_detalhe)
      {
        $detalhe = $venda->dfyejmfcrkolqjh()->create([
          'id_servprod'    => $venda_detalhe['id_servprod'],
          'quantidade'     => $venda_detalhe['quantidade'],
          'vlr_venda'      => floatval($venda_detalhe['vlr_venda']) ?? null,
          'vlr_negociado'  => floatval($venda_detalhe['vlr_negociado']) ?? null,
          'vlr_dsc_acr'    => floatval($venda_detalhe['vlr_dsc_acr']) ?? null,
          'vlr_final'      => floatval($venda_detalhe['vlr_final']) ?? null,
          'obs'            => $venda_detalhe['obs'] ?? null,
          'id_agendamento' => $venda_detalhe['id_agendamento'] ?? null,
          'status'         => 'Concluído',
        ]);
        
        $conta_interna = $detalhe->hgihnjekboyabez()->create([
          'fonte_origem' => 'pdv_vendas_detalhes',
          'id_pessoa'    => $venda_detalhe['conta_interna']['id_pessoa'],
          'tipo'         => 'Comissão Sob Valor Final',
          'dt_prevista'  => \Carbon\Carbon::now(),
          'percentual'   => floatval($venda_detalhe['conta_interna']['percentual']),
          'valor'        => floatval($venda_detalhe['conta_interna']['valor']) / 100,
          'status'       => 'Em aberto',
        ]);
        
        if(!is_null($venda_detalhe['id_agendamento']))
        {
          $agendamento = DBAgendamento::find($venda_detalhe['id_agendamento']);
          $agendamento->update([
            'status'           => 'Finalizado',
            'id_venda_detalhe' => $detalhe->id,
          ]);
        }
      }
      
      foreach(collect($this->AA_vendas_pagamentos) as $venda_pagamento)
      {
        $pagamento = $venda->xzxfrjmgwpgsnta()->create([
          'id_forma_pagamento' => $venda_pagamento['id_forma_pagamento'],
          'descricao'          => $venda_pagamento['forma'].' - '.$venda_pagamento['bandeira'],
          'parcela'            => $venda_pagamento['parcela'], 
          'valor'              => $venda_pagamento['valor'],
          'status'             => 'Concluído',
          'dt_prevista'        => $venda_pagamento['dt_prevista'],
        ]);
        
        switch($venda_pagamento['destino'])
        {
          case 'fin_recebimentos_cartoes':
            $pagamento->fjwlfkjalpdwepf()->create([
              'id_forma_pagamento' => $venda_pagamento['recebimento_cartoes']['id_forma_pagamento'],
              'vlr_real'           => $venda_pagamento['recebimento_cartoes']['vlr_real'],
              'prc_descontado'     => $venda_pagamento['recebimento_cartoes']['prc_descontado'],
              'vlr_final'          => $venda_pagamento['recebimento_cartoes']['vlr_final'],
              'dt_prevista'        => $venda_pagamento['recebimento_cartoes']['dt_prevista'],
              'status'             => $venda_pagamento['recebimento_cartoes']['status'],
            ]);
            break;
            
          case 'fin_contas_internas':
            $pagamento->pqwnldkwjfencsb()->create([
              'fonte_origem'  => 'pdv_vendas_pagamentos', 
              'id_pessoa'     => $venda_pagamento['conta_interna']['id_pessoa'], 
              'tipo'          => $venda_pagamento['conta_interna']['tipo'], 
              'percentual'    => $venda_pagamento['conta_interna']['percentual'], 
              'valor'         => $venda_pagamento['conta_interna']['valor'], 
              'dt_prevista'   => $venda_pagamento['conta_interna']['dt_prevista'], 
              'status'        => $venda_pagamento['conta_interna']['status'], 
            ]);
            break;
        }
      }
        
      $this->dispatch('swal:alert', [
        'text'      => 'Comanda Concluído com sucesso!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
      
      return redirect()->to(route('pdv.comandas.listar')); 
    }
    else
    {
      $this->comanda_finalizada = $resp;
    }
  }
  
  public function render()
  {
    $this->opcoes_formas = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->orderBy('forma', 'asc')->distinct()->get(['forma']);
    
    return view('livewire/pdv/comanda/comanda-criar')->layout('layouts/bootstrap');
  }
}
