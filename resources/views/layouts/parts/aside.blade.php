<aside class="main-sidebar elevation-4 sidebar-dark-blue">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ url('storage/app/logo.png') }}" alt="Converta Soluções" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Converta Soluções</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fa-solid fa-gauge-high"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                
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
                
                
                @canany(['Ver comissões', 'Administrador do Sistema'])
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>Configurações<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
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
                            <a href="{{ route('cfg.plano-de-contas.index') }}" class="nav-link">
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
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i><p>Calendar<span class="badge badge-info right">2</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i><p>Gallery</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link">
                        <i class="nav-icon fa-solid fa-columns"></i><p>Kanban Board</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>Mailbox<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-book"></i>
                        <p>Pages<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/profile.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/e-commerce.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>E-commerce</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/projects.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project-add.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project-edit.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Edit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/project-detail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/contacts.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/faq.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/contact-us.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>Extras<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>        Login & Register v1<i class="fa-solid fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/register.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/forgot-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/recover-password.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>        Login & Register v2<i class="fa-solid fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/examples/login-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/register-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/examples/recover-password-v2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-search"></i>
                        <p>Search<i class="fa-solid fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Search</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enhanced</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="iframe.html" class="nav-link">
                        <i class="nav-icon fa-solid fa-ellipsis-h"></i>
                        <p>Tabbed IFrame Plugin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                        <i class="nav-icon fa-solid fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-circle"></i>
                        <p>Level 1<i class="right fa-solid fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>        Level 2<i class="right fa-solid fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Level 3</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li> --}}
            {{-- @endcan --}}
            </ul>
        </nav>
    </div>
</aside>
