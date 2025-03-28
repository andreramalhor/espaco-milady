@php
$menus = [
    [
        'can'   => 'Administrador do Sistema',
        'text'  => 'Conferências',
        'icon'  => 'fa fa-search',
        'route' => 'conferencia.index',
    ],
    [
        'text'    => 'Atendimento',
        'icon'    => 'fas fa-fw fa-users',
        'submenu' => [
            [
                'cansub'=> 'Atendimento::Clientes:Listar',
                'text'  => 'Clientes',
                'route' => ['atd.pessoas', [ 'tp_pessoa' => 'Clientes' ]],
                // 'icon'  => 'fas fa-fw fa-users',
            ],
            [
                'cansub'=> 'Atendimento::Fornecedores:Listar',
                'text'  => 'Fornecedores',
                'route' => ['atd.pessoas', [ 'tp_pessoa' => 'Fornecedores' ]],
                // 'icon'  => 'fas fa-fw fa-users',
            ],
            [
                'cansub'=> 'Atendimento::Colaboradores:Listar',
                'text'  => 'Colaboradores',
                'route' => ['atd.pessoas', [ 'tp_pessoa' => 'Colaboradores' ]],
                // 'icon'  => 'fas fa-fw fa-users',
            ],
            [
                'cansub'=> 'Agenda::Agendamentos:Listar',
                'text'  => 'Agendas',
                'route' => 'atd.agendamentos',
                // 'icon'  => 'fas fa-fw fa-calendar-day',
            ],
        ],
    ],
    [
        'text'    => 'Dashboard',
        'icon'    => 'fa fa-pie-chart',
        'submenu' => [
            [
                'cansub'     => 'Ver dashboards',
                'text'       => 'Padrão',
                'route'      => 'dsh.padrao',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Ver dashboards',
                'text'       => 'Financeiro',
                'route'      => 'dsh.financeiro',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Ver dashboards',
                'text'       => 'Gráfico Geral',
                'route'      => 'dsh.geral',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Ver dashboards',
                'text'       => 'Gráfico Agenda',
                'route'      => 'dsh.agenda',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Ver dashboards',
                'text'       => 'Gráfico Vendas',
                'route'      => 'dsh.vendas',
                'icon'       => 'fa fa-calendar'
            ],
        ],
    ],
    [
        'text'    => 'Financeiro',
        'icon'    => 'fa fa-dollar',
        'submenu' => [
            [
                'cansub'     => 'Ver minhas comissões abertas',
                'text'       => 'Abertas',
                'route'      => 'fin.comissoes.minhasA',
                'icon'       => 'fa-solid fa-sack-dollar',
            ],
            [
                'cansub'     => 'Ver minhas comissões pagas',
                'text'       => 'Pagas',
                'route'      => 'fin.comissoes.minhasB',
                'icon'       => 'fa-solid fa-sack-dollar',
            ],
            [
                'cansub'     => 'Lançamentos.Menu',
                'text'       => 'Lançamentos',
                'route'      => 'fin.lancamentos.index',
                // 'icon'       => 'fa fa-dollar',
            ],
            [
                'cansub'     => 'Meus Caixas',
                'text'       => 'Meus Caixas',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Categoria',
                'text'       => 'Categoria',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Conta',
                'text'       => 'Conta',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Formas de Pagamento',
                'text'       => 'Formas de Pagamento',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar'
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Bancos',
                'route'      => 'fin.bancos',
                // 'icon'       => 'fa fa-calendar'
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Dashboard',
                'route'      => 'fin.lancamentos.dashboard',
                // 'icon'       => 'fa fa-calendar'
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Movimentações Lead',
                'route'      => 'fin.lancamentos.index',
                // 'icon'       => 'fa fa-calendar'
            ],
            [
                'cansub'     => 'Ver comissões dos profissionais',
                'text'       => 'Comissões',
                'route'      => 'fin.comissoes.index',
                // 'icon'       => 'fa fa-calendar'
            ],
        ],
    ],
    [
        'text'    => 'Ferramentas',
        'icon'    => 'fa-solid fa-tools',
        'submenu' => [
            [
                'cansub'     => 'KanBan',
                'text'       => 'KanBan',
                'route'      => 'fer.kanban.listar',
                'icon'       => 'fa-solid fa-book-open',
            ],
        ],
    ],
    [
        'text'    => 'Configurações',
        'icon'    => 'fa-solid fa-gear',
        'submenu' => [
            [
                'cansub'     => 'Ver formas de pagamentos',
                'text'       => 'Formas de Pagamentos',
                'route'      => 'cfg.forma-de-pagamentos.index',
                'icon'       => 'fa-solid fa-gear',
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Acessos',
                'route'      => 'cfg.acessos',
                'icon'       => 'fa-solid fa-gear',
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Usuários do sistema',
                'route'      => 'cfg.usuarios',
                'icon'       => 'fa-solid fa-gear',
            ],
            [
                'cansub'     => 'Administrador do Sistema',
                'text'       => 'Permissões',
                'route'      => 'cfg.permissoes.index',
                'icon'       => 'fa-solid fa-gear',
            ],
            [
                'cansub'     => 'Ver comissões',
                'text'       => 'Comissões',
                'route'      => 'cfg.comissoes.index',
                'icon'       => 'fa-solid fa-gear',
            ],
            [
                'cansub'     => 'Ver plano de contas',
                'text'       => 'Plano de Contas',
                'route'      => 'cfg.plano-de-contas.index',
                'icon'       => 'fa-solid fa-gear',
            ],
        ],
    ],
    [
        'text'    => 'Estoque',
        'icon'    => 'fa-solid fa-book-open',
        'submenu' => [
            [
                'cansub'     => 'Serviços',
                'text'       => 'Serviços',
                'route'      => 'cat.servicos.index',
                'icon'       => 'fa-solid fa-book-open',
            ],
            [
                'cansub'     => 'Produtos',
                'text'       => 'Produtos',
                'route'      => 'cat.produtos.index',
                'icon'       => 'fa-solid fa-book-open',
            ],
            [
                'cansub'     => 'Compra de produtos',
                'text'       => 'Compra de produtos',
                'route'      => 'cat.compras',
                'icon'       => 'fa-solid fa-book-open',
            ],
            [
                'cansub'     => 'Retirar produtos',
                'text'       => 'Saída de produtos',
                'route'      => 'cat.saidas',
                'icon'       => 'fa-solid fa-book-open',
            ],
        ],
    ],
    [
        'text'    => 'Análise',
        'icon'    => 'fa fa-bar-chart',
        'submenu' => [
            [
                'cansub'     => 'Fluxo de Caixa Anual',
                'text'       => 'Fluxo de Caixa Anual',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Fluxo de Caixa Mensal',
                'text'       => 'Fluxo de Caixa Mensal',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'Relatórios',
        'icon'    => 'fa-solid fa-file-lines',
        'submenu' => [
            [
                'cansub'     => 'Ver relatório de estoque',
                'text'       => 'Relatório de Estoque',
                'route'      => 'est.relatorios',
                'icon'       => 'fa-solid fa-file-lines',
            ],
            [
                'cansub'     => 'Ver relatório de curva ABC',
                'text'       => 'Curva ABC',
                'route'      => 'est.relatorios.curva-abc',
                'icon'       => 'fa-solid fa-file-lines',
            ],
        ],
    ],
    [
        'text'    => 'Plataformas',
        'icon'    => 'fa-solid fa-file-lines',
        'submenu' => [
            [
                'cansub'     => 'Importar arquivos',
                'text'       => 'Importar arquivos',
                'route'      => 'ptf.importar',
                'icon'       => 'fa-solid fa-file-lines',
            ],
            [
                'cansub'     => 'Ver Braip',
                'text'       => 'Braip',
                'route'      => 'ptf.braip',
                'icon'       => 'fa-solid fa-file-lines',
            ],
            [
                'cansub'     => 'Ver Monetizze',
                'text'       => 'Monetizze',
                'route'      => 'ptf.monetizze',
                'icon'       => 'fa-solid fa-file-lines',
            ],
        ],
    ],
    [
        'text'    => 'Compras',
        'icon'    => 'fa fa-gift',
        'submenu' => [
            [
                'cansub'     => 'Compra',
                'text'       => 'Compra',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Fornecedor',
                'text'       => 'Fornecedor',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'Cadastros Gerais',
        'icon'    => 'fa fa-database',
        'submenu' => [
            [
                'cansub'     => 'Anamnese, Fichas e Contratos',
                'text'       => 'Anamnese, Fichas e Contratos',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Campo Personalizado',
                'text'       => 'Campo Personalizado',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Como nos Conheceu',
                'text'       => 'Como nos Conheceu',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Equipamentos',
                'text'       => 'Equipamentos',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Feriado',
                'text'       => 'Feriado',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Grupo de Serviços',
                'text'       => 'Grupo de Serviços',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Marcas',
                'text'       => 'Marcas',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Operadoras',
                'text'       => 'Operadoras',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Salas',
                'text'       => 'Salas',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Cadastro Financeiro',
                'text'       => 'Financeiro',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Gráfico Geral',
                'text'       => 'Gráfico Geral',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Gráfico Agenda e Vendas',
                'text'       => 'Gráfico Agenda e Vendas',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Gráfico do Financeiro',
                'text'       => 'Gráfico do Financeiro',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'Consulta',
        'icon'    => 'fa fa-search',
        'submenu' => [
            [
                'cansub'     => 'Agendas',
                'text'       => 'Agendas',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Análise',
                'text'       => 'Análise',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Auditoria Agenda',
                'text'       => 'Auditoria Agenda',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Auditoria de Vendas',
                'text'       => 'Auditoria de Vendas',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Comissão Detalhada',
                'text'       => 'Comissão Detalhada',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Demonstrativo',
                'text'       => 'Demonstrativo',
                'route'      => 'con.demonstrativo.index',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Estoque',
                'text'       => 'Estoque',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Pacote por Cliente',
                'text'       => 'Pacote por Cliente',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Previsão de Retorno',
                'text'       => 'Previsão de Retorno',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Orçamentos',
                'text'       => 'Orçamentos',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Vendas',
                'text'       => 'Vendas',
                'route'      => 'con.vendas.index',
                // 'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Vendas por Cliente',
                'text'       => 'Vendas por Cliente',
                'route'      => 'cat.saidas',
                // 'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'Permissões',
        'icon'    => 'fa fa-key',
        'submenu' => [
            [
                'cansub'     => 'Grupos de Acessos',
                'text'       => 'Grupos de Acessos',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-key',
            ],
        ],
    ],
    [
        'text'    => 'Configurações',
        'icon'    => 'fa fa-gears',
        'submenu' => [
            [
                'cansub'     => 'Dados da Empresa',
                'text'       => 'Dados da Empresa',
                'route'      => 'cfg.dados-empresa.index',
                'icon'       => 'fa fa-gears',
            ],
            [
                'cansub'     => 'Profissionais',
                'text'       => 'Profissionais',
                'route'      => 'cfg.profissionais.index',
                'icon'       => 'fa fa-graduation-cap',
            ],
            [
                'cansub'     => 'Configuração',
                'text'       => 'Configuração',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'SMS',
                'text'       => 'SMS',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Email',
                'text'       => 'Email',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'WhatsApp',
                'text'       => 'WhatsApp',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Alterar Senha',
                'text'       => 'Alterar Senha',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Tutorial',
                'text'       => 'Tutorial',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Unifica Cliente',
                'text'       => 'Unifica Cliente',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Meios de Pagamento',
                'text'       => 'Meios de Pagamento',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'Comercial',
        'icon'    => 'fa-solid fa-handshake',
        'submenu' => [
            [
                'cansub'     => 'Ver vendas',
                'text'       => 'Vendas',
                'route'      => 'com.vendas.index',
                'icon'       => 'fa fa-gears',
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Dashboard',
                'route'      => 'com.leads.dashboard',
                'icon'       => 'fa fa-graduation-cap',
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Comissões',
                'route'      => 'com.leads.comissoes',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => '###############',
                'text'       => 'Visualizar Leads',
                'route'      => 'com.leads',
                'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'NFS-e',
        'icon'    => 'fa fa-bullseye',
        'submenu' => [
            [
                'cansub'     => 'Configurações',
                'text'       => 'Configurações',
                'route'      => 'cfg.dados-empresa.index',
                'icon'       => 'fa fa-gears',
            ],
            [
                'cansub'     => 'Caixa de Saída',
                'text'       => 'Caixa de Saída',
                'route'      => 'cfg.profissionais.index',
                'icon'       => 'fa fa-graduation-cap',
            ],
            [
                'cansub'     => 'Serviço Municipal',
                'text'       => 'Serviço Municipal',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Lista de Serviço LC116',
                'text'       => 'Lista de Serviço LC116',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'CNAE',
                'text'       => 'CNAE',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'Ajuda',
        'icon'    => 'fa fa-question-circle',
        'submenu' => [
            [
                'cansub'     => 'Como Ativar a Agenda Online?',
                'text'       => 'Como Ativar a Agenda Online?',
                'route'      => 'cfg.dados-empresa.index',
                'icon'       => 'fa fa-gears',
            ],
            [
                'cansub'     => 'Como Controlar Pacote ou Sessão?',
                'text'       => 'Como Controlar Pacote ou Sessão?',
                'route'      => 'cfg.profissionais.index',
                'icon'       => 'fa fa-graduation-cap',
            ],
            [
                'cansub'     => 'Como Preencher Ficha de Anamnese?',
                'text'       => 'Como Preencher Ficha de Anamnese?',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
            [
                'cansub'     => 'Portal Dúvidas Frequentes',
                'text'       => 'Portal Dúvidas Frequentes',
                'route'      => 'cat.saidas',
                'icon'       => 'fa fa-calendar',
            ],
        ],
    ],
    [
        'text'    => 'PDV',
        'icon'    => 'fa-solid fa-store',
        'submenu' => [
            [
                'cansub'     => 'Ver caixas',
                'text'       => 'Caixas',
                'route'      => 'pdv.caixas.index',
                'icon'       => 'fa fa-gears',
            ],
            [
                'cansub'     => 'Ver comandas',
                'text'       => 'Comandas',
                'route'      => 'pdv.comandas.index',
                'icon'       => 'fa fa-graduation-cap',
            ],
        ],
    ],
    [
        'can'   => null,
        'text'  => 'Sair',
        'icon'  => 'fa fa-sign-out',
        'route' => 'logout',
    ],
];
@endphp

<aside class="main-sidebar elevation-4 sidebar-dark-blue text-sm">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ url('storage/app/logo.png') }}" alt='{{ ENV("app_name") ?? "Espaço Milady" }}' class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ ENV("app_name") ?? "Espaço Milady" }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
            
                @foreach($menus as $menu)
                    @if(isset($menu['submenu']))
                        @canany(array_column($menu['submenu'], 'cansub'))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>
                                    {{ $menu['text'] }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($menu['submenu'] as $submenu)
                                    @can($submenu['cansub'])
                                    <li class="nav-item">
                                        <a href="@if(is_array($submenu['route'])) {{ route($submenu['route'][0], $submenu['route'][1]) }} @else {{ route($submenu['route']) }} @endif" class="nav-link">
                                            @if(isset($submenu['icon']))
                                            <i class="{{ $submenu['icon'] }} nav-icon"></i>
                                            @endif
                                            <p>{{ $submenu['text'] }}</p>
                                        </a>
                                    </li>
                                    @endcan                            
                                @endforeach
                            </ul>
                        </li>
                        {{--
                            @can('Ver comandas')
                            <a href="{{ route('') }}" class="nav-link 
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
                            @endcan
                        --}}
                        @endcanany
                    @else
                        @can($menu['can'])
                            <li class="nav-item">
                                <a href="{{ route($menu['route']) }}" class="nav-link">
                                    <i class="nav-icon {{ $menu['icon'] }}"></i>
                                    <p>
                                        {{ $menu['text'] }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                @endforeach
                
            </ul>
        </nav>
    </div>
</aside>
