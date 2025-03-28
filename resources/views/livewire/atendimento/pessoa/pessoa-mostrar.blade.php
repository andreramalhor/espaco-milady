<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Pessoa</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Atendimento</a></li>
                        <li class="breadcrumb-item active">Pessoa</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Foto de perfil</h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img src="{{ $pessoa->src_foto }}" class="profile-user-img img-fluid img-circle" style="border: solid 1px #7e7e7e; width: 320px;">
                            </div>
                            <h3 class="profile-username text-center">{{ $pessoa->apelido }}</h3>
                            <p class="text-muted text-center">{{ $pessoa->nome }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-dados_gerais' ? 'active' : '' }}"        wire:click="tabActive('tab-dados_gerais')"        href="#dados_gerais"       data-bs-toggle="tab">Dados gerais</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-painel' ? 'active' : '' }}"              wire:click="tabActive('tab-painel')"              href="#painel"             data-bs-toggle="tab">Painel</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-tipo' ? 'active' : '' }}"                wire:click="tabActive('tab-tipo')"                href="#tipo"               data-bs-toggle="tab">Tipo</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-historico' ? 'active' : '' }}"           wire:click="tabActive('tab-historico')"           href="#historico"          data-bs-toggle="tab">Histórico</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-conta_saldo' ? 'active' : '' }}"         wire:click="tabActive('tab-conta_saldo')"         href="#conta_saldo"        data-bs-toggle="tab">Conta/Saldo</a></li>
                            </ul>
                        </div>
                        <div class="card-body p-2">
                            <div class="tab-content">
                                <div class="tab-pane {{ $tab_active == 'tab-dados_gerais' ? 'active' : '' }}" id="tab-dados_gerais">
                                    @include('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-dados_gerais')
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-painel' ? 'active' : '' }}" id="tab-painel">
                                    @include('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-painel')
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-tipo' ? 'active' : '' }}" id="tab-tipo">
                                    @include('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-funcoes')
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-historico' ? 'active' : '' }}" id="tab-historico">
                                    <livewire:Atendimento.Pessoa.Auxiliar.PessoaHistorico :pessoa="$pessoa" />
                                    {{--
                                    @include('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-historico')
                                    --}}
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-conta_saldo' ? 'active' : '' }}" id="tab-conta_saldo">
                                    <livewire:Atendimento.Pessoa.Auxiliar.PessoaContaSaldo :pessoa="$pessoa" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form wire:submit.prevent="store">
                                <a href="{{  route('atd.pessoas') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>