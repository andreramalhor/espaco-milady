<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Profissionais</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Configuração</a></li>
                        <li class="breadcrumb-item active">Profissionais</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profissionais</h3>
                        </div>
                        <div class="row p-2">
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <div class="input-group-prepend" wire:click="mes_subtratir">
                                        <span class="input-group-text"><i class="fa-solid fa-angles-left"></i></span>
                                    </div>
                                    <select class="form-control text-center" wire:model.live="funcao">
                                        <option>Todos</option>
                                        @foreach(\App\Models\ACL\Funcao::orderBy('nome', 'asc')->get() as $funcao)
                                            {!! $funcao->nome != "Colaborador" ? "<option>$funcao->nome</option>" : "" !!}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append" wire:click="mes_adicionar">
                                        <div class="input-group-text"><i class="fas fa-angles-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-secondary btn-block float-right" href="https://www.espacomilady.com.br/atendimento/pessoas/criar"><i class="fa fa-plus"></i> Cadastrar nova pessoa</a>
                            </div>
                            <div class="offset-8 col-sm-2">
                                <button class="btn btn-primary btn-sm float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-filter"></i></button>
                                
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width:50%;">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="painel_agendamentos_label">Filtros</h5>
                                        <button type="button" class="btn-close" wire:click="trocar_tela" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body table-responsive p-0">
                                        <div class="row p-2">
                                            <div class="form-group">
                                                <label>Aberto entre</label>
                                                <input type="text" class="form-control " placeholder="(00) 90000-0000" wire:model="telefone">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm" type="button" wire:click="consultar">Consultar</button>
                                            </div>
                                        </div>
                                        
                                        <div class="row p-2">
                                            <div class="form-group">
                                                <label>Telefone </label>
                                                <input type="text" class="form-control " placeholder="(00) 90000-0000" wire:model="telefone">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm" type="button" wire:click="consultar">Consultar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanvas-backdrop fade show"></div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table projects">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-left">Nome<br>Apelido</th>
                                        <th class="text-left">Funções</th>
                                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($profissionais as $ciclo)
                                        <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                                            <td class="p-1 text-center">
                                                <img class="table-avatar" src="{{ $ciclo->src_foto  }}">
                                            </td>
                                            <td class="p-1 text-left">
                                                {{ $ciclo->apelido }}<br>
                                                <small>{{ $ciclo->nome }}</small>
                                            </td>
                                            <td class="p-1 text-left">
                                                <small>
                                                    {{ implode(" | ", $ciclo->kjahdkwkbewtoip()->orderBy('nome', 'asc')->pluck('nome')->toArray() ) }}
                                                </small>
                                            </td>
                                            <td class="p-1 pr-3 text-right">
                                                <a class="text-muted" style="pointer-events: auto;" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-vertical"></i>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('atd.pessoas.mostrar', $ciclo->id) }}">Sobre</a>
                                                        <a class="dropdown-item" href="{{ route('atd.pessoas.editar', $ciclo->id) }}">Editar</a>
                                                        <a class="dropdown-item" href="#" wire:click="delete({{ $ciclo->id }})">Deletar</a>
                                                    </div>
                                                </a>                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><small>Não há pessoas cadastradas</small></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>    
</div>
