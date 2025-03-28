<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produtos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Catálogo</a></li>
                        <li class="breadcrumb-item active">Produto</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ $produto->src_foto }}" alt="User profile picture"  data-bs-tooltip="tooltip" data-bs-title="{{ $produto->apelido }}">
                            </div>
                            <h3 class="profile-username text-center">{{ $produto->nome }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-painel' ? 'active' : '' }}"             wire:click="tabActive('tab-painel')"              href="#painel"             data-bs-toggle="tab">Painel</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-sobre' ? 'active' : '' }}"              wire:click="tabActive('tab-sobre')"               href="#sobre"              data-bs-toggle="tab">Sobre</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-entradas' ? 'active' : '' }}"           wire:click="tabActive('tab-entradas')"            href="#entradas"           data-bs-toggle="tab">Entradas</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-saidas' ? 'active' : '' }}"             wire:click="tabActive('tab-saidas')"              href="#saidas"             data-bs-toggle="tab">Saídas</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-agendamentos' ? 'active' : '' }}"       wire:click="tabActive('tab-agendamentos')"        href="#agendamentos"       data-bs-toggle="tab">Agendamentos</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-vendas' ? 'active' : '' }}"             wire:click="tabActive('tab-vendas')"              href="#vendas"             data-bs-toggle="tab">Comandas</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-historico' ? 'active' : '' }}"          wire:click="tabActive('tab-historico')"           href="#historico"          data-bs-toggle="tab">Histórico</a></li>
                                @can('###############')
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-financeiro' ? 'active' : '' }}"         wire:click="tabActive('tab-financeiro')"          href="#financeiro"         data-bs-toggle="tab">Financeiro</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-comissoes_produtos' ? 'active' : '' }}" wire:click="tabActive('tab-comissoes_produtos')"  href="#comissoes_produtos" data-bs-toggle="tab">Comissões Produtos</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-comissoes_servicos' ? 'active' : '' }}" wire:click="tabActive('tab-comissoes_servicos')"  href="#comissoes_servicos" data-bs-toggle="tab">Comissões Serviços</a></li>
                                @endcan
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-tipo' ? 'active' : '' }}"               wire:click="tabActive('tab-tipo')"                href="#tipo"               data-bs-toggle="tab">Tipo</a></li>
                            </ul>
                        </div>
                        <div class="card-body p-2">
                            <div class="tab-content">
                                <div class="tab-pane {{ $tab_active == 'tab-painel' ? 'active' : '' }}" id="tab-painel">
                                    {{--
                                    @livewire('Catalogo.Produto.Auxiliar.ProdutoPainel', ['produto' => $produto])
                                    --}}    
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-sobre' ? 'active' : '' }}" id="tab-sobre">
                                    <h1>sobre</h1>
                                    {{--
                                    @include('livewire.catalogo.produto.show.01_inc_mostrar_sobre')
                                    --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-entradas' ? 'active' : '' }}" id="tab-entradas">
                                    <h6>entradas</h6>
                                    {{--
                                    @livewire('Catalogo.Produto.Auxiliar.ProdutoEntradas', ['produto' => $produto])
                                    --}}    
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-saidas' ? 'active' : '' }}" id="tab-saidas">
                                    <h6>Saídas</h6>
                                    {{--
                                    @livewire('Catalogo.Produto.Auxiliar.ProdutoSaidas', ['produto' => $produto])
                                    --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-agendamentos' ? 'active' : '' }}" id="tab-agendamentos">
                                    <h1>agendamentos</h1>
                                {{--
                                    @livewire('Catalogo.Produto.Auxiliar.ProdutoAgendamentos', ['produto' => $produto])
                                    --}}    
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-financeiro' ? 'active' : '' }}" id="tab-financeiro">
                                    <h1>financeiro</h1>
                                    {{-- @include('livewire.catalogo.produto.show.inc_mostrar_financeiro') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-vendas' ? 'active' : '' }}" id="tab-vendas">
                                    <h1>vendas</h1>
                                {{--
                                    @livewire('Catalogo.Produto.Auxiliar.ProdutoComandas', ['produto' => $produto])
                                    --}}    
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-historico' ? 'active' : '' }}" id="tab-historico">
                                    <h1>Histórico</h1>
                                    <livewire:Catalogo.Produto.Auxiliar.ProdutoHistorico :produto="$produto" />
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-comissoes_produtos' ? 'active' : '' }}" id="tab-comissoes_produtos">
                                    <h1>comissoes_produtos</h1>
                                    {{-- @include('livewire.catalogo.produto.show.inc_mostrar_comissoes_p') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-comissoes_servicos' ? 'active' : '' }}" id="tab-comissoes_servicos">
                                    <h1>comissoes_servicos</h1>
                                    {{-- @include('livewire.catalogo.produto.show.inc_mostrar_comissoes_s') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-tipo' ? 'active' : '' }}" id="tab-tipo">
                                    <h1>tipo</h1>
                                {{--
                                    @livewire('Catalogo.Produto.Auxiliar.ProdutoFuncoes', ['produto' => $produto])
                                    --}}    
                                    {{-- @include('livewire.catalogo.produto.show.02_inc_mostrar_tipo') --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>