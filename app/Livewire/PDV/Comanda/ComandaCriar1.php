<?php

namespace App\Livewire\PDV\Comanda;

use Livewire\Component;
use App\Models\PDV\Comanda as DBComanda;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;

class ComandaCriar1 extends Component
{
  public $caixa;

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


  public $id_servprod;
  public $quantidade = 1;
  public $tipo_preco;
  public $vlr_venda     = '0,00';
  public $vlr_negociado = '0,00';
  public $vlr_dsc_acr   = '0,00';
  public $vlr_final     = '0,00';
  
  public $profissionals = [];
  public $id_pessoa;
  public $percentual   = 0;
  public $valor        = 0;
  




  public $ultimo_comanda_id_banco;
  public $saldo_comanda_escolhido;


  
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



  protected $listeners = ['comandaUpdated' => 'refreshList'];
    
  public function mount()
  {
    $this->caixa = auth()->user()->abcdefghijklmno;

    $this->venda['id_caixa']   = $this->caixa->id;
    $this->venda['id_usuario'] = auth()->user()->id;
    $this->venda['id_cliente'] = $this->cliente->id ?? null;
  } 
  
  public function cliente_selecionado( $id_cliente )
  {
    $this->criar_venda( $id_cliente );
  }
  
  public function criar_venda( $id_cliente )
  {
     $this->venda = DBComanda::create([
      'id_caixa'       => $this->venda['id_caixa'],
      'id_usuario'     => $this->venda['id_usuario'],
      'id_cliente'     => $id_cliente,
      'qtd_produtos'   => 0,
      'vlr_prod_serv'  => 0,
      'vlr_negociado'  => 0,
      'vlr_dsc_acr'    => 0,
      'vlr_final'      => 0,
      'status'         => 'Em aberto',
    ]);

    $this->venda['id'] = $this->venda->id;

    $this->dispatch('swal:alert', [
      'text'      => 'Venda iniciada!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);

    return redirect()->to(route('pdv.comandas.editar', $this->venda->id)); 
  }


  public function atualizar_venda()
  {
    $this->venda->update([
      'id_cliente' => $this->cliente->id,
    ]);

    $this->dispatch('swal:alert', [
      'text'      => 'Venda atualizada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }

  public function servico_selecionado( $id_servico )
  {
    $servico = DBServicoProduto::find($id_servico);
    $this->vlr_venda     = $servico->vlr_venda;
    $this->vlr_negociado = $servico->vlr_venda;
    $this->tipo_preco    = $servico->tipo_preco;

    $this->atualizar_valor_final();

    $this->profissionals = $servico->smenhgskqwmdjwe;
    // $this->item_comanda = DBServicoProduto::find($id_servico);
    // $this->servico_produto['id']            = $this->item_comanda->id;
    // $this->servico_produto['tipo']          = $this->item_comanda->tipo;
    // $this->servico_produto['tipo_preco']    = $this->item_comanda->tipo_preco;
    // $this->servico_produto['tipo_comissao'] = $this->item_comanda->tipo_comissao;
    // $this->servico_produto['prc_comissao']  = $this->item_comanda->prc_comissao;
    // $this->servico_produto['vlr_venda']     = $this->item_comanda->vlr_venda ?? 0;
    // $this->servico_produto['estoque_atual'] = $this->item_comanda->estoque_atual;

    // $this->profissionais = $this->item_comanda->lwerwerflkdsjfs;

    // switch ($this->servico_produto['tipo'])
    // {
    //   case 'Produto':
    //     $this->feedback_item_comanda = 'Produto | Estoque Atual: '.$this->servico_produto['estoque_atual'];
    //     if($this->servico_produto['estoque_atual'] < 1)   // Verifica Estoque e segue ou não dependendo da linha comentada abaixo
    //     {
    //       $this->feedback_item_comanda_status = 'text-red';
          
    //       $this->dispatch('swal:alert', [
    //         'title'     => 'Sem estoque!',
    //         'text'      => 'Não temos esse produto no estoque!',
    //         'icon'      => 'warning',
    //         'iconColor' => 'red',
    //       ]);
    //     }
    //     else
    //     {
    //       $this->feedback_item_comanda_status = 'text-black';
    //     }
    //     break;
        
    //   case 'Serviço':
    //     $this->feedback_item_comanda = 'Serviço | Tipo do preço: '.$this->servico_produto['tipo_preco'];

    //     if($this->servico_produto['tipo_preco'] == "Preço fixo")
    //     {
    //       $this->feedback_item_comanda_negociado = true;
    //     }
    //     else if($this->servico_produto['tipo_preco'] == "Preço variável")
    //     {
    //       $this->feedback_item_comanda_negociado = false;
    //     }
    //     else
    //     {
    //       $this->feedback_item_comanda_negociado = true;
    //       $this->feedback_item_comanda = $this->servico_produto['tipo'];
    //     }
    //     break;
          
    //   default:
    //     $this->feedback_item_comanda = $this->servico_produto['tipo'].' | Tipo do preço: '.$this->servico_produto['tipo_preco'];
    //     break;
    // }
    // $this->atualizar_venda_detalhes();
  }
  
  
  public function adicionar_servprod()
  {
    $this->venda->dfyejmfcrkolqjh()->create([
      'id_servprod'   => $this->id_servprod,
      'quantidade'    => $this->quantidade,
      'vlr_venda'     => $this->vlr_venda,
      'vlr_negociado' => $this->vlr_negociado,
      'vlr_dsc_acr'   => $this->vlr_dsc_acr,
      'vlr_final'     => $this->vlr_final,
      'status'        => 'Em aberto',
    ])->hgihnjekboyabez()->create([
      'fonte_origem' => 'pdv_vendas_detalhes',
      'id_pessoa'    => $this->id_pessoa,
      'tipo'         => 'Comissão Sob Valor Final',
      'dt_prevista'  => \Carbon\Carbon::now(),
      'percentual'   => $this->percentual,
      'valor'        => $this->valor,
      'status'       => 'Em aberto',
    ]);
    
    dump('salvo');
  }

  public function atualizar_valor_final()
  {
    $vlr_final = ( str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $this->vlr_negociado))) + str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $this->vlr_dsc_acr))) ) * $this->quantidade;
    
    $this->vlr_final = number_format($vlr_final, 2, ',', '.');
    $this->valor     = number_format($this->percentual / 100 * str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $this->vlr_final))), 2, ',', '.');
  }
  
  public function atualizar_venda_detalhes()
  {
    $this->venda_detalhes['id_venda']      = $this->venda['id'];
    $this->venda_detalhes['id_servprod']   = $this->servico_produto['id'];
    $this->venda_detalhes['quantidade']    = $this->item_quantidade;
    $this->venda_detalhes['vlr_venda']     = $this->servico_produto['vlr_venda'];
    $this->venda_detalhes['vlr_negociado'] = $this->item_vlr_negociado ?? $this->servico_produto['vlr_venda'];
    $this->venda_detalhes['vlr_dsc_acr']   = $this->item_vlr_dsc_acr;
    $this->venda_detalhes['vlr_final']     = $this->servico_produto['vlr_venda'] + $this->item_vlr_dsc_acr;
    $this->venda_detalhes['obs']           = null;
    $this->venda_detalhes['status']        = 'Em aberto';
  }

  public function profissional_selecionado()
  {
    $profissional       = DBPessoa::find($this->id_pessoa);
    $this->id_pessoa    = $profissional->id;

    $colabserv          = $profissional->aeahvtsijjoprlc->where('id_servprod', $this->id_servprod)->first();
    $this->percentual   = $colabserv->prc_comissao * 100;
    $this->valor        = number_format($this->percentual / 100 * str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $this->vlr_final))), 2, ',', '.');

    // $this->atualizar_comissao();


    
    
    // dd($this->item_comanda->smenhgskqwmdjwe->where('id_profexec', '=', $this->id_profexec->id)->first());
    // $this->feedback_cliente = 
    // $this->tipo_comissao+' | Percentual: '+number_format(temp.pdv_venda_detalhes.fin_contas_internas.percentual * 100, '', 1)+'% | Valor: '+number_format(temp.pdv_venda_detalhes.fin_contas_internas.valor
    // 'Saldo em conta: R$ '.number_format($this->cliente->saldo_conta, 2, ',', '.');
  }
  
  public function atualizar_comissao()
  {
    $this->conta_internas['id_origem']     = null; 
    $this->conta_internas['fonte_origem']  = 'pdv_vendas_detalhes'; 
    $this->conta_internas['id_pessoa']     = $this->profissional->id;
    $this->conta_internas['tipo']          = $this->tipo_comissao; 
    $this->conta_internas['percentual']    = $this->prof_exec->prc_comissao;
    $this->conta_internas['valor']         = $this->prof_exec->prc_comissao / 100  * $this->venda_detalhes['vlr_final']; 
    $this->conta_internas['dt_prevista']   = null; 
    $this->conta_internas['dt_quitacao']   = null; 
    $this->conta_internas['id_destino']    = null; 
    $this->conta_internas['fonte_destino'] = null; 
    $this->conta_internas['status']        = 'Em aberto'; 

    switch ($this->tipo_comissao)
    {          
      case 'Comissão Sob Valor Final':
        $this->conta_internas['valor'] = $this->prof_exec->prc_comissao / 100  * $this->venda_detalhes['vlr_final']; 

        break;
        
      case 'Comissão Sob Valor Tabelado':
        $this->conta_internas['valor'] = $this->prof_exec->prc_comissao / 100  * $this->venda_detalhes['vlr_negociado']; 
        break;
        
      case 'Comissão Zerada':
        $this->conta_internas['percentual'] = 0;
        $this->conta_internas['valor'] = 0;
        break;
        
      case 'Comissão Manual':
        $this->conta_internas['percentual'] = $this->manual_comissao * $this->conta_internas['percentual'];
        $this->conta_internas['valor'] = 0;
        break;
    }
    
    $this->feedback_profexec = $this->tipo_comissao.' | Percentual: '.number_format($this->conta_internas['percentual'], 1, ',').'% | Valor: R$ '.number_format($this->conta_internas['valor'], 2, ',', '.');
    
    //   $('#profexec_feedback').text(
      //   $('#profexec_feedback').removeClass('d-none').addClass('d-block')
      //   temp.pdv_venda_detalhes.fin_contas_internas.id_pessoa = $this->id_profexec
      //   temp.pdv_venda_detalhes.fin_contas_internas.apelido = $("#id_profexec").find(':selected').text()
      // }
      // else
      // {
        //   $('#profexec_feedback').removeClass('d-block').addClass('d-none')
        //   temp.pdv_venda_detalhes.fin_contas_internas.id_pessoa = null
        //   temp.pdv_venda_detalhes.fin_contas_internas.apelido  = null
        // }
  }
      
  public function comanda_escolhido( $id )
  {
    $this->ultimo_comanda_id_banco = DBComanda::orderBy('id', 'desc')->where('id_banco', '=', $id)->first();

    if(!is_null($this->ultimo_comanda_id_banco))
    {
      $this->saldo_comanda_escolhido = 
                                      ( $this->ultimo_comanda_id_banco->nota200 * 200 ) +
                                      ( $this->ultimo_comanda_id_banco->nota100 * 100 ) + 
                                      ( $this->ultimo_comanda_id_banco->nota50 * 50 ) + 
                                      ( $this->ultimo_comanda_id_banco->nota20 * 20 ) + 
                                      ( $this->ultimo_comanda_id_banco->nota10 * 10 ) + 
                                      ( $this->ultimo_comanda_id_banco->nota5 * 5 ) + 
                                      ( $this->ultimo_comanda_id_banco->nota2 * 2 ) + 
                                      ( $this->ultimo_comanda_id_banco->moeda100 * 1 ) + 
                                      ( $this->ultimo_comanda_id_banco->moeda50 * 0.50 ) + 
                                      ( $this->ultimo_comanda_id_banco->moeda25 * 0.25 ) + 
                                      ( $this->ultimo_comanda_id_banco->moeda10 * 0.10 ) + 
                                      ( $this->ultimo_comanda_id_banco->moeda5 * 0.5 ) + 
                                      ( $this->ultimo_comanda_id_banco->moeda1 * 0.1 );
    }
    else
    {
      $this->saldo_comanda_escolhido = 0;
    }
  }

  public function store()
  {
    $comanda = DBComanda::create([
      'id_banco'             => $this->id_banco,
      'id_usuario_abertura'  => auth()->user()->id,
      'vlr_abertura'         => $this->ultimo_comanda_id_banco->vlr_fechamento ?? 0,
      'vlr_fechamento'       => null,
      'status'               => 'Aberto',
      'dt_abertura'          => \Carbon\Carbon::now(),
      'dt_fechamento'        => null,
      'dt_validacao'         => null,
      'id_usuario_validacao' => null,
      'nota200'              => $this->ultimo_comanda_id_banco->nota200 ?? 0,
      'nota100'              => $this->ultimo_comanda_id_banco->nota100 ?? 0,
      'nota50'               => $this->ultimo_comanda_id_banco->nota50 ?? 0,
      'nota20'               => $this->ultimo_comanda_id_banco->nota20 ?? 0,
      'nota10'               => $this->ultimo_comanda_id_banco->nota10 ?? 0,
      'nota5'                => $this->ultimo_comanda_id_banco->nota5 ?? 0,
      'nota2'                => $this->ultimo_comanda_id_banco->nota2 ?? 0,
      'moeda100'             => $this->ultimo_comanda_id_banco->moeda100 ?? 0,
      'moeda50'              => $this->ultimo_comanda_id_banco->moeda50 ?? 0,
      'moeda25'              => $this->ultimo_comanda_id_banco->moeda25 ?? 0,
      'moeda10'              => $this->ultimo_comanda_id_banco->moeda10 ?? 0,
      'moeda5'               => $this->ultimo_comanda_id_banco->moeda5 ?? 0,
      'moeda1'               => $this->ultimo_comanda_id_banco->moeda1 ?? 0,
    ]);

    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Comanda aberto com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('pdv.comandas.index')); 
  }
  

  public function render()
  {
    return view('livewire/pdv/comanda/comanda-criar')->layout('layouts/bootstrap');
  }
}
