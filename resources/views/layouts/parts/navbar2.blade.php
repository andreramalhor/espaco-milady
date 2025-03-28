<nav class="main-header navbar navbar-expand navbar-dark text-sm" style="background-color: goldenrod !important;"> {{-- navbar-blue --}}

    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        
        @canany(['Administrador do Sistema'])
            
            <x-adminlte.layouts.navbar-links href="{{ route('dashboard') }}" icon="<i class='fa-solid fa-gauge-high'></i>" tooltip="Dashboard" />
                
            @canany(['Ver pessoas', 'Ver agendamentos', 'Ver minha agenda'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-users'></i>" tooltip="Atendimento">
                @can('Ver pessoas')
                <li><a class="dropdown-item" href="{{ route('atd.pessoas') }}">Pessoas</a></li>
                @endcan
                @can('Ver agendamentos', 'Ver minha agenda')
                <li><a class="dropdown-item" href="{{ route('atd.agendamentos') }}">Agendamentos</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany
                
            @canany(['Ver minhas comissões abertas', 'Ver minhas comissões pagas'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-sack-dollar'></i>" tooltip="Minhas Comissões">
                @can('Ver minhas comissões abertas')
                <li><a class="dropdown-item" href="{{ route('fin.comissoes.minhasA') }}">Abertas</a></li>
                @endcan
                @can('Ver minhas comissões pagas')
                <li><a class="dropdown-item" href="{{ route('fin.comissoes.minhasA') }}">Pagas</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany
            
            @canany(['Ver servicos', 'Ver produtos', 'Comprar produtos', 'Retirar produtos'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-book-open'></i>" tooltip="Estoque">
                @can('Ver servicos')
                <li><a class="dropdown-item" href="{{ route('cat.servicos.index') }}">Serviços</a></li>
                @endcan
                @can('Ver produtos')
                <li><a class="dropdown-item" href="{{ route('cat.produtos.index') }}">Produtos</a></li>
                @endcan
                @can('Comprar produtos')
                <li><a class="dropdown-item" href="{{ route('cat.compras') }}">Compra de produtos</a></li>
                @endcan
                @can('Retirar produtos')
                <li><a class="dropdown-item" href="{{ route('cat.saidas') }}">Saída de produtos</a></li>
                @endcan
                {{--
                    href="{{ route('cat.relatorios-estoque') }}"
                    <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropright
                        </button>
                        <div class="dropdown-menu">
                            <!-- Dropdown menu links -->
                        </div>
                    </div>
                    <li><a class="dropdown-item" href="{{ route('cat.categorias') }}">Categorias</a></li>
                    <li><a class="dropdown-item" href="{{ route('cat.servicos') }}">Serviços</a></li>
                --}}
            </x-adminlte.layouts.navbar-links>
            @endcanany
            
            @canany(['Ver relatório de estoque', 'Ver relatório de curva ABC', '###############'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-file-lines'></i>" tooltip="Relatórios">
                @can('Ver relatório de estoque')
                <li><a class="dropdown-item" href="{{ route('est.relatorios') }}">Relatório de Estoque</a></li>
                @endcan
                @can('Ver relatório de curva ABC')
                <li><a class="dropdown-item" href="{{ route('est.relatorios.curva-abc') }}">Curva ABC</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany
            
            @canany(['Importar arquivos', '###############'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-file-lines'></i>" tooltip="Plataformas">
                @can('Importar arquivos')
                <li><a class="dropdown-item" href="{{ route('ptf.importar') }}">Importar arquivos</a></li>
                @endcan
                @can('Ver Braip')
                <li><a class="dropdown-item" href="{{ route('ptf.braip') }}">Braip</a></li>
                @endcan
                @can('Ver Monetizze')
                <li><a class="dropdown-item" href="{{ route('ptf.monetizze') }}">Monetizze</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany
            
            @canany(['Ver vendas'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-handshake'></i>" tooltip="Comercial">
                @can('Ver vendas')
                <li><a class="dropdown-item" href="{{ route('com.vendas.index') }}">Vendas</a></li>
                @endcan
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('com.leads.dashboard') }}">Dashboard</a></li>
                @endcan
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('com.leads.comissoes') }}">Comissões</a></li>
                @endcan
                {{-- <li><a class="dropdown-item" href="{{ route('com.leads.criar') }}">Adicionar Lead</a></li> --}}
                {{-- <li><a class="dropdown-item" href="{{ route('com.leads.empresa') }}">Atendimento</a></li> --}}
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('com.leads') }}">Visualizar Leads</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany
            
            @canany(['Ver comissões dos profissionais', '###############'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-dollar'></i>" tooltip="Financeiro">
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('fin.bancos') }}">Bancos</a></li>
                @endcan
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('fin.lancamentos.dashboard') }}">Dashboard</a></li>
                @endcan
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('fin.lancamentos.index') }}">Lançamentos</a></li>
                @endcan
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('fin.lancamentos') }}">Extrato de movimentações</a></li>
                @endcan
                @can('Ver comissões dos profissionais')
                <li><a class="dropdown-item" href="{{ route('fin.comissoes.index') }}">Comissões</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany
            
            @canany(['###############'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-tools'></i>" tooltip="Ferramentas">
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('fer.kanban.listar') }}">KanBan</a></li>
                @endcan
                @can('###############')
                {{-- <li><a class="dropdown-item" href="{{ route('fer.tarefas.listar') }}">Tarefas</a></li> --}}
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany
            
            @canany(['Ver comissões', 'Ver formas de pagamentos', 'Administrador do Sistema'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-gear'></i>" tooltip="Configurações">
                @can('Ver formas de pagamentos')
                <li><a class="dropdown-item" href="{{ route('cfg.forma-de-pagamentos.index') }}">Formas de pagamentos</a></li>
                @endcan
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('cfg.acessos') }}">Acessos</a></li>
                @endcan
                @can('###############')
                <li><a class="dropdown-item" href="{{ route('cfg.usuarios') }}">Usuários do sistema</a></li>
                @endcan
                @can('Administrador do Sistema')
                <li><a class="dropdown-item" href="{{ route('cfg.permissoes.index') }}">Permissões</a></li>
                @endcan
                @can('Ver comissões')
                <li><a class="dropdown-item" href="{{ route('cfg.comissoes.index') }}">Comissões</a></li>
                @endcan
                @can('Ver plano de contas')
                <li><a class="dropdown-item" href="{{ route('cfg.plano-de-contas.index') }}">Plano de Contas</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany 
            
            @canany(['Ver caixas', 'Ver comandas'])
            <x-adminlte.layouts.navbar-links icon="<i class='fa-solid fa-solid fa-store'></i>" tooltip="PDV">
                @can('Ver caixas')
                <li><a class="dropdown-item" href="{{ route('pdv.caixas.index') }}"><i class='fa-solid fa-solid fa-cash-register'></i> Caixas</a></li>
                @endcan
                @can('Ver comandas')
                <li><a class="dropdown-item 
                    @if(auth()->user()->abcdefghijklmno('hj')->count() == 0)
                    disabled
                    @endif
                " href="{{ route('pdv.comandas.index') }}"><i class='fa-solid fa-solid fa-receipt'></i> Comandas</a></li>
                @endcan
            </x-adminlte.layouts.navbar-links>
            @endcanany




        @endcanany


        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>


    </ul>
    








    
    
    <ul class="navbar-nav ms-auto">

        @canany(['Administrador do Sistema'])

            <x-Atendimento.Agendamento.Notificacoes />
        @endcanany




        
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="nav-link-menu-user" role="button" aria-expanded="false">
                <img src="{{ auth()->user()->src_foto ?? null }}" class="user-image img-circle elevation-2">
            </a>
            <ul class="dropdown-menu-lg dropdown-menu dropdown-menu-end" aria-labelledby="nav-link-menu-user">
                <li class="user-header">
                    <img src="{{ auth()->user()->src_foto ?? null }}" class="img-circle elevation-2 d-inline">
                    <p class="">{{ auth()->user()->apelido ?? "NULO"}}<small>{{ auth()->user()->nome ?? "NULO" }}</small></p>
                </li>
                <li class="user-footer">
                    <a href="{{ route('profile.show') }}" class="btn btn-default btn-flat"><i class="fas fa-user"></i> Perfil</a>
                    <a class="btn btn-default btn-flat float-right " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i>Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </li>
            </ul>
        </li>






    </ul>


    {{-- <ul class="navbar-nav ml-auto">
        @if(1==2)
            @canany(['Administrador do sistema'])
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <img src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>4 Hours Ago</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <img src="https://adminlte.io/themes/v3/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>4 Hours Ago</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <img src="https://adminlte.io/themes/v3/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>4 Hours Ago</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i>4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i>8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i>3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
            @endcanany
        @endif
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="nav-item dropdown user-menu">
                        <img class="h-6 w-6 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                @else
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                            {{ Auth::user()->name }}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                @endif
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-dropdown-link>
                @endif

                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-dropdown-link href="{{ route('logout') }}"
                            @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </ul> --}}
</nav>
