<?php

namespace App\Livewire\PDV\Comanda;

use Livewire\Component;
use App\Models\PDV\Comanda as DBComanda;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Atendimento\Agendamento as DBAgendamento;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Configuracao\FormaPagamento as DBFormaPagamento;

class ComandaEditar extends Component
{
  public $id;
  public $comanda;

  public $agendamentos = [];
  public $adicionando = [];


  // INFORMAÇÕES DO CLIENTE ==========================================================================================================================================
  public $id_cliente;
  public $feedback_cliente;

  // INFORMAÇÕES DO SERVIÇO OU PRODUTO - DETALHES ====================================================================================================================
  public $id_servprod;
  public $quantidade = 1;
  public $tipo_preco;
  public $vlr_venda       = '0,00';
  public $vlr_negociado   = '0,00';
  public $vlr_dsc_acr     = '0,00';
  public $vlr_final       = '0,00';
  public $id_agendamento;
  

  // INFORMAÇÕES DO SERVIÇO OU PRODUTO - CONTA INTERNA ===============================================================================================================
  public $profissionals   = [];
  public $id_pessoa;
  public $tipo_comissao   = 'Comissão Sob Valor Final';
  public $percentual      = '0,0';
  public $comissao_padrao = '0,0';
  public $valor           = '0,00';


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
  public $pgto_valor;
  public $pgto_proximo = false;
  public $cmd_valor_total = '0,00';
  public $cmd_valor_pago = '0,00';
  public $cmd_valor_restante = '0,00';
  public $comanda_finalizada = false;


  protected $listeners = ['comandaUpdated' => 'refreshList'];

  public function mount()
  {
    $this->comanda    = DBComanda::find($this->id);

    // if($this->comanda->id_usuario != null && auth()->user()->id != $this->comanda->id_usuario)
    // {
    //   return redirect()->to(route('pdv.comandas.listar')); 
    // }

    $this->id_cliente = $this->comanda->id_cliente ?? 0;
    
    $this->possui_agendamentos($this->id_cliente);
    $this->possui_saldo($this->id_cliente);
    $this->calcular_valores();
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
      $this->pgto_pri_vcto   = \Carbon\Carbon::today()->addDays($this->forma_pagamento->pri_vcto)->format('Y-m-d');
    }
  }

  public function pagamento_selecionar()
  {
    $pgto_parcela = $this->pgto_parcela ?? 1;
    
    for ($i=0; $i < $pgto_parcela; $i++)
    {
      $pagamento = $this->comanda->xzxfrjmgwpgsnta()->create([
        'id_forma_pagamento' => $this->forma_pagamento->id,
        'descricao'          => $this->pgto_forma.' - '.$this->pgto_bandeira,
        'parcela'            => str_pad((string) $i+1, 2, '0', STR_PAD_LEFT).'/'.str_pad((string) $pgto_parcela, 2, '0', STR_PAD_LEFT), 
        'valor'              => $this->num_convert_decimal($this->cmd_valor_restante) / $pgto_parcela,
        'status'             => 'Em aberto',
        'dt_prevista'        => \Carbon\Carbon::parse($this->pgto_pri_vcto)->addDays($this->pgto_prazo / $pgto_parcela * $i)->format('Y-m-d'),
      ]);
      
      switch($this->forma_pagamento->destino)
      {
        case 'fin_recebimentos_cartoes':
          $pagamento->fjwlfkjalpdwepf()->create([
            'id_forma_pagamento' => $this->forma_pagamento->id,
            'vlr_real'           => $pagamento->valor,
            'prc_descontado'     => $this->forma_pagamento->taxa,
            'vlr_final'          => $pagamento->valor - ($this->forma_pagamento->taxa * $pagamento->valor / 100 ),
            'dt_prevista'        => $pagamento->dt_prevista,
            'status'             => 'Aguardando validação',
          ]);
          break;
        
        case 'fin_contas_internas':
          $pagamento->pqwnldkwjfencsb()->create([
            'fonte_origem'  => 'pdv_vendas_pagamentos', 
            'id_pessoa'     => $this->comanda->id_cliente, 
            'tipo'          => $this->pgto_forma, 
            'percentual'    => 1, 
            'valor'         => $pagamento->valor * -1, 
            'dt_prevista'   => $pagamento->dt_prevista, 
            'status'        => 'Em aberto', 
          ]);
          break;
      }
    }
        
    $this->reset(['opcoes_bandeiras', 'opcoes_parcelas', 'forma_pagamento', 'pgto_forma', 'pgto_bandeira', 'pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto', 'pgto_valor', 'pgto_proximo', 'cmd_valor_total', 'cmd_valor_pago']); 
    
    $this->calcular_valores();
    
    $this->dispatch('swal:alert', [
      'text'      => 'Pagamento concluído com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }

  public function deletar_pagamento($id, $created_at)
  {
    foreach($this->comanda->xzxfrjmgwpgsnta->where('created_at', '=', $created_at) as $pagamento)
    {
      if(isset($pagamento->fjwlfkjalpdwepf))
      {
        $pagamento->fjwlfkjalpdwepf->delete();
        $pagamento->delete();
      }
      
      if(isset($pagamento->pqwnldkwjfencsb))
      {
        $pagamento->pqwnldkwjfencsb->delete();
        $pagamento->delete();
      }    
    }

    $this->comanda->xzxfrjmgwpgsnta()->where('created_at', '=', $created_at)->delete();
    
    $this->reset(['opcoes_bandeiras', 'opcoes_parcelas', 'forma_pagamento', 'pgto_forma', 'pgto_bandeira', 'pgto_parcela', 'pgto_tipo', 'pgto_taxa', 'pgto_prazo', 'pgto_pri_vcto', 'pgto_valor', 'pgto_proximo', 'cmd_valor_total', 'cmd_valor_pago']); 
    
    $this->calcular_valores();

    $this->dispatch('swal:alert', [
      'title'     => 'Deletado!',
      'text'      => 'Pagamento(s) deletado(s) com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }

  // ========================================================================================================================================================================      CLIENTE

  public function cliente_selecionado( $id_cliente )
  {
    $this->adicionando      = [];
    $cliente                = DBPessoa::find($id_cliente);
    $this->feedback_cliente = 'Saldo em conta: R$ '.$this->num_convert_brasil($cliente->saldo_conta);
    
    $this->comanda->update([
      'id_cliente' => $id_cliente,
    ]);

    // if($this->comanda->snfbexhswnenrks->count() != 0
    $this->comanda->snfbexhswnenrks()->update([
      'id_pessoa' => $id_cliente,
    ]);

    if($this->possui_agendamentos($id_cliente))
    {
      $this->dispatch('swal:alert', [
        'text'      => 'Possui agendamentos!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
    }
    else
    {
      $this->dispatch('swal:alert', [
        'text'      => 'Não possui agendamentos!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
    }

    $this->dispatch('swal:alert', [
      'text'      => 'Venda atualizada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }

  public function possui_agendamentos( $id_cliente )
  {
    $this->agendamentos = DBAgendamento::whereBetween('start', [\Carbon\Carbon::today()->startOfDay(), \Carbon\Carbon::today()->endOfDay()])->where('id_cliente', '=', $id_cliente)->get();
    
    foreach($this->agendamentos as $agendamento)
    {
      $this->adicionando[$agendamento->id] = false;
      // $this->agendamentos[$agendamentos->id] = [
        // 'edit'          => false,
        // 'status'        => false,
      // ];
    }
    return $this->agendamentos->count() > 0;
  }

  public function possui_saldo( $id_cliente )
  {
    if( $id_cliente == 0 )
    {
      $this->feedback_cliente = 'Saldo em conta: R$ '.$this->num_convert_brasil(0);
    }
    else
    {
      $this->feedback_cliente = 'Saldo em conta: R$ '.$this->num_convert_brasil($this->comanda->lufqzahwwexkxli->saldo_conta);
    }
  }

  public function lancar_agendamento( $id_agendamento )
  {
    // verificar se contem adicionando algum (CONTAINS)
    if($this->adicionando[$id_agendamento] == false)
    {
      $this->adicionando[$id_agendamento] = true;
      
      $agendamento = DBAgendamento::find($id_agendamento);

      $this->id_pessoa = $agendamento->id_profexec;
      $this->id_agendamento = $agendamento->id;

      $this->servico_selecionado( $agendamento->id_servprod , true);
      $this->profissional_selecionado( $agendamento->id_profexec );
    }
    else
    {
      dump('Resolva o outro agendamento antes de incluir este');
    }
  }

  public function cancelar_agendamento( $id_agendamento )
  {
    $this->adicionando[$id_agendamento] = false;

    $this->reset(['id_servprod', 'quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'id_agendamento', 'percentual', 'valor']);
  }

  // ========================================================================================================================================================================      PRODUTOS E SERVIÇOS

  public function servico_selecionado( $id_servico , $adicionando=false )
  {
    $this->adicionando[array_search(true, $this->adicionando)] = $adicionando;
    
    $this->id_servprod = $id_servico;
    
    if( $id_servico != '' )
    {
      $this->reset(['quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'id_agendamento', 'percentual', 'valor']);
      
      $servico = DBServicoProduto::find($id_servico);
      $this->vlr_venda     = $this->num_convert_brasil($servico->vlr_venda);
      $this->vlr_negociado = $this->num_convert_brasil($servico->vlr_venda);
      $this->tipo_preco    = $servico->tipo_preco;
      
      $this->atualizar_valor_final();
      
      $this->profissionals = $servico->smenhgskqwmdjwe;
    }
    else
    {
      $this->reset(['id_servprod', 'quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'id_agendamento', 'percentual', 'valor']);
    }
  }

  public function adicionar_servprod()
  {
    $detalhe = $this->comanda->dfyejmfcrkolqjh()->create([
      'id_servprod'    => $this->id_servprod,
      'quantidade'     => $this->quantidade,
      'vlr_venda'      => $this->vlr_venda,
      'vlr_negociado'  => $this->vlr_negociado,
      'vlr_dsc_acr'    => $this->vlr_dsc_acr,
      'vlr_final'      => $this->vlr_final,
      'obs'            => $this->obs ?? null,                                             // incluir campo observação
      'status'         => 'Em aberto',
      'id_agendamento' => array_search(true, $this->adicionando) == 0 ? null : array_search(true, $this->adicionando),
    ]);

    $conta_interna = $detalhe->hgihnjekboyabez()->create([
      'fonte_origem' => 'pdv_vendas_detalhes',
      'id_pessoa'    => $this->id_pessoa,
      'tipo'         => 'Comissão Sob Valor Final',
      'dt_prevista'  => \Carbon\Carbon::now(),
      'percentual'   => $this->num_convert_decimal($this->percentual) / 100 ,
      'valor'        => $this->valor,
      'status'       => 'Em aberto',
    ]);

    if(array_search(true, $this->adicionando))
    {
      $this->adicionando[$detalhe->aklfgdfkofedsad->id] = false;
      
      $detalhe->aklfgdfkofedsad()->update([
        'id_comanda'       => $this->comanda->id,
        'valor'            => $detalhe->vlr_final,
        'status'           => 'Finalizado',
        'id_venda_detalhe' => $detalhe->id,
        'prc_comissao'     => $conta_interna->percentual,
        'vlr_comissao'     => $conta_interna->valor,
      ]);
    }

    $this->pgto_valor = $this->comanda->dfyejmfcrkolqjh->sum('vlr_final');

    $this->reset(['id_servprod', 'quantidade', 'tipo_preco', 'vlr_venda', 'vlr_negociado', 'vlr_dsc_acr', 'vlr_final', 'profissionals', 'id_pessoa', 'id_agendamento', 'percentual', 'valor']);
    
    $this->calcular_valores();

    $this->dispatch('swal:alert', [
      'title'     => 'Adicionado!',
      'text'      => 'Item adiconado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }

  public function atualizar_comissao( $tipo_comissao )
  {
    switch ($this->tipo_comissao)
    {          
      case 'Comissão Sob Valor Final':
        $this->tipo_comissao = 'Comissão Sob Valor Tabelado';
        $this->percentual    = number_format($this->num_convert_decimal($this->comissao_padrao), 1, ',', '.');
        $this->valor         = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * ( $this->num_convert_decimal($this->vlr_negociado) * $this->num_convert_decimal($this->quantidade) ));
        break;
        
      case 'Comissão Sob Valor Tabelado':
        $this->tipo_comissao = 'Comissão Zerada';
        $this->percentual    = number_format(0, 1, ',', '.');
        $this->valor         = $this->num_convert_brasil(0);
        break;
        
      case 'Comissão Zerada':
        $this->tipo_comissao = 'Comissão Manual';
        $this->percentual    = number_format($this->num_convert_decimal($this->comissao_padrao), 1, ',', '.');
        $this->valor         = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
        break;
        
      case 'Comissão Manual':
        $this->tipo_comissao = 'Comissão Sob Valor Final';
        $this->percentual    = number_format($this->num_convert_decimal($this->comissao_padrao), 1, ',', '.');
        $this->valor         = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
        break;
    }
  }

  public function atualizar_valor_final()
  {
    $vlr_final = ( $this->num_convert_decimal($this->vlr_negociado) + $this->num_convert_decimal($this->vlr_dsc_acr) ) * $this->quantidade;
    
    $this->vlr_final = $this->num_convert_brasil($vlr_final);
    $this->valor     = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
  }
  
  public function profissional_selecionado( $id_pessoa )
  {
    $this->id_pessoa       = $id_pessoa;

    $profissional          = DBPessoa::find($id_pessoa);
    $colabserv             = $profissional->aeahvtsijjoprlc->where('id_servprod', $this->id_servprod)->first();

    $this->percentual      = number_format($colabserv->prc_comissao * 100, 1, ',', '.');
    $this->comissao_padrao = number_format($colabserv->prc_comissao * 100, 1, ',', '.');
    $this->valor           = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
  }

  public function deletar_detalhe( $id )
  {
    if($this->comanda->dfyejmfcrkolqjh->where('id', '=', $id)->first()->aklfgdfkofedsad != null)
    {
      $this->comanda->dfyejmfcrkolqjh()->where('id', '=', $id)->first()->aklfgdfkofedsad()->update([
        'id_comanda'       => null,
        'valor'            => null,
        'status'           => 'Confirmado',
        'id_venda_detalhe' => null,
        'prc_comissao'     => null,
        'vlr_comissao'     => null,
      ]);
    }

    $this->comanda->dfyejmfcrkolqjh()->where('id', '=', $id)->first()->delete();
    
    $this->calcular_valores();

    $this->dispatch('swal:alert', [
      'title'     => 'Deletado!',
      'text'      => 'Item deletado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }
  
  public function updatedPercentual()
  {
    $this->percentual = number_format($this->num_convert_decimal($this->percentual), 1, ',', '.');
    $this->valor      = $this->num_convert_brasil($this->num_convert_decimal($this->percentual) / 100 * $this->num_convert_decimal($this->vlr_final));
  }
  
  public function updatedValor()
  {
    $this->percentual = number_format($this->num_convert_decimal($this->valor) /  $this->num_convert_decimal($this->vlr_final) * 100, 1, ',', '.');
    $this->valor      = $this->num_convert_brasil($this->num_convert_decimal($this->valor));
  }
  
  // ========================================================================================================================================================================      PRODUTOS E SERVIÇOS
  public function calcular_valores()
  {
    $this->opcoes_formas      = DBFormaPagamento::where('local', '=', 'venda')->orWhere('local', '=', 'ambos')->orderBy('forma', 'asc')->distinct()->get(['forma']);
    
    $this->cmd_valor_total    = $this->num_convert_brasil($this->comanda->dfyejmfcrkolqjh->sum('vlr_final'));
    $this->cmd_valor_pago     = $this->num_convert_brasil($this->comanda->xzxfrjmgwpgsnta->sum('valor'));
    $this->cmd_valor_restante = $this->num_convert_brasil($this->num_convert_decimal($this->cmd_valor_total) - $this->num_convert_decimal($this->cmd_valor_pago));
    $this->pgto_valor         = $this->num_convert_brasil($this->num_convert_decimal($this->cmd_valor_total) - $this->num_convert_decimal($this->cmd_valor_pago));

    if( $this->comanda->status != 'Finalizada' && $this->cmd_valor_restante == '0' && $this->cmd_valor_total != '0')
    {
      $this->comanda_finalizada = true;
    }
    else
    {
      $this->comanda_finalizada = false;
    }
  }

  public function num_convert_decimal( $valor )
  {
    return str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $valor)));
  }

  public function num_convert_brasil( $valor )
  {
    return number_format($valor, 2, ',', '.');
  }

  public function continuar_lancando($resp)
  {


    
    if($resp)
    {
      $this->comanda->update([
        'qtd_produtos'  => $this->comanda->dfyejmfcrkolqjh->count(),
        'vlr_prod_serv' => $this->comanda->dfyejmfcrkolqjh->sum('vlr_venda'),
        'vlr_negociado' => $this->comanda->dfyejmfcrkolqjh->sum('vlr_negociado'),
        'vlr_dsc_acr'   => $this->comanda->dfyejmfcrkolqjh->sum('vlr_final') - $this->comanda->dfyejmfcrkolqjh->sum('vlr_negociado'),
        'vlr_final'     => $this->comanda->dfyejmfcrkolqjh->sum('vlr_final'),
        'status'        => 'Finalizada',
      ]);
      
      $this->comanda->dfyejmfcrkolqjh()->update([
        'status'        => 'Finalizada',  
      ]);

      $this->comanda->xzxfrjmgwpgsnta()->update([
        'status'        => 'Finalizada',  
      ]);

      $this->dispatch('swal:alert', [
        'text'      => 'Comanda finalizada com sucesso!',
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
    return view('livewire/pdv/comanda/comanda-editar')->layout('layouts/bootstrap');
  }
}
