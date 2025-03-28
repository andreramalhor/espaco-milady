@php
$menus = [
    [
        'can'     => 'Administrador do Sistema',
        'text'    => 'Conferências',
        'icon'    => 'fa-solid fa-search',
        'route'   => 'conferencia.index',
    ],
    [
        'can'     => 'Agenda::Agendamentos:Listar',
        'text'    => 'Agenda',
        'icon'    => 'fa-solid fa-calendar-day',
        'route'   => 'atd.agendamentos.index',
    ],
    [
        'text'    => 'Cadastros',
        'icon'    => 'fa-solid fa-address-book',
        'submenu' => [
            [
                'can'     => 'Cadastros::Clientes:Listar',
                'text'    => 'Clientes',
                'icon'    => 'fa-solid fa-id-card',
                'route'   => ['atd.pessoas', [ 'tp_pessoa' => 'Clientes' ]],
            ],
            [
                'can'     => 'Cadastros::Fornecedores:Listar',
                'text'    => 'Fornecedores',
                'icon'    => 'fa-solid fa-building-user',
                'route'   => ['atd.pessoas', [ 'tp_pessoa' => 'Fornecedores' ]],
            ],
            [
                'can'     => 'Cadastros::Funcionários:Listar',
                'text'    => 'Funcionários',
                'icon'    => 'fa-solid fa-id-badge',
                'route'   => ['atd.pessoas', [ 'tp_pessoa' => 'Funcionários' ]],
            ],
            [
                'can'     => 'Cadastros::Transportadoras:Listar',
                'text'    => 'Transportadoras',
                'icon'    => 'fa-solid fa-truck',
                'route'   => ['atd.pessoas', [ 'tp_pessoa' => 'Transportadoras' ]],
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Cadastros::Tipos de contatos:Listar',
                        'text'    => 'Tipos de contatos',
                        'icon'    => 'fa-solid fa-bullhorn',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Cadastros::Tipos de endereços:Listar',
                        'text'    => 'Tipos de endereços',
                        'icon'    => 'fa-solid fa-map-marker',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Cadastros::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Agendamentos',
        'icon'    => 'fa-solid fa-calendar-days',
        'submenu' => [
            [
                'can'     => 'Atendimento::Agendamentos:Listar',
                'text'    => 'Listar agendamentos',
                'icon'    => 'fa-solid fa-rectangle-list',
                'route'   => 'atd.agendamentos.listar',
            ],
            [
                'can'     => 'Atendimento::Agendamentos:Clientes Fixas',
                'text'    => 'Clientes fixas',
                'icon'    => 'fa-solid fa-calendar-check',
                'route'   => 'atd.agendamentos.fixas',
            ],
        ],
    ],
    [
        'text'    => 'Produtos',
        'icon'    => 'fa-solid fa-barcode',
        'submenu' => [
            [
                'can'     => 'Produtos::Produtos:Listar',
                'text'    => 'Gerenciar produtos',
                'icon'    => 'fa-solid fa-box',
                'route'   => 'cat.produtos.index',
            ],
            [
                'can'     => 'Produtos::Valores de venda:Listar',
                'text'    => 'Valores de venda',
                'icon'    => 'fa-solid fa-coins',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Produtos::Etiquetas:Listar',
                'text'    => 'Etiquetas',
                'icon'    => 'fa-solid fa-tag',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Produtos::Grupos de produtos:Listar',
                        'text'    => 'Grupos de produtos',
                        'icon'    => 'fa-solid fa-sitemap',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Produtos::Unidades de produtos:Listar',
                        'text'    => 'Unidades de produtos',
                        'icon'    => 'fa-solid fa-flask',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Produtos::Grades/variações:Listar',
                        'text'    => 'Grades/variações',
                        'icon'    => 'fa-solid fa-table-cells',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Produtos::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Serviços',
        'icon'    => 'fa-solid fa-hand-sparkles',
        'submenu' => [
            [
                'can'     => 'Serviços::Serviços:Listar',
                'text'    => 'Gerenciar serviços',
                'icon'    => 'fa-solid fa-wand-magic-sparkles',
                'route'   => 'cat.servicos.index',
            ],
        ],
    ],
    [
        'text'    => 'Orçamentos',
        'icon'    => 'fa-solid fa-clipboard-list',
        'submenu' => [
            [
                'can'     => 'Orçamentos::Orçamentos de produtos:Listar',
                'text'    => 'Produtos',
                'icon'    => 'fa-solid fa-clipboard-question',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Orçamentos::Orçamentos de serviços:Listar',
                'text'    => 'Serviços',
                'icon'    => 'fa-solid fa-clipboard-check',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Orçamentos::Situações:Listar',
                        'text'    => 'Situações',
                        'icon'    => 'fa-solid fa-list-ol',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Orçamentos::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Modelo de e-mail',
                        'icon'    => 'fa-solid fa-envelope',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-gear',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Ordens de serviços',
        'icon'    => 'fa-solid fa-screwdriver-wrench',
        'submenu' => [
            [
                'can'     => 'Ordens de serviços::Ordens de serviços:Listar',
                'text'    => 'Gerenciar O.S.',
                'icon'    => 'fa-solid fa-toolbox',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Ordens de serviços::Painel:Listar',
                'text'    => 'Painel',
                'icon'    => 'fa-solid fa-dashboard',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    
                    [
                        'can'     => 'Ordens de serviços::Situações de OS:Listar',
                        'text'    => 'Situações',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Ordens de serviços::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Modelos de e-mail',
                        'icon'    => 'fa-solid fa-envelope',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-gear',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Vendas',
        'icon'    => 'fa-solid fa-basket-shopping',
        'submenu' => [
            [
                'can'     => 'Vendas::Vendas de produtos:Listar',
                'text'    => 'Produtos',
                'icon'    => 'fa-solid fa-cube',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Vendas::Vendas no balcão:Listar',
                'text'    => 'Balcão',
                'icon'    => 'fa-solid fa-laptop',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Vendas::Vendas de serviços:Listar',
                'text'    => 'Serviços',
                'icon'    => 'fa-solid fa-wand-magic-sparkles',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Vendas::Situações de vendas:Listar',
                        'text'    => 'Situações',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Vendas::Canais de vendas:Listar',
                        'text'    => 'Canais',
                        'icon'    => 'fa-solid fa-bullhorn',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Vendas::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Modelo de e-mail',
                        'icon'    => 'fa-solid fa-envelope',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Vendas::Balanças:Listar',
                        'text'    => 'Balanças',
                        'icon'    => 'fa-solid fa-scale-unbalanced',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-gear',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Estoque',
        'icon'    => 'fa-solid fa-cube',
        'submenu' => [
            [
                'can'     => '##########',
                'text'    => 'Movimentações',
                'icon'    => 'fa-solid fa-external-link',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Estoque::Ajustes de estoque:Listar',
                'text'    => 'Ajustes',
                'icon'    => 'fa-solid fa-arrows-alt',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Estoque::Transferências de estoque:Listar',
                'text'    => 'Transferências',
                'icon'    => 'fa-solid fa-exchange',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Estoque::Cotações:Listar',
                'text'    => 'Cotações',
                'icon'    => 'fa-solid fa-clipboard-question',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Compras ',
                'icon'    => 'fa-solid fa-bag-shopping',
                'submenu' => [
                    [
                        'can'     => 'Estoque::Compras:Listar',
                        'text'    => 'Produtos',
                        'icon'    => 'fa-solid fa-cube',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Serviços',
                        'icon'    => 'fa-solid fa-websitebuilder',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Estoque::Compras:Listar notas de compras',
                        'text'    => 'Notas de compras',
                        'icon'    => 'fa-solid fa-sync',
                        // 'route'   => '#',
                    ],
                ],
            ],
            [
                'can'     => 'Estoque::Devoluções:Listar',
                'text'    => 'Trocas e devoluções',
                'icon'    => 'fa-solid fa-mail-reply-all',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Estoque::Situações de compras:Listar',
                        'text'    => 'Situações de compras',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Estoque::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Modelo de e-mail',
                        'icon'    => 'fa-solid fa-envelope',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-cogs',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Financeiro',
        'icon'    => 'fa-solid fa-dollar-sign',
        'submenu' => [
            [
                'can'     => 'Ver minhas comissões abertas',
                'text'    => 'Abertas',
                'icon'    => 'fa-solid fa-comments-dollar',
                'route'   => 'fin.comissoes.minhasA',
            ],
            [
                'can'     => 'Ver minhas comissões pagas',
                'text'    => 'Pagas',
                'icon'    => 'fa-solid fa-hand-holding-dollar',
                'route'   => 'fin.comissoes.minhasB',
            ],
            [
                'can'     => 'Financeiro::Movimentações financeiras:Listar',
                'text'    => 'Lançamentos',
                'icon'    => 'fa-solid fa-file-invoice-dollar',
                'route'   => 'fin.lancamentos.index',
            ],
            [
                'can'     => 'Ver comissões dos profissionais',
                'text'    => 'Comissões',
                'icon'    => 'fa-solid fa-money-check-dollar',
                'route'   => 'fin.comissoes.index',
            ],
            [
                'can'     => 'Financeiro::Movimentações financeiras:Listar pagamentos',
                'text'    => 'Contas a pagar',
                'icon'    => 'fa-solid fa-money-bill-transfer',
                'route'   => 'fin.lancamentos.index.despesa',
            ],
            [
                'can'     => 'Financeiro::Movimentações financeiras:Listar recebimentos',
                'text'    => 'Contas a receber',
                'icon'    => 'fa-solid fa-money-bill-trend-up',
                'route'   => 'fin.lancamentos.index.receita',
            ],
            [
                'can'     => 'Financeiro::Gerencial:DRE',
                'text'    => 'DRE gerencial',
                'icon'    => 'fa-solid fa-sitemap',
                'route'   => 'fin.gerencial.dre',
            ],
            [
                'can'     => 'Financeiro::Gerencial:Plano de Contas',
                'text'    => 'Demonstrativo de contas',
                'icon'    => 'fa-solid fa-globe',
                'route'   => 'fin.gerencial.contas-contabeis',
            ],
            [
                'can'     => '##########',
                'text'    => 'Fluxo de caixa',
                'icon'    => 'fa-solid fa-chart-column',
                // 'route'   => '#',
            ],
            [
                'can'     => '##########',
                'text'    => 'Conta cliente',
                'icon'    => 'fa-solid fa-chart-column',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Financeiro::Bancos:Lista',
                'text'    => 'Bancos',
                'icon'    => 'fa-solid fa-bank',
                'route'   => 'fin.bancos.index',
            ],
            [
                'can'     => 'Financeiro::Recebimentos:Previsão',
                'text'    => 'Previsão de recebimentos',
                'icon'    => 'fa-solid fa-arroy-left',
                'route'   => 'fin.recebimentos.previsao',
            ],
            [
                'text'    => 'Boletos bancários ',
                'icon'    => 'fa-solid fa-barcode',
                'submenu' => [
                    [
                        'can'     => 'Financeiro::Movimentações financeiras:Listar boletos bancários',
                        'text'    => 'Gerenciar boletos',
                        'icon'    => 'fa-solid fa-font fa-barcode',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Exportar remessa',
                        'icon'    => 'fa-solid fa-cloud-download',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Importar retorno',
                        'icon'    => 'fa-solid fa-cloud-upload',
                        // 'route'   => '#',
                    ],
                ],
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Financeiro::Caixas:Listar',
                        'text'    => 'Caixas',
                        'icon'    => 'fa-solid fa-laptop',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Financeiro::Conta bancária:Listar',
                        'text'    => 'Contas bancárias',
                        'icon'    => 'fa-solid fa-piggybank',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Financeiro::Formas de pagamento:Listar',
                        'text'    => 'Formas de pagamento',
                        'icon'    => 'fa-solid fa-money',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Financeiro::Planos de contas:Listar',
                        'text'    => 'Plano de contas',
                        'icon'    => 'fa-solid fa-sitemap',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Financeiro::Situações:Listar',
                        'text'    => 'Situações',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Financeiro::Centros de custos:Listar',
                        'text'    => 'Centros de custos',
                        'icon'    => 'fa-solid fa-money-cash',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Conciliação bancária',
                        'icon'    => 'fa-solid fa-sync',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Transferências',
                        'icon'    => 'fa-solid fa-exchange',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Financeiro::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Modelos de e-mails',
                        'icon'    => 'fa-solid fa-envelope',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Financeiro::Tabelas de rateios:Listar',
                        'text'    => 'Tabelas de rateios',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-cogs',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Notas fiscais',
        'icon'    => 'fa-solid fa-sync',
        'submenu' => [
            [
                'can'     => 'Notas fiscais::NF-e:Listar',
                'text'    => 'Gerenciar NF-e',
                'icon'    => 'fa-solid fa-shopping-cart',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Notas fiscais::NFS-e:Listar',
                'text'    => 'Gerenciar NFS-e',
                'icon'    => 'fa-solid fa-file-text-o',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Notas fiscais::NFC-e:Listar',
                'text'    => 'Gerenciar NFC-e',
                'icon'    => 'fa-solid fa-qrcode',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => '##########',
                        'text'    => 'Importar XML',
                        'icon'    => 'fa-solid fa-font fa-file-xml',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Certificado digital',
                        'icon'    => 'fa-solid fa-file-shield',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Notas fiscais::Naturezas de operações:Listar',
                        'text'    => 'Naturezas de operações',
                        'icon'    => 'fa-solid fa-exchange',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Notas fiscais::Tributações:Listar',
                        'text'    => 'Tributações',
                        'icon'    => 'fa-solid fa-money-cash',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Notas fiscais::Atividades de serviços:Listar',
                        'text'    => 'Atividades de serviços',
                        'icon'    => 'fa-solid fa-websitebuilder',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Modelos de e-mails',
                        'icon'    => 'fa-solid fa-envelope',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Notas fiscais::Intermediadores:Listar',
                        'text'    => 'Intermediadores',
                        'icon'    => 'fa-solid fa-shopping-cart',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-cogs',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Contratos',
        'icon'    => 'fa-solid fa-file-pen',
        'submenu' => [
            [
                'can'     => 'Contratos::Contratos:Listar',
                'text'    => 'Serviços',
                'icon'    => 'fa-solid fa-websitebuilder',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Contratos::Locações:Listar',
                'text'    => 'Locações',
                'icon'    => 'fa-solid glyphicon glyphfa-transfer',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Contratos::Assinaturas:Listar',
                'text'    => 'Assinaturas',
                'icon'    => 'fa-solid fa-refresh',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Contratos::Situações de contratos:Listar',
                        'text'    => 'Situações de contratos',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Contratos::Situações de locações:Listar',
                        'text'    => 'Situações de locações',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Contratos::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-cogs',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Atendimentos',
        'icon'    => 'fa-solid fa-comments',
        'submenu' => [
            [
                'can'     => 'Atendimentos::Atendimentos:Listar',
                'text'    => 'Atendimentos',
                'icon'    => 'fa-solid fa-phone-square',
                // 'route'   => '#',
            ],
            [
                'text'    => 'Opções auxiliares ',
                'icon'    => 'fa-solid fa-clipboard',
                'submenu' => [
                    [
                        'can'     => 'Atendimentos::Formas de atendimento:Listar',
                        'text'    => 'Formas',
                        'icon'    => 'fa-solid fa-headphones',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Atendimentos::Assuntos:Listar',
                        'text'    => 'Assuntos',
                        'icon'    => 'fa-solid fa-pencil',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Atendimentos::Situações:Listar',
                        'text'    => 'Situações',
                        'icon'    => 'fa-solid fa-list-ul',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => 'Atendimentos::Campos extras:Listar',
                        'text'    => 'Campos extras',
                        'icon'    => 'fa-solid fa-copy',
                        // 'route'   => '#',
                    ],
                    [
                        'can'     => '##########',
                        'text'    => 'Configurações',
                        'icon'    => 'fa-solid fa-cogs',
                        // 'route'   => '#',
                    ],
                ],
            ],
        ],
    ],
    [
        'text'    => 'Relatórios',
        'icon'    => 'fa-solid fa-font fa-stats',
        'submenu' => [
            [
                'can'     => '##########',
                'text'    => 'Cadastros',
                'icon'    => 'fa-solid fa-list-alt',
                'route'   => 'rel.cadastros.index',
            ],
            [
                'can'     => '##########',
                'text'    => 'Vendas',
                'icon'    => 'fa-solid fa-shopping',
                'route'   => 'rel.vendas.index',
            ],
            [
                'can'     => 'Relatórios::Ordens de serviços:Listar',
                'text'    => 'Ordens de serviços',
                'icon'    => 'fa-solid fa-breakable',
                // 'route'   => '#',
            ],
            [
                'can'     => '##########',
                'text'    => 'Estoque',
                'icon'    => 'fa-solid fa-cube',
                // 'route'   => '#',
            ],
            [
                'can'     => '##########',
                'text'    => 'Financeiro',
                'icon'    => 'fa-solid fa-moneybag',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Relatórios::Contratos:Listar',
                'text'    => 'Contratos',
                'icon'    => 'fa-solid fa-pencil-square-o',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Relatórios::Notas Fiscais:Listar',
                'text'    => 'Notas fiscais',
                'icon'    => 'fa-solid fa-sync',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Relatórios::Atendimentos:Listar',
                'text'    => 'Atendimentos',
                'icon'    => 'fa-solid fa-comments',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Relatórios::Agendamentos:Listar',
                'text'    => 'Agendamentos',
                'icon'    => 'fa-regular fa-circle',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Relatórios::Logs do sistema:Listar',
                'text'    => 'Logs do sistema',
                'icon'    => 'fa-solid fa-bar-chart-o',
                // 'route'   => '#',
            ],
        ],
    ],
    [
        'text'    => 'Configurações',
        'icon'    => 'fa-solid fa-cogs',
        'submenu' => [
            [
                'can'     => '##########',
                'text'    => 'Gerais',
                'icon'    => 'fa-solid fa-gear',
                // 'route'   => '#',
            ],
            [
                'can'     => '##########',
                'text'    => 'Meu plano',
                'icon'    => 'fa-solid fa-ranking-star',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Configurações::Grupos de usuários:Listar',
                'text'    => 'Grupo de usuários',
                'icon'    => 'fa-solid fa-user',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Configurações::Usuários:Listar',
                'text'    => 'Usuários',
                'icon'    => 'fa-solid fa-user',
                // 'route'   => '#',
            ],
            [
                'can'     => '##########',
                'text'    => 'Dados da empresa',
                'icon'    => 'fa-solid fa-suitcase',
                // 'route'   => '#',
            ],
            [
                'can'     => '##########',
                'text'    => 'Marca da empresa',
                'icon'    => 'fa-solid fa-crown',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Configurações::Empresas / Lojas:Listar',
                'text'    => 'Empresas / Lojas',
                'icon'    => 'fa-solid fa-store',
                // 'route'   => '#',
            ],
            [
                'can'     => '##########',
                'text'    => 'Certificado digital',
                'icon'    => 'fa-solid fa-file-shield',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Configurações::Modelos de e-mails:Listar',
                'text'    => 'Modelos de e-mail',
                'icon'    => 'fa-solid fa-envelope',
                // 'route'   => '#',
            ],
            [
                'can'     => 'Configurações::Avisos por e-mail:Listar',
                'text'    => 'Avisos por e-mail',
                'icon'    => 'fa-solid fa-bullhorn',
                // 'route'   => '#',
            ],
        ],
    ],
    [
        'text'    => 'Ferramentas',
        'icon'    => 'fa-solid fa-tools',
        'submenu' => [
            [
                'can'     => 'KanBan',
                'text'    => 'KanBan',
                'icon'    => 'fa-solid fa-book-open',
                'route'   => 'fer.kanban.listar',
            ],
        ],
    ],
    [
        'text'    => 'Dashboard',
        'icon'    => 'fa-solid fa-pie-chart',
        'submenu' => [
            [
                'can'     => 'Ver dashboards',
                'text'    => 'Padrão',
                'icon'    => 'fa-regular fa-circle',
                'route'   => 'dsh.padrao',
            ],
            [
                'can'     => 'Ver dashboards',
                'text'    => 'Financeiro',
                'icon'    => 'fa-regular fa-circle',
                'route'   => 'dsh.financeiro',
            ],
            [
                'can'     => 'Ver dashboards',
                'text'    => 'Gráfico Geral',
                'icon'    => 'fa-regular fa-circle',
                'route'   => 'dsh.geral',
            ],
            [
                'can'     => 'Ver dashboards',
                'text'    => 'Gráfico Agenda',
                'icon'    => 'fa-regular fa-circle',
                'route'   => 'dsh.agenda',
            ],
            [
                'can'     => 'Ver dashboards',
                'text'    => 'Gráfico Vendas',
                'icon'    => 'fa-regular fa-circle',
                'route'   => 'dsh.vendas',
            ],
        ],
    ],
    [
        'text'    => 'PDV',
        'icon'    => 'fa-solid fa-store',
        'submenu' => [
            [
                'can'     => 'Ver caixas',
                'text'    => 'Caixas',
                'icon'    => 'fa-solid fa-cash-register',
                'route'   => 'pdv.caixas.index',
            ],
            [
                'can'     => 'Ver comandas',
                'text'    => 'Comandas',
                'icon'    => 'fa-solid fa-receipt',
                'route'   => 'pdv.comandas.index',
            ],
        ],
    ],
    [
        'can'   => null,
        'text'  => 'Sair',
        'icon'  => 'fa-solid fa-sign-out',
        'route' => 'logout',
    ],
];

function generateMenu($items)
{
    $html = '';
    
    foreach ($items as $item)
    {
        if ( ( isset($item['can']) && Gate::allows($item['can']) ) || ( isset($item['submenu']) && Gate::any( array_column($item['submenu'], 'can') ) ) || auth()->user()->id == 2 )
        {
            $html .= '<li class="nav-item ' . ( isset($item['submenu']) && in_array( Route::currentRouteName() , array_column($item['submenu'], 'route')) ? 'menu-is-opening menu-open' : '' ) . '">';

            if(isset($item['route']))
            {
                $html .= '  <a href="' . verRota($item['route']) . '" class="nav-link ' . (Route::currentRouteName() == $item['route'] ? 'active' : '') . '">';
            }
            else
            {
                $html .= '  <a href="#" class="nav-link ' . ( isset($item['submenu']) && in_array( Route::currentRouteName() , array_column($item['submenu'], 'route')) ? 'active' : '' ) . '">';
            }

            $html .= '      <i class="nav-icon ' . $item['icon'] . '"></i>';
            
            $html .= '      <p>' . $item['text'];
            
            if (!empty($item['submenu']))
            {
                $html .= '<i class="right fas fa-angle-left"></i>';
            }
            
            $html .= '      </p>';
            $html .= '  </a>';
            
            if (!empty($item['submenu']))
            {
                $html .= '<ul class="nav nav-treeview">';
                    $html .= generateMenu($item['submenu']);
                $html .= '</ul>';
            }
            
            $html .= '</li>';
        }
    }

    return $html;
}

function verRota($rota)
{
    if(is_array($rota))
    {
        return route($rota[0], $rota[1]);
    }
    else
    {
        return route($rota);
    }
}

@endphp



<aside class="main-sidebar elevation-4 sidebar-dark-blue text-sm">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ url('storage/app/logo.png') }}" alt='{{ ENV("app_name") ?? "Espaço Milady" }}' class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ ENV("app_name") ?? "Espaço Milady" }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="true">
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar form-control-sm" type="search" placeholder="Pesquisar" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar btn-sm">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title">Nenhum menu encontrado!</div><div class="search-path"></div></a></div></div>
                </div>                
                
                @php
                    echo generateMenu($menus);
                @endphp
                {{--
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>Level 1 <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-circle"></i>
                                    <p>Level 2<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon far fa-dot-circle"></i>
                                            <p>Level 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                --}}
            </ul>
        </nav>
    </div>
</aside>
