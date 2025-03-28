<aside class="main-sidebar elevation-4 sidebar-dark-blue">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ url('storage/app/logo.png') }}" alt='{{ ENV("app_name") ?? "Espaço Milady" }}' class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ ENV("app_name") ?? "Espaço Milady" }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-pie-chart', 'menu' => 'Dashboard', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Padrão', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Padrão' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Financeiro', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Financeiro' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Gráfico Geral', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Gráfico Geral' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Gráfico Agenda e Vendas', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Gráfico Agenda e Vendas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Gráfico do Financeiro', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Gráfico do Financeiro' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Agendamentos'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-calendar', 'menu' => 'Agendamentos', 'tem_submenu' => false, 'rota' => 'atd.agendamentos' ])
                </li>
                @endcanany
                
                @canany(['Ver Caixas'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-shopping-cart', 'menu' => 'Caixas', 'tem_submenu' => false, 'rota' => 'pdv.caixas.index' ])
                </li>
                @endcanany
                
                @canany(['Ver Clientes'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-user', 'menu' => 'Clientes', 'tem_submenu' => false ])
                </li>
                @endcanany
                
                @canany(['Ver Profissional'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-graduation-cap', 'menu' => 'Profissional', 'tem_submenu' => false ])
                </li>
                @endcanany
                
                @canany(['Ver Produtos e Serviços'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-trophy', 'menu' => 'Produtos e Serviços', 'tem_submenu' => false, 'rota' => 'cat.servicos.index' ])
                </li>
                @endcanany
                
                
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-dollar', 'menu' => 'Financeiro', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Lançamentos', 'rota' => 'atd.agendamentos', 'menu' => 'Lançamentos' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Meus Caixas', 'rota' => 'atd.agendamentos', 'menu' => 'Meus Caixas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Categoria', 'rota' => 'atd.agendamentos', 'menu' => 'Categoria' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Conta', 'rota' => 'atd.agendamentos', 'menu' => 'Conta' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Formas de Pagamento', 'rota' => 'atd.agendamentos', 'menu' => 'Formas de Pagamento' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-bar-chart', 'menu' => 'Análise', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Fluxo de Caixa Anual', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Fluxo de Caixa Anual' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Fluxo de Caixa Mensal', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Fluxo de Caixa Mensal' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-gift', 'menu' => 'Compras', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Compra', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Compra' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Fornecedor', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Fornecedor' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-database', 'menu' => 'Cadastros Gerais', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Anamnese, Fichas e Contratos', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Anamnese, Fichas e Contratos' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Campo Personalizado', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Campo Personalizado' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Como nos Conheceu', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Como nos Conheceu' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Equipamentos', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Equipamentos' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Feriado', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Feriado' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Grupo de Serviços', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Grupo de Serviços' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Marcas', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Marcas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Operadoras', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Operadoras' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Salas', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Salas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Financeiro', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Financeiro' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Gráfico Geral', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Gráfico Geral' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Gráfico Agenda e Vendas', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Gráfico Agenda e Vendas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Gráfico do Financeiro', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Gráfico do Financeiro' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-search', 'menu' => 'Consulta', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Agendas', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Agendas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Análise', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Análise' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Auditoria Agenda', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Auditoria Agenda' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Auditoria de Vendas', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Auditoria de Vendas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Comissão Detalhada', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Comissão Detalhada' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Demonstrativo', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Demonstrativo' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Estoque', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Estoque' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Pacote por Cliente', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Pacote por Cliente' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Previsão de Retorno', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Previsão de Retorno' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Orçamentos', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Orçamentos' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Vendas', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Vendas' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Vendas por Cliente', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Vendas por Cliente' ])
                    </ul>
                </li>
                @endcanany

                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-key', 'menu' => 'Permissões', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Grupos de Acessos', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Grupos de Acessos' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-gears', 'menu' => 'Configurações', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Dados da Empresa', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Dados da Empresa' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Configuração', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Configuração' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'SMS', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'SMS' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Email', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Email' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'WhatsApp', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'WhatsApp' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Alterar Senha', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Alterar Senha' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Tutorial', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Tutorial' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Unifica Cliente', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Unifica Cliente' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Meios de Pagamento', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Meios de Pagamento' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-bullseye', 'menu' => 'NFS-e', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Configurações', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Configurações' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Caixa de Saída', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Caixa de Saída' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Serviço Municipal', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Serviço Municipal' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Lista de Serviço LC116', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Lista de Serviço LC116' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'CNAE', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'CNAE' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['Ver Padrão', 'Ver Financeiro', 'Ver Gráfico Geral', 'Ver Gráfico Agenda e Vendas', 'Ver Gráfico do Financeiro'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-question-circle', 'menu' => 'Ajuda', 'tem_submenu' => true ])
                    <ul class="nav nav-treeview">
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Como Ativar a Agenda Online?', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Como Ativar a Agenda Online?' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Como Controlar Pacote ou Sessão?', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Como Controlar Pacote ou Sessão?' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Como Preencher Ficha de Anamnese?', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Como Preencher Ficha de Anamnese?' ])
                        @include('layouts.parts.menu-subitem', [ 'permissao' => 'Portal Dúvidas Frequentes', 'rota' => 'atd.agendamentos', 'icone' => 'fa fa-calendar' , 'menu' => 'Portal Dúvidas Frequentes' ])
                    </ul>
                </li>
                @endcanany
                
                @canany(['###############'])
                <li class="nav-item">
                    @include('layouts.parts.menu-item', [ 'icone' => 'fa fa-sign-out', 'menu' => 'Sair', 'tem_submenu' => false ])
                </li>
                @endcanany
                
                
                
                
                
                
                
                
                
                
                @canany(['Adminisitrador do Sistema'])
                ++++++++++++++++++++++++++++++++++++++++
                @endcan
                
                
                {{--
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fa-solid fa-gauge-high"></i>
                        <p>Dashboard</p>
                    </a>
                </li> 
                --}}
                
                @canany(['Ver pessoas', 'Ver agendamentos', 'Ver minha agenda'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Atendimento<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Ver pessoas')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('atd.pessoas') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pessoas</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver minha agenda')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('atd.agendamentos') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agendamentos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                @canany(['Ver minhas comissões abertas', 'Ver minhas comissões pagas'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-sack-dollar"></i>
                        <p>Minhas Comissões<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Ver minhas comissões abertas')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fin.comissoes.minhasA') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Abertas</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver minhas comissões pagas')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fin.comissoes.minhasA') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pagas</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                @canany(['Ver servicos', 'Ver produtos', 'Comprar produtos', 'Retirar produtos'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-book-open"></i>
                        <p>Estoque<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Ver servicos')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cat.servicos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Serviços</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver produtos')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cat.produtos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Comprar produtos')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cat.compras') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compra de produtos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Retirar produtos')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cat.saidas') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Saída de produtos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                @canany(['Ver relatório de estoque', 'Ver relatório de curva ABC', '###############'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-file-lines"></i>
                        <p>Relatórios<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Ver relatório de estoque')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('est.relatorios') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Relatório de Estoque</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver relatório de curva ABC')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('est.relatorios.curva-abc') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Curva ABC</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                @canany(['Importar arquivos', '###############'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-file-lines"></i>
                        <p>Plataformas<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Importar arquivos')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ptf.importar') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Importar arquivos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver Braip')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ptf.braip') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Braip</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver Monetizze')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('ptf.monetizze') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Monetizze</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                @canany(['Ver vendas'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-handshake"></i>
                        <p>Comercial<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Ver vendas')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('com.vendas.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vendas</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('com.leads.dashboard') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('com.leads.comissoes') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comissões</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    {{-- 
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('com.leads.criar') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Adicionar Lead</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    --}}
                    {{--
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('com.leads.empresa') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Atendimento</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    --}}
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('com.leads') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visualizar Leads</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                @canany(['Ver comissões dos profissionais', '###############'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-dollar"></i>
                        <p>Financeiro<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fin.bancos') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bancos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fin.lancamentos.dashboard') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fin.lancamentos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lançamentos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fin.lancamentos') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>movimentações Lead</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver comissões dos profissionais')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fin.comissoes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comissões</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                @canany(['###############'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-tools"></i>
                        <p>Ferramentas<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fer.kanban.listar') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KanBan</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    {{-- 
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('fer.tarefa-solid.listar') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tarefa-solid</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    --}}
                </li>
                @endcanany
                
                
                @canany(['Ver comissões', 'Ver formas de pagamentos', 'Administrador do Sistema'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>Configurações<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Ver formas de pagamentos')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cfg.forma-de-pagamentos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Formas de Pagamentos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cfg.acessos') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Acessos</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('###############')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cfg.usuarios') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuários do sistema</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Administrador do Sistema')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cfg.permissoes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissões</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver comissões')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cfg.comissoes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comissões</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('Ver plano de contas')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cfg.forma-de-pagamentos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Plano de Contas</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                
                
                @canany(['Ver caixas', 'Ver comandas'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-store"></i>
                        <p>PDV<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    @can('Ver caixas')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pdv.caixas.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Caixas</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    
                    @can('Ver comandas')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pdv.comandas.index') }}" class="nav-link 
                                @if(auth()->user()->abcdefghijklmno('hj')->count() == 0)
                                disabled
                                @endif
                                ">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="
                                @if(auth()->user()->abcdefghijklmno('hj')->count() == 0)
                                text-muted
                                @endif
                                ">Comandas</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @endcanany
                
                
                {{-- ########################################################################################### --}}
                {{-- ########################################################################################### --}}
                {{-- ########################################################################################### --}}
                {{-- ########################################################################################### --}}
                {{-- ########################################################################################### --}}
                {{-- ########################################################################################### --}}
                
                {{-- @can('Administrador do Sistema') --}}
                {{-- 
                <!-- can('Pessoa.Visualizar') -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-copy"></i>
                        <p>Atendimento<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('atd.pessoas') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pessoas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- endcan -->
                
                <!-- can('Lead.Visualizar') -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-copy"></i>
                        <p>Comercial<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('com.leads') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Leads</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- endcan -->
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-copy"></i>
                        <p>Layout Options<i class="fa-solid fa-angle-left right"></i><span class="badge badge-info right">6</span></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar <small>+ Custom Area</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-chart-pie"></i>
                        <p>Charts<i class="right fa-solid fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-tree"></i>
                        <p>UI Elements<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/modals.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/navbar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/timeline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/ribbons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-edit"></i>
                        <p>Forms<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Validation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-table"></i>
                        <p>Tables<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/jsgrid.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </li>
            --}}
            {{-- @endcan --}}
            </ul>
        </nav>
    </div>
</aside>
