<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Função: {{ $funcao->nome}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Configuração</a></li>
                        <li class="breadcrumb-item">Acessos</li>
                        <li class="breadcrumb-item active">Funções</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @forelse($permissoes->sortBy('grupo')->groupBy('grupo') as $grupo => $grupoPermissao)
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{ $grupo }}</h3>
                        </div>
                        <div class="card-body p-0">
                            @forelse($grupoPermissao as $permissao)
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    <div class="product-img">
                                        <input class="p-0" type="checkbox" id="id_{{ $permissao->id }}" wire:click="togglePermissao({{ $permissao->id }}, {{ $funcao->id }})" {{ $permissao->dzjvxinawjwtnfa->contains($funcao->id) ? 'checked=""' : '' }}>
                                    </div>
                                    <div class="product-info ml-4">
                                        <span class="product-title">
                                            <label class="form-check-label" for="id_{{ $permissao->id }}">{{ $permissao->descricao }}</label>
                                        </span>
                                        <span class="product-description">
                                            {{ $permissao->nome }}
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            @empty
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <li class="item">
                                    Não tem nada.
                                </li>
                            </ul>
                            @endforelse
                        </div>                          
                    </div>
                </div>
                @empty
                <h1>Não há permissoes cadastradas.</h1>
                @endforelse
                <p class="text-muted"><font size="2,8">Não há endereços cadastrados.</font></p>
            </div>
        </div>
    </section>
</div>