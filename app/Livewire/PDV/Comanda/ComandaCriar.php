<?php

namespace App\Livewire\PDV\Comanda;

use Livewire\Component;
use App\Models\PDV\Comanda as DBComanda;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Configuracao\FormaPagamento as DBFormaPagamento;

class ComandaCriar extends Component
{
  // DADOS GERAIS ==========================================================================================================================================
  public $cmd_valor_total;
  public $cmd_valor_pago;
  public $cmd_valor_restante;
  public $comanda_finalizada = false;

  // DADOS QUE MODIFICAM A VIEW ============================================================================================================================
  public $etapa = 'etapa-1';
  public $bt_detalhe_adicionar = 'disabled';
    
  // DADOS DA VENDA ========================================================================================================================================
  public $caixa;
  public $cliente;
  
  // DADOS DE DETALHES =====================================================================================================================================
  public $AA_vendas_detalhes   = [];
  
  public $id_chave;
  public $id_servprod;
  public $tipo_preco = 'Preço variável';
  public $vlr_venda     = '0,00';
  public $vlr_negociado = '0,00';
  public $vlr_dsc_acr   = '0,00';
  public $vlr_final     = '0,00';
  public $id_agendamento;
  
  public $tipo_adicao = 'tradicional';
  
  public $servprod_nome;
  
  // DADOS DE PAGAMENTO ====================================================================================================================================
  public $AA_vendas_pagamentos = [];
  
  public $forma_escolhida;
  public $opcoes_formas;
  public $opcoes_bandeiras;
  public $opcoes_parcelas;
  public $pgto_forma = 'Dinheiro';
  public $pgto_bandeira;
  public $pgto_parcela;
  public $pgto_tipo;
  public $pgto_taxa;
  public $pgto_prazo;
  public $pgto_pri_vcto;
  public $destino;
  public $pgto_valor;
  public $pgto_proximo = false;

  public $cmd_valor_pagando = '0,00';
  
  // DADOS DE RELACIONAMENTOS - CONTA INTERNA ==============================================================================================================
  public $profissionals = [];
  public $id_pessoa;
  public $percentual   = 0;
  public $valor        = 0;

  public $tipo_comissao = 'Comissão Sob Valor Final';
  public $profissional_nome;

  // DADOS DE RELACIONAMENTOS - AGENDAMENTOS ===============================================================================================================
  public $AA_tem_agendamentos;
  
  // =======================================================================================================================================================
   
  protected $listeners = [
    'agendamentos_adicionar'   => 'origem_detalhe_adicionar',
    'saldos_adicionar'         => 'origem_detalhe_adicionar',
    'saldo_negativo_adicionar' => 'saldo_negativo',
    'saldo_positivo_adicionar' => 'saldo_positivo',
  ];
  
  public function mount()
  {
    $this->caixa = auth()->user()->abcdefghijklmno;
    $this->calcular_valores();


    // $this->cliente = auth()->user();
    // $this->mudar_etapa( etapa: 'etapa-3');
    $this->forma_selecionando( 'forma' );
  }
  
  public function mudar_etapa( $etapa )
  {
    $this->calcular_valores();
    $this->etapa = $etapa;
  }
  
  public function cliente_selecionado( $id_cliente )
  {
    if($id_cliente == 0)
    {
      $this->cliente = 0;
      $this->mudar_etapa( 'etapa-2' );
    }
    elseif($id_cliente == '')
    {
      $this->cliente = null;
      $this->mudar_etapa( 'etapa-1' );
    }
    else
    {
      $this->cliente = DBPessoa::find($id_cliente);

      if($this->cliente->agendamentos_hoje->count() != 0)
      {
        $this->modal_agendamentos();
        $this->mudar_etapa( 'etapa-agendamento' );
      }
      
      if($this->cliente->saldo_conta != 0)
      {
        $this->modal_saldo();
        $this->mudar_etapa( 'etapa-saldo' );
      }
      
      $this->mudar_etapa( 'etapa-2' );
    }
  }
  
  public function modal_saldo()
  {
    $this->dispatch('saldos_ver', $this->cliente, 'agendamentos');
  }
  
  public function modal_agendamentos()
  {
    $this->dispatch('agendamentos_ver', $this->cliente, 'etapa-2');
  }
  // FIM ETAPA VENDA ---------------------------------------------------------------------------------------------------------------------------------------

  function servico_selecionado( $id_servico )
  {
    if($id_servico != '')
    {
      $servico = DBServicoProduto::find($id_servico);
      $this->id_servprod   = $servico->id;
      $this->tipo_preco    = $servico->tipo_preco;
      $this->vlr_venda     = $this->num_convert_brasil($servico->vlr_venda);
      $this->vlr_negociado = $this->num_convert_brasil($servico->vlr_venda);
      $this->vlr_dsc_acr   = $this->num_convert_brasil(0);
      $this->servprod_nome = $servico->nome;

      $this->atualizar_valor_final();
      
      $this->profissionals = $servico->smenhgskqwmdjwe;
      
      $this->bt_detalhe_adicionar = '';
    }
    else
    {
      $this->reset(['id_chave', 'id_servprod', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'id_agendamento', 'profissionals', 'id_pessoa', 'profissional_nome', 'percentual', 'valor', 'tipo_comissao', 'tipo_adicao' ]);
      $this->reset(['bt_detalhe_adicionar']);
    }
  }
  
  public function atualizar_valor_final()
  {
    $this->vlr_final = ( $this->num_convert_brasil( $this->num_convert_decimal($this->vlr_negociado) + $this->num_convert_decimal($this->vlr_dsc_acr) ) );

    // quando for definir se a comissao é sobre o valor final ou sobre o valor de venda, definir aqui

    $this->valor = $this->num_convert_brasil($this->num_convert_decimal($this->percentual ?? 0) / 100 * $this->num_convert_decimal($this->vlr_final ?? 0));
  }

  public function profissional_selecionado(): void
  {
    if($this->id_pessoa != null)
    {
      $profissional = DBPessoa::find($this->id_pessoa);

      $this->id_pessoa         = $profissional->id;
      $this->profissional_nome = $profissional->apelido;

      $colabserv = $profissional->aeahvtsijjoprlc->where('id_servprod', $this->id_servprod)->first();

      if(!is_null($colabserv))
      {
        $this->percentual = $this->num_convert_brasil($colabserv->prc_comissao * 100, 1);
        $this->valor      = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
      }
      else
      {
        $this->percentual = $this->num_convert_brasil(0 , 1);
        $this->valor      = $this->num_convert_brasil(0);
      }
    }
    else
    {
      $this->id_pessoa          = null;
      $this->profissional_nome  = null;
      $this->percentual         = null;
      $this->valor              = null;
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
  
  function detalhe_adicionar(): void
  {
    if($this->tipo_adicao == 'editar')
    {
      $this->detalhe_editar();
    }
    else
    {
      $venda_detalhe = [
        'id_chave'         => count($this->AA_vendas_detalhes) == 0 ? 0 : array_key_last($this->AA_vendas_detalhes) + 1,
        'id_servprod'      => $this->id_servprod,
        'servprod_nome'    => $this->servprod_nome,
        'vlr_venda'        => $this->num_convert_decimal($this->vlr_venda),
        'vlr_negociado'    => $this->num_convert_decimal($this->vlr_negociado),
        'vlr_dsc_acr'      => $this->num_convert_decimal($this->vlr_dsc_acr),
        'vlr_final'        => $this->num_convert_decimal($this->vlr_final),
        'obs'              => $this->obs ?? null,                                             // incluir campo observação
        'id_agendamento'   => $this->id_agendamento ?? null,
        'conta_interna'    => [
          'id_pessoa'         => $this->id_pessoa,
          'tipo'              => $this->tipo_comissao,
          'profissional_nome' => $this->profissional_nome,
          'percentual'        => $this->num_convert_decimal($this->percentual ?? 0),
          'valor'             => $this->num_convert_decimal($this->valor ?? 0), 
        ],
      ];
      
      array_push($this->AA_vendas_detalhes, $venda_detalhe);
    }
    
    $this->calcular_valores(); 
    
    $this->reset(['id_chave', 'id_servprod', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'id_agendamento', 'profissionals', 'id_pessoa', 'profissional_nome', 'percentual', 'valor', 'tipo_comissao', 'tipo_adicao' ]);
    $this->reset(['bt_detalhe_adicionar']);
  }

  function detalhe_editar_selecionar( $chave )
  {
    $this->reset(['id_chave', 'id_servprod', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'id_agendamento', 'profissionals', 'id_pessoa', 'profissional_nome', 'percentual', 'valor', 'tipo_comissao', 'tipo_adicao' ]);

    $servico = DBServicoProduto::find($this->AA_vendas_detalhes[$chave]['id_servprod']);
    
    $this->tipo_adicao    = 'editar';
    
    $this->id_chave       = $this->AA_vendas_detalhes[$chave]['id_chave'];
    $this->id_servprod    = $servico->id;
    $this->servprod_nome  = $servico->nome;
    $this->tipo_preco     = $servico->tipo_preco;
    $this->vlr_venda      = $this->num_convert_brasil($servico->vlr_venda);
    
    /*
    FIXO
    * negociado = venda
    * desc-acr = 0
    
    VARIAVEL
    * negociado = negociado ?? venda
    * desc-acr = venda - negociado
    */ 
    
    
    if($servico->tipo_preco == 'Preço fixo')
    {
      $this->vlr_negociado = $this->num_convert_brasil($this->AA_vendas_detalhes[$chave]['vlr_negociado'] ?? $servico->vlr_venda);
      $this->vlr_final     = $this->num_convert_brasil($this->AA_vendas_detalhes[$chave]['vlr_final'] ?? $servico->vlr_negociado);
      $this->vlr_dsc_acr   = $this->num_convert_brasil($this->num_convert_decimal($this->vlr_final) - $this->num_convert_decimal($this->vlr_negociado));
    }
    elseif($servico->tipo_preco == 'Preço variável')
    {
      $this->vlr_negociado = $this->num_convert_brasil($this->AA_vendas_detalhes[$chave]['vlr_negociado'] ?? $servico->vlr_venda);
      $this->vlr_final     = $this->num_convert_brasil($this->AA_vendas_detalhes[$chave]['vlr_final'] ?? $servico->vlr_negociado);
      $this->vlr_dsc_acr   = $this->num_convert_brasil($this->num_convert_decimal($this->vlr_final) - $this->num_convert_decimal($this->vlr_negociado));
    }
    else
    {
      $this->vlr_negociado = $this->num_convert_brasil($this->AA_vendas_detalhes[$chave]['vlr_negociado'] ?? $servico->vlr_venda);
      $this->vlr_final     = $this->num_convert_brasil($this->AA_vendas_detalhes[$chave]['vlr_final'] ?? $servico->vlr_negociado);
      $this->vlr_dsc_acr   = $this->num_convert_brasil($this->num_convert_decimal($this->vlr_final) - $this->num_convert_decimal($this->vlr_negociado));
    }
    
    $this->obs            = $this->AA_vendas_detalhes[$chave]['obs'];
    $this->id_agendamento = $this->AA_vendas_detalhes[$chave]['id_agendamento'];
    
    $this->profissionals     = $servico->smenhgskqwmdjwe;
    $this->id_pessoa         = $this->AA_vendas_detalhes[$chave]['conta_interna']['id_pessoa'];
    $this->profissional_nome = $this->AA_vendas_detalhes[$chave]['conta_interna']['profissional_nome'];
    $this->percentual        = $this->AA_vendas_detalhes[$chave]['conta_interna']['percentual'];
    $this->tipo_comissao     = $this->AA_vendas_detalhes[$chave]['conta_interna']['tipo'];

    $this->valor = $this->num_convert_brasil($this->num_convert_decimal($this->percentual ?? 0) / 100 * $this->num_convert_decimal($this->vlr_final ?? 0));
    
    $this->profissional_selecionado();
    $this->bt_detalhe_adicionar = '';
  }

  function detalhe_editar(): void
  {
    $this->AA_vendas_detalhes[$this->id_chave]['id_chave']       = $this->id_chave;
    $this->AA_vendas_detalhes[$this->id_chave]['id_servprod']    = $this->id_servprod;
    $this->AA_vendas_detalhes[$this->id_chave]['servprod_nome']  = $this->servprod_nome;
    $this->AA_vendas_detalhes[$this->id_chave]['vlr_venda']      = $this->num_convert_decimal($this->vlr_venda);
    $this->AA_vendas_detalhes[$this->id_chave]['vlr_negociado']  = $this->num_convert_decimal($this->vlr_negociado);
    $this->AA_vendas_detalhes[$this->id_chave]['vlr_dsc_acr']    = $this->num_convert_decimal($this->vlr_dsc_acr);
    $this->AA_vendas_detalhes[$this->id_chave]['vlr_final']      = $this->num_convert_decimal($this->vlr_final);
    $this->AA_vendas_detalhes[$this->id_chave]['obs']            = $this->obs ?? null;
    $this->AA_vendas_detalhes[$this->id_chave]['id_agendamento'] = $this->id_agendamento;
    
    $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['id_pessoa']          = $this->id_pessoa;
    $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['profissional_nome']  = $this->profissional_nome;
    $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['tipo']               = $this->tipo_comissao;
    $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['percentual']         = $this->num_convert_decimal($this->percentual);
    $this->AA_vendas_detalhes[$this->id_chave]['conta_interna']['valor']              = $this->num_convert_decimal($this->valor);
  }

  public function detalhe_remover( $chave )
  {
    unset($this->AA_vendas_detalhes[$chave]);
    
    $this->calcular_valores();
  }

  // FIM ETAPA DETALHES ------------------------------------------------------------------------------------------------------------------------------------















  
  
  
  
  // FIM ETAPA PAGAMENTOS-----------------------------------------------------------------------------------------------------------------------------------














  function origem_detalhe_adicionar( $dados )
  {    
    switch ($dados['origem_adicao'])
    {
      case 'tradicional':
        dd("case 'tradicional'");
        # code...
        break;
        
      case 'agendamentos':
        foreach($dados['agendamentos'] as $value)
        {
          $this->id_servprod       = $value['id_servprod'];
          $this->servprod_nome     = $value['zlpekczgsltqgwg']['nome'];
          $this->vlr_venda         = $this->num_convert_brasil(floatval($value['zlpekczgsltqgwg']['vlr_venda']));
          $this->vlr_negociado     = $this->num_convert_brasil(floatval($value['zlpekczgsltqgwg']['vlr_venda']));
          $this->vlr_final         = $this->num_convert_brasil(floatval($value['valor'] ?? $value['zlpekczgsltqgwg']['vlr_venda']));
          $this->vlr_dsc_acr       = $this->num_convert_brasil((floatval($value['valor'] ?? $value['zlpekczgsltqgwg']['vlr_venda'])) - floatval($value['zlpekczgsltqgwg']['vlr_venda']));
          $this->obs               = $value['obs'];
          $this->id_agendamento    = $value['id'];
          $this->id_pessoa         = $value['id_profexec'];
          $this->tipo_comissao     = 'Comissão Sob Valor Final';
          $this->profissional_nome = DBPessoa::find($value['id_profexec'])->apelido;
          $this->percentual        = $this->num_convert_brasil(floatval($value['prc_comissao']));
          $this->valor             = $this->num_convert_brasil(floatval($value['vlr_comissao']));
          $this->detalhe_adicionar();
        }
        break;

      case 'editar':
        dd("case 'editar'");
        # code...
        break;
      
      case 'saldos':
        $this->pgto_forma        = 'Credito Interno';
        $this->cmd_valor_pagando = $dados['saldo'];

        $this->atualizar_forma_pagamento()->first();

        if($dados['saldo'] > 0)
        {
          dd(1111);
          // $this->servico_selecionado( $id_servico )
          dump("saldo positivo", $this->adicionar_pagamento(), $this->AA_vendas_pagamentos);
        }
        elseif($dados['saldo'] < 0)
        {
          dump("saldo negativo", $this->adicionar_pagamento(), $this->AA_vendas_pagamentos);
        }
        else
        {
          dd("case 'saldos'");
        }
        break;
      
      default:
        dd('function origem_detalhe_adicionar - origem  nao conhecida');
        break;
    }
  }














  // ========================================================================================================================================================================      PAGAMENTO
  public function forma_selecionando( $campo ): void
  {
    switch ($campo)
    {
      case 'forma':
        if ($this->pgto_forma == "")
        {
          $this->reset(['pgto_forma']);
        }
        $this->reset(['pgto_bandeira', 'pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto']);

        $this->opcoes_bandeiras = $this->atualizar_forma_pagamento()->select('bandeira')->pluck('bandeira')->unique();
        break;
      
      case 'bandeira':
        if ($this->pgto_bandeira == "")
        {
          $this->reset(['pgto_bandeira']);
        }
        $this->reset(['pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto']);

        $this->opcoes_parcelas = $this->atualizar_forma_pagamento()->select('parcela')->pluck('parcela')->unique();
        break;
      
      case 'parcela':
        if ($this->pgto_parcela == "")
        {
          $this->reset(['pgto_parcela']);
        }
        $this->reset(['pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto']);

        $this->atualizar_forma_pagamento();
        break;
      
      default:
        dd('ERRO');
        break;
    }
  }
  
  public function atualizar_forma_pagamento()
  {
    $this->forma_escolhida = DBFormaPagamento::
                                              when($this->pgto_forma, function ($query)
                                              {
                                                $query->where('forma', '=', $this->pgto_forma );
                                              })->
                                              when($this->pgto_bandeira, function ($query)
                                              {
                                                $query->where('bandeira', '=', $this->pgto_bandeira );
                                              })->
                                              when($this->pgto_parcela, function ($query)
                                              {
                                                $query->where('parcela', '=', $this->pgto_parcela );
                                              })->
                                              get();

    $this->pgto_pri_vcto = \Carbon\Carbon::today()->format('Y-m-d');

    return $this->forma_escolhida;
  }

  public function adicionar_pagamento(): void
  {
    $id_grupo = collect($this->AA_vendas_pagamentos)->count() + 1;
    $pgto_parcela = $this->pgto_parcela ?? 1;
    
    for ($i=0; $i < $pgto_parcela; $i++)
    {
      $venda_pagamento = [
        'id_chave'           => count($this->AA_vendas_pagamentos) + 1,
        'id_grupo'           => $id_grupo,
        'id_forma_pagamento' => $this->forma_escolhida->first()->id,
        'descricao'          => $this->pgto_forma.' - '.$this->pgto_bandeira,
        'parcela'            => str_pad((string) $i+1, 2, '0', STR_PAD_LEFT).'/'.str_pad((string) $pgto_parcela, 2, '0', STR_PAD_LEFT), 
        'valor'              => $this->num_convert_decimal($this->cmd_valor_pagando) / $pgto_parcela,
        'status'             => 'Em aberto',
        'dt_prevista'        => \Carbon\Carbon::parse($this->pgto_pri_vcto)->addDays($this->pgto_prazo / $pgto_parcela * $i)->format('Y-m-d'),
        'forma'              => $this->pgto_forma,
        'bandeira'           => $this->pgto_bandeira,
        'taxa'               => $this->forma_escolhida->first()->taxa ?? 1,  
        'destino'            => $this->forma_escolhida->first()->destino,
      ]; //$this->comanda->xzxfrjmgwpgsnta()->create()

      switch($this->forma_escolhida->first()->destino)
      {
        case 'fin_recebimentos_cartoes':
          $venda_pagamento['recebimento_cartoes'] = [
            'id_banco'           => $this->forma_escolhida->first()->id_banco,
            'id_forma_pagamento' => $this->forma_escolhida->first()->id,
            'vlr_real'           => $venda_pagamento['valor'],
            'prc_descontado'     => $this->forma_escolhida->first()->taxa,
            'vlr_final'          => $venda_pagamento['valor'] - ($this->forma_escolhida->first()->taxa * $venda_pagamento['valor'] / 100 ),
            'dt_prevista'        => $venda_pagamento['dt_prevista'],
            'status'             => 'Aguardando',
          ]; //->fjwlfkjalpdwepf()->create();
          break;
          
        case 'fin_contas_internas':
          $venda_pagamento['conta_interna'] = [
            'fonte_origem'  => 'pdv_vendas_pagamentos', 
            'id_pessoa'     => is_object($this->cliente) ? $this->cliente->id : $this->cliente, 
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
    
    $this->pgto_forma = 'Dinheiro';
    $this->forma_selecionando( 'forma' );
    
    $this->calcular_valores();
    
    $this->dispatch('swal:alert', [
      'text'      => 'Pagamento incluído com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }
  





























  
  
  public function pagamento_remover($id_grupo)
  {
    foreach($this->AA_vendas_pagamentos as $key => $pagamento)
    {
      if ($pagamento['id_grupo'] == $id_grupo)
      {
        unset($this->AA_vendas_pagamentos[$key]);
      }
    }

    $this->reset(['pgto_forma', 'pgto_bandeira', 'pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto']);
    
    $this->calcular_valores();
    
    $this->dispatch('swal:alert', [
      'title'     => 'Deletado!',
      'text'      => 'Pagamento(s) deletado(s) com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);

  }

  public function corrigir_valor_pagando( $valor )
  {
    $this->cmd_valor_pagando = $this->num_convert_brasil($this->num_convert_decimal($valor));
  }

  // ========================================================================================================================================================================      FIM PAGAMENTO
  
  public function calcular_valores(): void
  {
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
  
  public function num_convert_brasil( $valor , $casas=2 )
  {
    return number_format($valor, $casas, ',', '.');
  }
  
  public function num_convert_decimal( $valor )
  {
    return str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $valor)));
  }
  
  // ========================================================================================================================================================================      FINALIZAR COMANDA
  public function finalizar_comanda($resp)
  {
    if($resp)
    {
      $venda = DBComanda::create([
        'id_caixa'       => $this->caixa->id,
        'id_usuario'     => auth()->user()->id,
        'id_cliente'     => is_object($this->cliente) ? $this->cliente->id : $this->cliente,
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
          'valor'        => floatval($venda_detalhe['conta_interna']['valor']),
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
              'id_banco'           => $venda_pagamento['recebimento_cartoes']['id_banco'],
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
