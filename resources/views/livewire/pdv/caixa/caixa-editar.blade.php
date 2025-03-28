<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Editar caixa: {{ $apelido }}</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">PDV</a></li>
                        <li class="breadcrumb-item">Caixa</li>
                        <li class="breadcrumb-item active">Editar</li>
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
                                <img src="{{ is_string($foto) ? $foto : $foto->temporaryUrl() }}" class="profile-user-img img-fluid img-circle" style="border: solid 1px #7e7e7e; width: 320px;">
                            </div>
                            <br>&nbsp;
                            {{-- 
                                <div class="col-12 align-self-center">
                                    <input type="file" wire:model.live="foto" class="btn btn-primary btn-block">
                                    <span class="text-danger">@error('foto') {{ $message }} @enderror</span>
                                </div>
                            --}}
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-dados_gerais' ? 'active' : '' }}"        wire:click="tabActive('tab-dados_gerais')"        href="#dados_gerais"       data-bs-toggle="tab">Dados gerais</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-contato' ? 'active' : '' }}"             wire:click="tabActive('tab-contato')"             href="#contato"            data-bs-toggle="tab">Contato</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-endereco' ? 'active' : '' }}"            wire:click="tabActive('tab-endereco')"            href="#endereco"           data-bs-toggle="tab">Endereço</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-tipo' ? 'active' : '' }}"                wire:click="tabActive('tab-tipo')"                href="#tipo"               data-bs-toggle="tab">Tipo</a></li>
                                @if($tipo->contains(2))
                                    <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-usuario_sistema' ? 'active' : '' }}" wire:click="tabActive('tab-usuario_sistema')"     href="#usuario_sistema"    data-bs-toggle="tab">Usuário do sistema</a></li>
                                @endif
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-obs' ? 'active' : '' }}"                 wire:click="tabActive('tab-obs')"                 href="#obs"                data-bs-toggle="tab">Observação</a></li>
                            </ul>
                        </div>
                        <div class="card-body p-2">
                            <div class="tab-content">
                                <div class="tab-pane {{ $tab_active == 'tab-dados_gerais' ? 'active' : '' }}" id="tab-dados_gerais">
                                    @include('livewire.pdv.caixa.auxiliar.caixa-editar-dados_gerais')
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-contato' ? 'active' : '' }}" id="tab-contato">
                                    @include('livewire.pdv.caixa.auxiliar.caixa-editar-contato')
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-endereco' ? 'active' : '' }}" id="tab-endereco">
                                    @include('livewire.pdv.caixa.auxiliar.caixa-editar-endereco')
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-tipo' ? 'active' : '' }}" id="tab-tipo">
                                    @include('livewire.pdv.caixa.auxiliar.caixa-editar-funcoes')
                                </div>
                                @if($tipo->contains(2))
                                <div class="tab-pane {{ $tab_active == 'tab-usuario_sistema' ? 'active' : '' }}" id="tab-usuario_sistema">
                                    @include('livewire.pdv.caixa.auxiliar.caixa-editar-sistema')
                                </div>
                                @endif
                                <div class="tab-pane {{ $tab_active == 'tab-obs' ? 'active' : '' }}" id="tab-obs">
                                    @include('livewire.pdv.caixa.auxiliar.caixa-editar-observacao')
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form wire:submit.prevent="edit">
                                <a href="{{  route('atd.caixas') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-primary float-right">Editar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>