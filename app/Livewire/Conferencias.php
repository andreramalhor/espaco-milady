<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\ACL\Funcao;
use App\Models\ACL\FuncaoPessoa;
use App\Models\ACL\Permissao;
use App\Models\ACL\PermissaoFuncao;
use App\Models\ACL\PermissaoPessoa;
use App\Models\Agendamento\Comissao;
use App\Models\Agendamento\Ordem;
use App\Models\Atendimento\Agendamento;
use App\Models\Atendimento\Pessoa;
use App\Models\Configuracao\ColaboradorServico;
use App\Models\Contabilidade\ContaContabil;
use App\Models\Financeiro\ContaInterna;
use App\Models\Financeiro\Lancamento;
use App\Models\PDV\Caixa;
use App\Models\PDV\Comanda;
use App\Models\PDV\ComandaDetalhe;
use App\Models\PDV\ComandaPagamento;

use App\Models\extras\aaa_conta_contabeis;


class Conferencias extends Component
{
  public $tabela_analisada;
  public $tabela;
  public $comissoes;
  public $contas_interna;

  public function pivots($tabela)
  {
    $this->reset(['tabela_analisada']);
    
    switch ($tabela)
    {
      case 'aaa_conta_contabeis':
        $this->tabela_analisada = aaa_conta_contabeis::get();
        $this->tabela           = $tabela;
        break;
      case 'acl_funcoes':
        $this->tabela_analisada = Funcao::get();
        $this->tabela           = $tabela;
        break;

      case 'acl_funcoes_pessoas':
        $this->tabela_analisada = FuncaoPessoa::orderBy('id_pessoa')->orderBy('id_funcao')->get();
        $this->tabela           = $tabela;
        break;

      case 'acl_permissoes':
        $this->tabela_analisada = Permissao::get();
        $this->tabela           = $tabela;
        break;

      case 'acl_permissoes_funcoes':
        $this->tabela_analisada = PermissaoFuncao::orderBy('id_funcao')->orderBy('id_permissao')->get();
        $this->tabela           = $tabela;
        break;
        
      case 'acl_permissoes_pessoas':
        $this->tabela_analisada = PermissaoPessoa::orderBy('id_pessoa')->orderBy('id_permissao')->get();
        $this->tabela           = $tabela;
        break;

      case 'agd_comissoes':
        $this->tabela_analisada = Comissao::get();
        $this->tabela           = $tabela;
        break;

      case 'agd_ordem':
        $this->tabela_analisada = Ordem::orderBy('auth_user', 'asc')->orderBy('nome_ordem', 'asc')->orderBy('ordem', 'asc')->get();
        $this->tabela           = $tabela;
        break;

      case 'atd_agendamentos':
        $this->tabela_analisada = Agendamento::limit(10)->get();
        $this->tabela           = $tabela;
        break;

      case 'atd_pessoas':
        $this->tabela_analisada = Pessoa::orderBy('id', 'asc')->limit(5)->get();
        $this->tabela           = $tabela;
        break;

      case 'atd_pessoas_contatos':
        dump(123, 'atd_pessoas_contatos');
        $this->tabela_analisada = \DB::table('atd_pessoas_contatos')->get();
        $this->tabela           = 'atd_pessoas_contatos';
        break;

      case 'atd_pessoas_enderecos':
        dump(123, 'atd_pessoas_enderecos');
        $this->tabela_analisada = \DB::table('atd_pessoas_enderecos')->get();
        $this->tabela           = 'atd_pessoas_enderecos';
        break;

      case 'cat_categorias':
        dump(123, 'cat_categorias');
        $this->tabela_analisada = \DB::table('cat_categorias')->get();
        $this->tabela           = 'cat_categorias';
        break;

      case 'cat_entradas':
        dump(123, 'cat_entradas');
        $this->tabela_analisada = \DB::table('cat_entradas')->get();
        $this->tabela           = 'cat_entradas';
        break;

      case 'cat_entradas_detalhes':
        dump(123, 'cat_entradas_detalhes');
        $this->tabela_analisada = \DB::table('cat_entradas_detalhes')->get();
        $this->tabela           = 'cat_entradas_detalhes';
        break;

      case 'cat_entradas_pagamentos':
        dump(123, 'cat_entradas_pagamentos');
        $this->tabela_analisada = \DB::table('cat_entradas_pagamentos')->get();
        $this->tabela           = 'cat_entradas_pagamentos';
        break;

      case 'cat_produtos_servicos':
        dump(123, 'cat_produtos_servicos');
        $this->tabela_analisada = \DB::table('cat_produtos_servicos')->get();
        $this->tabela           = 'cat_produtos_servicos';
        break;

      case 'cfg_dados_empresa':
        dump(123, 'cfg_dados_empresa');
        $this->tabela_analisada = \DB::table('cfg_dados_empresa')->get();
        $this->tabela           = 'cfg_dados_empresa';
        break;

      case 'cfg_mensages':
        dump(123, 'cfg_mensages');
        $this->tabela_analisada = \DB::table('cfg_mensages')->get();
        $this->tabela           = 'cfg_mensages';
        break;

      case 'cfg_tipos_de_pessoas':
        dump(123, 'cfg_tipos_de_pessoas');
        $this->tabela_analisada = \DB::table('cfg_tipos_de_pessoas')->get();
        $this->tabela           = 'cfg_tipos_de_pessoas';
        break;

      case 'cnf_agenda':
        dump(123, 'cnf_agenda');
        $this->tabela_analisada = \DB::table('cnf_agenda')->get();
        $this->tabela           = 'cnf_agenda';
        break;

      case 'cnf_colaborador_servico':
        $this->tabela_analisada = ColaboradorServico::orderBy('id_profexec')->orderBy('id_servprod')->get();
        $this->tabela           = $tabela;
        break;

      case 'cnf_fornecedor_produto':
        dump(123, 'cnf_fornecedor_produto');
        $this->tabela_analisada = \DB::table('cnf_fornecedor_produto')->get();
        $this->tabela           = 'cnf_fornecedor_produto';
        break;

      case 'com_contratos':
        dump(123, 'com_contratos');
        $this->tabela_analisada = \DB::table('com_contratos')->get();
        $this->tabela           = 'com_contratos';
        break;

      case 'com_leads':
        dump(123, 'com_leads');
        $this->tabela_analisada = \DB::table('com_leads')->get();
        $this->tabela           = 'com_leads';
        break;

      case 'com_leads_conversas':
        dump(123, 'com_leads_conversas');
        $this->tabela_analisada = \DB::table('com_leads_conversas')->get();
        $this->tabela           = 'com_leads_conversas';
        break;

      case 'com_leads_turmas':
        dump(123, 'com_leads_turmas');
        $this->tabela_analisada = \DB::table('com_leads_turmas')->get();
        $this->tabela           = 'com_leads_turmas';
        break;

      case 'com_vendas':
        dump(123, 'com_vendas');
        $this->tabela_analisada = \DB::table('com_vendas')->get();
        $this->tabela           = 'com_vendas';
        break;

      case 'con_plano_contas':
        $this->tabela_analisada = ContaContabil::get()->sortBy('nova_conta');
        $this->tabela           = $tabela;
        break;

      case 'con_plano_contas3':
        dump(123, 'con_plano_contas3');
        $this->tabela_analisada = \DB::table('con_plano_contas3')->get();
        $this->tabela           = 'con_plano_contas3';
        break;

      case 'emp_estoque':
        dump(123, 'emp_estoque');
        $this->tabela_analisada = \DB::table('emp_estoque')->get();
        $this->tabela           = 'emp_estoque';
        break;

      case 'emp_inventarios':
        dump(123, 'emp_inventarios');
        $this->tabela_analisada = \DB::table('emp_inventarios')->get();
        $this->tabela           = 'emp_inventarios';
        break;

      case 'est_saidas':
        dump(123, 'est_saidas');
        $this->tabela_analisada = \DB::table('est_saidas')->get();
        $this->tabela           = 'est_saidas';
        break;

      case 'est_saidas_detalhes':
        dump(123, 'est_saidas_detalhes');
        $this->tabela_analisada = \DB::table('est_saidas_detalhes')->get();
        $this->tabela           = 'est_saidas_detalhes';
        break;

      case 'failed_jobs':
        dump(123, 'failed_jobs');
        $this->tabela_analisada = \DB::table('failed_jobs')->get();
        $this->tabela           = 'failed_jobs';
        break;

      case 'fer_kanban':
        dump(123, 'fer_kanban');
        $this->tabela_analisada = \DB::table('fer_kanban')->get();
        $this->tabela           = 'fer_kanban';
        break;

      case 'fin_a_receber':
        dump(123, 'fin_a_receber');
        $this->tabela_analisada = \DB::table('fin_a_receber')->get();
        $this->tabela           = 'fin_a_receber';
        break;

      case 'fin_a_receber2':
        dump(123, 'fin_a_receber2');
        $this->tabela_analisada = \DB::table('fin_a_receber2')->get();
        $this->tabela           = 'fin_a_receber2';
        break;

      case 'fin_bancos':
        dump(123, 'fin_bancos');
        $this->tabela_analisada = \DB::table('fin_bancos')->get();
        $this->tabela           = 'fin_bancos';
        break;

      case 'fin_compras':
        dump(123, 'fin_compras');
        $this->tabela_analisada = \DB::table('fin_compras')->get();
        $this->tabela           = 'fin_compras';
        break;

      case 'fin_compras_detalhes':
        dump(123, 'fin_compras_detalhes');
        $this->tabela_analisada = \DB::table('fin_compras_detalhes')->get();
        $this->tabela           = 'fin_compras_detalhes';
        break;

      case 'fin_compras_pagamentos':
        dump(123, 'fin_compras_pagamentos');
        $this->tabela_analisada = \DB::table('fin_compras_pagamentos')->get();
        $this->tabela           = 'fin_compras_pagamentos';
        break;

      case 'fin_contas_internas':
        $this->tabela_analisada = ContaInterna::orderBy('id', 'desc')->get();
        $this->tabela           = $tabela;
        break;

      case 'fin_dividas':
        dump(123, 'fin_dividas');
        $this->tabela_analisada = \DB::table('fin_dividas')->get();
        $this->tabela           = 'fin_dividas';
        break;

      case 'fin_lancamentos':
        dump(123, 'fin_lancamentos');
        $this->tabela_analisada = \DB::table('fin_lancamentos')->get();
        $this->tabela           = 'fin_lancamentos';
        break;

      case 'fin_lancamentos-comissoes':
        $this->tabela_analisada = Lancamento::where('origem', '=', 'fin_conta_interna')->orderBy('id', 'desc')->limit(1000)->get();
        $this->tabela           = $tabela;
        break;

      case 'fin_orcamentos':
        dump(123, 'fin_orcamentos');
        $this->tabela_analisada = \DB::table('fin_orcamentos')->get();
        $this->tabela           = 'fin_orcamentos';
        break;

      case 'fin_recebimentos_cartoes':
        dump(123, 'fin_recebimentos_cartoes');
        $this->tabela_analisada = \DB::table('fin_recebimentos_cartoes')->get();
        $this->tabela           = 'fin_recebimentos_cartoes';
        break;

      case 'frm_contatos':
        dump(123, 'frm_contatos');
        $this->tabela_analisada = \DB::table('frm_contatos')->get();
        $this->tabela           = 'frm_contatos';
        break;

      case 'frm_erros':
        dump(123, 'frm_erros');
        $this->tabela_analisada = \DB::table('frm_erros')->get();
        $this->tabela           = 'frm_erros';
        break;

      case 'ger_empresa':
        dump(123, 'ger_empresa');
        $this->tabela_analisada = \DB::table('ger_empresa')->get();
        $this->tabela           = 'ger_empresa';
        break;

      case 'ger_formas_pagamentos':
        dump(123, 'ger_formas_pagamentos');
        $this->tabela_analisada = \DB::table('ger_formas_pagamentos')->get();
        $this->tabela           = 'ger_formas_pagamentos';
        break;

      case 'migrations':
        dump(123, 'migrations');
        $this->tabela_analisada = \DB::table('migrations')->get();
        $this->tabela           = 'migrations';
        break;

      case 'org_eventos':
        dump(123, 'org_eventos');
        $this->tabela_analisada = \DB::table('org_eventos')->get();
        $this->tabela           = 'org_eventos';
        break;

      case 'password_resets':
        dump(123, 'password_resets');
        $this->tabela_analisada = \DB::table('password_resets')->get();
        $this->tabela           = 'password_resets';
        break;

      case 'password_reset_tokens':
        dump(123, 'password_reset_tokens');
        $this->tabela_analisada = \DB::table('password_reset_tokens')->get();
        $this->tabela           = 'password_reset_tokens';
        break;

      case 'pdv_caixas':
        $this->tabela_analisada = Caixa::orderBy('id', 'desc')->limit(10)->get();
        $this->tabela           = $tabela;
        break;

      case 'pdv_vendas':
        $this->tabela_analisada = Comanda::orderBy('id', 'desc')->limit(10)->get();
        $this->tabela           = $tabela;
        break;

      case 'pdv_vendas_detalhes':
        $this->tabela_analisada = ComandaDetalhe::orderBy('id', 'desc')->limit(100)->get();
        $this->tabela           = $tabela;
        break;

      case 'pdv_vendas_pagamentos':
        $this->tabela_analisada = ComandaPagamento::
                                                  orderBy('id', 'desc')->
                                                  where('created_at', '>=', \Carbon\Carbon::parse('2025-01-01 00:00:00'))->
                                                  with(['yshghlsawerrgvd', 'qmbnkthuczqdsdn', 'pqwnldkwjfencsb', 'fjwlfkjalpdwepf', 'kfwejkahdwqbsal'])->
                                                  get();
        $this->tabela           = $tabela;
        break;

      case 'ped_cursos':
        dump(123, 'ped_cursos');
        $this->tabela_analisada = \DB::table('ped_cursos')->get();
        $this->tabela           = 'ped_cursos';
        break;

      case 'ped_modulos':
        dump(123, 'ped_modulos');
        $this->tabela_analisada = \DB::table('ped_modulos')->get();
        $this->tabela           = 'ped_modulos';
        break;

      case 'ped_turmas':
        dump(123, 'ped_turmas');
        $this->tabela_analisada = \DB::table('ped_turmas')->get();
        $this->tabela           = 'ped_turmas';
        break;

      case 'personal_access_tokens':
        dump(123, 'personal_access_tokens');
        $this->tabela_analisada = \DB::table('personal_access_tokens')->get();
        $this->tabela           = 'personal_access_tokens';
        break;

      case 'sessions':
        dump(123, 'sessions');
        $this->tabela_analisada = \DB::table('sessions')->get();
        $this->tabela           = 'sessions';
        break;

      case 'x_acl_cargos_pessoas':
        dump(123, 'x_acl_cargos_pessoas');
        $this->tabela_analisada = \DB::table('x_acl_cargos_pessoas')->get();
        $this->tabela           = 'x_acl_cargos_pessoas';
        break;

      case 'x_acl_permissoes_cargos':
        dump(123, 'x_acl_permissoes_cargos');
        $this->tabela_analisada = \DB::table('x_acl_permissoes_cargos')->get();
        $this->tabela           = 'x_acl_permissoes_cargos';
        break;

      case 'x_atd_pessoas_tipos':
        dump(123, 'x_atd_pessoas_tipos');
        $this->tabela_analisada = \DB::table('x_atd_pessoas_tipos')->get();
        $this->tabela           = 'x_atd_pessoas_tipos';
        break;

      case 'x_pdv_lancamentos_pagamentos':
        dump(123, 'x_pdv_lancamentos_pagamentos');
        $this->tabela_analisada = \DB::table('x_pdv_lancamentos_pagamentos')->get();
        $this->tabela           = 'x_pdv_lancamentos_pagamentos';
        break;
        
      default:
        dd('erro aqui');
        break;

    }
  }
  
  
  
  
  
  // ==================================================================================================
  
  
  public function excluiresse($id)
  {
    Ordem::find($id)->delete();
  }


  // ==================================================================================================
  public function render()
  {
    $tabela_analisada = \DB::table('acl_funcoes_pessoas')->get();

    return view('livewire.conferencias.___index', [
      'tabela_analisada' => $tabela_analisada,
    ])->layout('layouts/bootstrap');
  }
}
