<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="overlay d-none" wire:loading.class.remove="d-none"><i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
            <div class="card-header">
                <h3 class="card-title">Conferências</h3>
            </div>
            <div class="card-body">
                <div class="row p-0">
                    <div class="card-body p-0">
<!-- ============================================================================================================================================================================================================================================================================== -->
                        <a class="btn btn-app {{ $tabela == 'aaa_conta_contabeis' ? 'bg-secondary' : '' }}" wire:click="pivots('aaa_conta_contabeis')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> aaa_conta_contabeis
                        </a>
                        <a class="btn btn-app {{ $tabela == 'acl_funcoes' ? 'bg-secondary' : '' }}" wire:click="pivots('acl_funcoes')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> acl_funcoess
                        </a>
                        <a class="btn btn-app {{ $tabela == 'acl_funcoes_pessoas' ? 'bg-secondary' : '' }}" wire:click="pivots('acl_funcoes_pessoas')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> acl_funcoes_pessoas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'acl_permissoes' ? 'bg-secondary' : '' }}" wire:click="pivots('acl_permissoes')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> acl_permissoes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'acl_permissoes_funcoes' ? 'bg-secondary' : '' }}" wire:click="pivots('acl_permissoes_funcoes')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> acl_permissoes_funcoes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'acl_permissoes_pessoas' ? 'bg-secondary' : '' }}" wire:click="pivots('acl_permissoes_pessoas')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> acl_permissoes_pessoas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'agd_comissoes' ? 'bg-secondary' : '' }}" wire:click="pivots('agd_comissoes')">
                            <span class="badge bg-info">OK</span><i class="fas fa-bullhorn"></i> agd_comissoes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'agd_ordem' ? 'bg-secondary' : '' }}" wire:click="pivots('agd_ordem')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> agd_ordem
                        </a>
                        <a class="btn btn-app {{ $tabela == 'atd_agendamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('atd_agendamentos')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> atd_agendamentos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'atd_pessoas' ? 'bg-secondary' : '' }}" wire:click="pivots('atd_pessoas')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> atd_pessoass
                        </a>
                        <a class="btn btn-app {{ $tabela == 'atd_pessoas_contatos' ? 'bg-secondary' : '' }}" wire:click="pivots('atd_pessoas_contatos')">
                            <span class="badge bg-warning">OK</span><i class="fas fa-bullhorn"></i> atd_pessoas_contatos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'atd_pessoas_enderecos' ? 'bg-secondary' : '' }}" wire:click="pivots('atd_pessoas_enderecos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> atd_pessoas_enderecos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cat_categorias' ? 'bg-secondary' : '' }}" wire:click="pivots('cat_categorias')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cat_categorias
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cat_entradas' ? 'bg-secondary' : '' }}" wire:click="pivots('cat_entradas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cat_entradas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cat_entradas_detalhes' ? 'bg-secondary' : '' }}" wire:click="pivots('cat_entradas_detalhes')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cat_entradas_detalhes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cat_entradas_pagamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('cat_entradas_pagamentos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cat_entradas_pagamentos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cat_produtos_servicos' ? 'bg-secondary' : '' }}" wire:click="pivots('cat_produtos_servicos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cat_produtos_servicos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cfg_dados_empresa' ? 'bg-secondary' : '' }}" wire:click="pivots('cfg_dados_empresa')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cfg_dados_empresa
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cfg_mensages' ? 'bg-secondary' : '' }}" wire:click="pivots('cfg_mensages')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cfg_mensages
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cfg_tipos_de_pessoas' ? 'bg-secondary' : '' }}" wire:click="pivots('cfg_tipos_de_pessoas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cfg_tipos_de_pessoas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cnf_agenda' ? 'bg-secondary' : '' }}" wire:click="pivots('cnf_agenda')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cnf_agendaas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cnf_colaborador_servico' ? 'bg-secondary' : '' }}" wire:click="pivots('cnf_colaborador_servico')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> cnf_colaborador_servico
                        </a>
                        <a class="btn btn-app {{ $tabela == 'cnf_fornecedor_produto' ? 'bg-secondary' : '' }}" wire:click="pivots('cnf_fornecedor_produto')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> cnf_fornecedor_produto
                        </a>
                        <a class="btn btn-app {{ $tabela == 'com_contratos' ? 'bg-secondary' : '' }}" wire:click="pivots('com_contratos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> com_contratos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'com_leads' ? 'bg-secondary' : '' }}" wire:click="pivots('com_leads')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> com_leadsnas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'com_leads_conversas' ? 'bg-secondary' : '' }}" wire:click="pivots('com_leads_conversas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> com_leads_conversas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'com_leads_turmas' ? 'bg-secondary' : '' }}" wire:click="pivots('com_leads_turmas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> com_leads_turmas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'com_vendas' ? 'bg-secondary' : '' }}" wire:click="pivots('com_vendas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> com_vendasas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'con_plano_contas' ? 'bg-secondary' : '' }}" wire:click="pivots('con_plano_contas')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> con_plano_contas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'con_plano_contas3' ? 'bg-secondary' : '' }}" wire:click="pivots('con_plano_contas3')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> con_plano_contas3
                        </a>
                        <a class="btn btn-app {{ $tabela == 'emp_estoque' ? 'bg-secondary' : '' }}" wire:click="pivots('emp_estoque')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> emp_estoques
                        </a>
                        <a class="btn btn-app {{ $tabela == 'emp_inventarios' ? 'bg-secondary' : '' }}" wire:click="pivots('emp_inventarios')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> emp_inventarios
                        </a>
                        <a class="btn btn-app {{ $tabela == 'est_saidas' ? 'bg-secondary' : '' }}" wire:click="pivots('est_saidas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> est_saidasas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'est_saidas_detalhes' ? 'bg-secondary' : '' }}" wire:click="pivots('est_saidas_detalhes')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> est_saidas_detalhes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'failed_jobs' ? 'bg-secondary' : '' }}" wire:click="pivots('failed_jobs')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> failed_jobss
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fer_kanban' ? 'bg-secondary' : '' }}" wire:click="pivots('fer_kanban')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fer_kanbanas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_a_receber' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_a_receber')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_a_receber
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_a_receber2' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_a_receber2')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_a_receber2
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_bancos' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_bancos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_bancosas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_compras' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_compras')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_comprass
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_compras_detalhes' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_compras_detalhes')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_compras_detalhes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_compras_pagamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_compras_pagamentos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_compras_pagamentos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_contas_internas' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_contas_internas')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> fin_contas_internas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_dividas' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_dividas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_dividass
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_lancamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_lancamentos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_lancamentos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_lancamentos-comissoes' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_lancamentos-comissoes')">
                            <span class="badge bg-warning">OK</span><i class="fas fa-bullhorn"></i> fin_lancamentos-comissoes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_orcamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_orcamentos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_orcamentos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'fin_recebimentos_cartoes' ? 'bg-secondary' : '' }}" wire:click="pivots('fin_recebimentos_cartoes')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> fin_recebimentos_cartoes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'frm_contatos' ? 'bg-secondary' : '' }}" wire:click="pivots('frm_contatos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> frm_contatos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'frm_erros' ? 'bg-secondary' : '' }}" wire:click="pivots('frm_erros')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> frm_errosnas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'ger_empresa' ? 'bg-secondary' : '' }}" wire:click="pivots('ger_empresa')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> ger_empresas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'ger_formas_pagamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('ger_formas_pagamentos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> ger_formas_pagamentos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'migrations' ? 'bg-secondary' : '' }}" wire:click="pivots('migrations')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> migrationsas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'org_eventos' ? 'bg-secondary' : '' }}" wire:click="pivots('org_eventos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> org_eventoss
                        </a>
                        <a class="btn btn-app {{ $tabela == 'password_resets' ? 'bg-secondary' : '' }}" wire:click="pivots('password_resets')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> password_resets
                        </a>
                        <a class="btn btn-app {{ $tabela == 'password_reset_tokens' ? 'bg-secondary' : '' }}" wire:click="pivots('password_reset_tokens')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> password_reset_tokens
                        </a>
                        <a class="btn btn-app {{ $tabela == 'pdv_caixas' ? 'bg-secondary' : '' }}" wire:click="pivots('pdv_caixas')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> pdv_caixas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'pdv_vendas' ? 'bg-secondary' : '' }}" wire:click="pivots('pdv_vendas')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> pdv_vendas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'pdv_vendas_detalhes' ? 'bg-secondary' : '' }}" wire:click="pivots('pdv_vendas_detalhes')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> pdv_vendas_detalhes
                        </a>
                        <a class="btn btn-app {{ $tabela == 'pdv_vendas_pagamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('pdv_vendas_pagamentos')">
                            <span class="badge bg-success">OK</span><i class="fas fa-bullhorn"></i> pdv_vendas_pagamentos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'ped_cursos' ? 'bg-secondary' : '' }}" wire:click="pivots('ped_cursos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> ped_cursosas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'ped_modulos' ? 'bg-secondary' : '' }}" wire:click="pivots('ped_modulos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> ped_moduloss
                        </a>
                        <a class="btn btn-app {{ $tabela == 'ped_turmas' ? 'bg-secondary' : '' }}" wire:click="pivots('ped_turmas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> ped_turmasas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'personal_access_tokens' ? 'bg-secondary' : '' }}" wire:click="pivots('personal_access_tokens')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> personal_access_tokens
                        </a>
                        <a class="btn btn-app {{ $tabela == 'sessions' ? 'bg-secondary' : '' }}" wire:click="pivots('sessions')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> sessionsrnas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'x_acl_cargos_pessoas' ? 'bg-secondary' : '' }}" wire:click="pivots('x_acl_cargos_pessoas')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> x_acl_cargos_pessoas
                        </a>
                        <a class="btn btn-app {{ $tabela == 'x_acl_permissoes_cargos' ? 'bg-secondary' : '' }}" wire:click="pivots('x_acl_permissoes_cargos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> x_acl_permissoes_cargos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'x_atd_pessoas_tipos' ? 'bg-secondary' : '' }}" wire:click="pivots('x_atd_pessoas_tipos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> x_atd_pessoas_tipos
                        </a>
                        <a class="btn btn-app {{ $tabela == 'x_pdv_lancamentos_pagamentos' ? 'bg-secondary' : '' }}" wire:click="pivots('x_pdv_lancamentos_pagamentos')">
                            <span class="badge bg-danger">OK</span><i class="fas fa-bullhorn"></i> x_pdv_lancamentos_pagamentos
                        </a>
                    </div>
                </div>
                
                <hr>
                {{ $tabela }}

                @if(!is_null($comissoes))
                    @include('livewire.conferencias.comissoes')
                @endif

                @if(!is_null($contas_interna))
                    @include('livewire.conferencias.contas_interna')
                @endif






<!-- ============================================================================================================================================================================================================================================================================== -->

                @if($tabela == "aaa_conta_contabeis")
                    @include('livewire.conferencias.aaa_conta_contabeis')
                @endif
                @if($tabela == "acl_funcoes")
                    @include('livewire.conferencias.acl_funcoes')
                @endif
                @if($tabela == "acl_funcoes_pessoas")
                    @include('livewire.conferencias.acl_funcoes_pessoas')
                @endif
                @if($tabela == "acl_permissoes")
                    @include('livewire.conferencias.acl_permissoes')
                @endif
                @if($tabela == "acl_permissoes_funcoes")
                    @include('livewire.conferencias.acl_permissoes_funcoes')
                @endif
                @if($tabela == "acl_permissoes_pessoas")
                    @include('livewire.conferencias.acl_permissoes_pessoas')
                @endif
                @if($tabela == "agd_comissoes")
                    @include('livewire.conferencias.agd_comissoes')
                @endif
                @if($tabela == "agd_ordem")
                    @include('livewire.conferencias.agd_ordem')
                @endif
                @if($tabela == "atd_agendamentos")
                    @include('livewire.conferencias.atd_agendamentos')
                @endif
                @if($tabela == "atd_pessoas")
                    @include('livewire.conferencias.atd_pessoas')
                @endif
                @if($tabela == "atd_pessoas_contatos")
                    @include('livewire.conferencias.atd_pessoas_contatos')
                @endif
                @if($tabela == "atd_pessoas_enderecos")
                    @include('livewire.conferencias.atd_pessoas_enderecos')
                @endif
                @if($tabela == "cat_categorias")
                    @include('livewire.conferencias.cat_categorias')
                @endif
                @if($tabela == "cat_entradas")
                    @include('livewire.conferencias.cat_entradas')
                @endif
                @if($tabela == "cat_entradas_detalhes")
                    @include('livewire.conferencias.cat_entradas_detalhes')
                @endif
                @if($tabela == "cat_entradas_pagamentos")
                    @include('livewire.conferencias.cat_entradas_pagamentos')
                @endif
                @if($tabela == "cat_produtos_servicos")
                    @include('livewire.conferencias.cat_produtos_servicos')
                @endif
                @if($tabela == "cfg_dados_empresa")
                    @include('livewire.conferencias.cfg_dados_empresa')
                @endif
                @if($tabela == "cfg_mensages")
                    @include('livewire.conferencias.cfg_mensages')
                @endif
                @if($tabela == "cfg_tipos_de_pessoas")
                    @include('livewire.conferencias.cfg_tipos_de_pessoas')
                @endif
                @if($tabela == "cnf_agenda")
                    @include('livewire.conferencias.cnf_agenda')
                @endif
                @if($tabela == "cnf_colaborador_servico")
                    @include('livewire.conferencias.cnf_colaborador_servico')
                @endif
                @if($tabela == "cnf_fornecedor_produto")
                    @include('livewire.conferencias.cnf_fornecedor_produto')
                @endif
                @if($tabela == "com_contratos")
                    @include('livewire.conferencias.com_contratos')
                @endif
                @if($tabela == "com_leads")
                    @include('livewire.conferencias.com_leads')
                @endif
                @if($tabela == "com_leads_conversas")
                    @include('livewire.conferencias.com_leads_conversas')
                @endif
                @if($tabela == "com_leads_turmas")
                    @include('livewire.conferencias.com_leads_turmas')
                @endif
                @if($tabela == "com_vendas")
                    @include('livewire.conferencias.com_vendas')
                @endif
                @if($tabela == "con_plano_contas")
                    @include('livewire.conferencias.con_plano_contas')
                @endif
                @if($tabela == "con_plano_contas3")
                    @include('livewire.conferencias.con_plano_contas3')
                @endif
                @if($tabela == "emp_estoque")
                    @include('livewire.conferencias.emp_estoque')
                @endif
                @if($tabela == "emp_inventarios")
                    @include('livewire.conferencias.emp_inventarios')
                @endif
                @if($tabela == "est_saidas")
                    @include('livewire.conferencias.est_saidas')
                @endif
                @if($tabela == "est_saidas_detalhes")
                    @include('livewire.conferencias.est_saidas_detalhes')
                @endif
                @if($tabela == "failed_jobs")
                    @include('livewire.conferencias.failed_jobs')
                @endif
                @if($tabela == "fer_kanban")
                    @include('livewire.conferencias.fer_kanban')
                @endif
                @if($tabela == "fin_a_receber")
                    @include('livewire.conferencias.fin_a_receber')
                @endif
                @if($tabela == "fin_a_receber2")
                    @include('livewire.conferencias.fin_a_receber2')
                @endif
                @if($tabela == "fin_bancos")
                    @include('livewire.conferencias.fin_bancos')
                @endif
                @if($tabela == "fin_compras")
                    @include('livewire.conferencias.fin_compras')
                @endif
                @if($tabela == "fin_compras_detalhes")
                    @include('livewire.conferencias.fin_compras_detalhes')
                @endif
                @if($tabela == "fin_compras_pagamentos")
                    @include('livewire.conferencias.fin_compras_pagamentos')
                @endif
                @if($tabela == "fin_contas_internas")
                    @include('livewire.conferencias.fin_contas_internas')
                @endif
                @if($tabela == "fin_dividas")
                    @include('livewire.conferencias.fin_dividas')
                @endif
                @if($tabela == "fin_lancamentos")
                    @include('livewire.conferencias.fin_lancamentos')
                @endif
                @if($tabela == "fin_lancamentos-comissoes")
                    @include('livewire.conferencias.fin_lancamentos-comissoes')
                @endif
                @if($tabela == "fin_orcamentos")
                    @include('livewire.conferencias.fin_orcamentos')
                @endif
                @if($tabela == "fin_recebimentos_cartoes")
                    @include('livewire.conferencias.fin_recebimentos_cartoes')
                @endif
                @if($tabela == "frm_contatos")
                    @include('livewire.conferencias.frm_contatos')
                @endif
                @if($tabela == "frm_erros")
                    @include('livewire.conferencias.frm_erros')
                @endif
                @if($tabela == "ger_empresa")
                    @include('livewire.conferencias.ger_empresa')
                @endif
                @if($tabela == "ger_formas_pagamentos")
                    @include('livewire.conferencias.ger_formas_pagamentos')
                @endif
                @if($tabela == "migrations")
                    @include('livewire.conferencias.migrations')
                @endif
                @if($tabela == "org_eventos")
                    @include('livewire.conferencias.org_eventos')
                @endif
                @if($tabela == "password_resets")
                    @include('livewire.conferencias.password_resets')
                @endif
                @if($tabela == "password_reset_tokens")
                    @include('livewire.conferencias.password_reset_tokens')
                @endif
                @if($tabela == "pdv_caixas")
                    @include('livewire.conferencias.pdv_caixas')
                @endif
                @if($tabela == "pdv_vendas")
                    @include('livewire.conferencias.pdv_vendas')
                @endif
                @if($tabela == "pdv_vendas_detalhes")
                    @include('livewire.conferencias.pdv_vendas_detalhes')
                @endif
                @if($tabela == "pdv_vendas_pagamentos")
                    @include('livewire.conferencias.pdv_vendas_pagamentos')
                @endif
                @if($tabela == "ped_cursos")
                    @include('livewire.conferencias.ped_cursos')
                @endif
                @if($tabela == "ped_modulos")
                    @include('livewire.conferencias.ped_modulos')
                @endif
                @if($tabela == "ped_turmas")
                    @include('livewire.conferencias.ped_turmas')
                @endif
                @if($tabela == "personal_access_tokens")
                    @include('livewire.conferencias.personal_access_tokens')
                @endif
                @if($tabela == "sessions")
                    @include('livewire.conferencias.sessions')
                @endif
                @if($tabela == "x_acl_cargos_pessoas")
                    @include('livewire.conferencias.x_acl_cargos_pessoas')
                @endif
                @if($tabela == "x_acl_permissoes_cargos")
                    @include('livewire.conferencias.x_acl_permissoes_cargos')
                @endif
                @if($tabela == "x_atd_pessoas_tipos")
                    @include('livewire.conferencias.x_atd_pessoas_tipos')
                @endif
                @if($tabela == "x_pdv_lancamentos_pagamentos")
                    @include('livewire.conferencias.x_pdv_lancamentos_pagamentos')
                @endif
            </div>
        </div>
    </div>
</div>
