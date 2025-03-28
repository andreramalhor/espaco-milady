<div>
    {{-- 
    <div class="row">
        <div class="col-3">
            @include('livewire.catalogo.saida.auxiliar.foto_perfil')
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    @include('livewire.catalogo.saida.auxiliar.dados_gerais')
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    @include('livewire.catalogo.saida.auxiliar.contato')
                </div>
                <div class="col-9">
                    @include('livewire.catalogo.saida.auxiliar.endereco')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- 
                    @include('livewire.catalogo.saida.auxiliar.tipo_Compra')
                 --}}
                {{-- 

            </div>
            <div class="col-6">
                @include('livewire.catalogo.saida.auxiliar.observacao')
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-footer">
            <form wire:submit.prevent="edit">
                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                <button type="submit" class="btn btn-sm btn-default">Cancelar</button>
            </form>
        </div>
    </div>
    --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Saida</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Catalogo</a></li>
                        <li class="breadcrumb-item active">Saida</li>
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
                                <img class="profile-user-img img-fluid img-circle" src="{{ $saida->src_foto }}" alt="User profile picture"  data-bs-tooltip="tooltip" data-bs-title="{{ $saida->apelido }}">
                            </div>
                            <h3 class="profile-username text-center">{{ $saida->apelido }}</h3>
                            <p class="text-muted text-center">{{ $saida->nome }}</p>
                            <hr>
                            <span class="text-center">
                                <strong><i class="fas fa-birthday-cake mr-1"></i> Dt Nascimento</strong>
                                @if(isset($saida->dt_nascimento))
                                <p class="text-muted" style="margin-bottom: 8px;"><font size="2,8">{{ \Carbon\Carbon::parse($saida->dt_nascimento)->format('d/m/Y') }} ({{ \Carbon\Carbon::parse($saida->dt_nascimento)->age }} anos)</font></p>
                                @else
                                <p class="text-muted" style="margin-bottom: 8px;"><font size="2,8"> - </font></p>
                                @endif
                            </span>
                            <span class="text-center">
                                <strong><i class="far fa-id-card mr-1"></i>CPF / CNPJ</strong>
                                <p class="text-muted" style="margin-bottom: 8px;"><font size="2,8">{{ $saida->cpf ?? "-" }}</font></p>
                            </span>
                            <span class="text-center">
                                <strong><i class="far fa-file-alt mr-1"></i> Observação</strong>
                                <p class="text-muted" style="margin-bottom: 8px;"><font size="2,8">{{ $saida->observacao ?? "-" }}</font></p>
                            </span>
                            <span class="text-center">
                                <strong><i class="far fa-file-alt mr-1"></i> Saldo</strong>
                                <p class="text-muted" style="margin-bottom: 8px;"><font size="2,8">{{ number_format($saida->saldo_conta ?? 0, 2, ',', '.') }}</font></p>
                            </span>
                        </div>
                    </div>
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Sobre</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-phone mr-1"></i> Contatos</strong>
                            @if($saida->telefone1 || $saida->telefone2)
                                @if($saida->telefone1)
                                <p class="text-muted" style="margin-bottom: 2px">
                                    <font size="2">
                                        <span style="font-size: 7px;"><i class="fas fa-circle fa-xs"></i></span>{{ $saida->telefone1 }}
                                        <a class="float-right btn btn-default btn-xs" href="https://api.whatsapp.com/send?phone=55{{ $saida->telefone1 }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                    </font>
                                </p>
                                @endif
                                @if($saida->telefone2)
                                <p class="text-muted" style="margin-bottom: 2px">
                                    <font size="2">
                                        <span style="font-size: 7px;"><i class="fas fa-circle fa-xs"></i></span>{{ $saida->telefone1 }}
                                        <a class="float-right btn btn-default btn-xs" href="https://api.whatsapp.com/send?phone=55{{ $saida->telefone1 }}" target="_black" data-bs-tooltip="tooltip" data-bs-title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                    </font>
                                </p>
                                @endif
                            @else
                                <p class="text-muted"><font size="2,8">Não há contatos cadastrados.</font></p>
                            @endif
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Localização</strong>
                            @if($saida->endereco)
                            <p class="text-muted" style="margin-bottom: 2px">
                                <font size="2">
                                    <span style="font-size: 7px;"><i class="fas fa-circle fa-xs"></i></span>
                                    {{ $saida->logradouro }}, {{ $saida->numero }} {{ $saida->complemento != null ? "(".$saida->complemento.")" : "" }} - {{ $saida->bairro }} <br>
                                    {{ $saida->cidade }} - {{ $saida->uf }}
                                </font>
                            </p>
                            @else
                            <p class="text-muted"><font size="2,8">Não há endereços cadastrados.</font></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-sobre' ? 'active' : '' }}"              wire:click="tabActive('tab-sobre')"               href="#sobre"              data-bs-toggle="tab">Sobre</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-painel' ? 'active' : '' }}"             wire:click="tabActive('tab-painel')"              href="#painel"             data-bs-toggle="tab">Painel</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-agendamentos' ? 'active' : '' }}"       wire:click="tabActive('tab-agendamentos')"        href="#agendamentos"       data-bs-toggle="tab">Agendamentos</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-vendas' ? 'active' : '' }}"             wire:click="tabActive('tab-vendas')"              href="#vendas"             data-bs-toggle="tab">Comandas</a></li>
                                @can('###############')
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-financeiro' ? 'active' : '' }}"         wire:click="tabActive('tab-financeiro')"          href="#financeiro"         data-bs-toggle="tab">Financeiro</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-comissoes_produtos' ? 'active' : '' }}" wire:click="tabActive('tab-comissoes_produtos')"  href="#comissoes_produtos" data-bs-toggle="tab">Comissões Produtos</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-comissoes_servicos' ? 'active' : '' }}" wire:click="tabActive('tab-comissoes_servicos')"  href="#comissoes_servicos" data-bs-toggle="tab">Comissões Serviços</a></li>
                                @endcan
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-tipo' ? 'active' : '' }}"               wire:click="tabActive('tab-tipo')"                href="#tipo"               data-bs-toggle="tab">Tipo</a></li>
                                @if($this->Saida->kjahdkwkbewtoip->contains('nome', 'Usuário do sistema'))
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-usuario_sistema' ? 'active' : '' }}"    wire:click="tabActive('tab-usuario_sistema')"     href="#usuario_sistema"    data-bs-toggle="tab">Usuário do Sistema</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="card-body p-2">
                            <div class="tab-content">
                                <div class="tab-pane {{ $tab_active == 'tab-sobre' ? 'active' : '' }}" id="tab-sobre">
                                    {{-- @include('livewire.catalogo.saida.show.01_inc_mostrar_sobre') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-painel' ? 'active' : '' }}" id="tab-painel">
                                    {{-- @include('livewire.catalogo.saida.show.02_inc_mostrar_painel') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-agendamentos' ? 'active' : '' }}" id="tab-agendamentos">
                                    @livewire('Catalogo.Saida.Auxiliar.CompraAgendamentos', ['saida' => $saida])
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-financeiro' ? 'active' : '' }}" id="tab-financeiro">
                                    <h1>financeiro</h1>
                                    {{-- @include('livewire.catalogo.saida.show.inc_mostrar_financeiro') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-vendas' ? 'active' : '' }}" id="tab-vendas">
                                    @livewire('Catalogo.saida.Auxiliar.CompraComandas', ['saida' => $saida])
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-comissoes_produtos' ? 'active' : '' }}" id="tab-comissoes_produtos">
                                    <h1>comissoes_produtos</h1>
                                    {{-- @include('livewire.catalogo.saida.show.inc_mostrar_comissoes_p') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-comissoes_servicos' ? 'active' : '' }}" id="tab-comissoes_servicos">
                                    <h1>comissoes_servicos</h1>
                                    {{-- @include('livewire.catalogo.saida.show.inc_mostrar_comissoes_s') --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-tipo' ? 'active' : '' }}" id="tab-tipo">
                                    @livewire('Catalogo.saida.Auxiliar.CompraFuncoes', ['saida' => $saida])
                                    {{-- @include('livewire.catalogo.saida.show.02_inc_mostrar_tipo') --}}
                                </div>
                                @if($this->Saida->kjahdkwkbewtoip->contains('nome', 'Usuário do sistema'))
                                <div class="tab-pane {{ $tab_active == 'tab-usuario_sistema' ? 'active' : '' }}" id="tab-usuario_sistema">
                                    @livewire('Catalogo.saida.Auxiliar.CompraSistema', ['saida' => $saida])
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>