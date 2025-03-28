<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Editar permissão</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Configuração</a></li>
                        <li class="breadcrumb-item">Sistema</li>
                        <li class="breadcrumb-item">Permissão</li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="edit">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Editar permissão: {{ $permissao->nome }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" wire:model.live="nome">
                                        @error('nome')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="grupo">Grupo</label>
                                        <select class="form-control form-control-sm @error('grupo') is-invalid @enderror" wire:model.live="grupo">
                                            <option value="">Selecione a pessoa</option>
                                            @foreach(\App\Models\ACL\Permissao::orderBy('grupo')->distinct()->select('grupo')->get() as $ciclo)
                                            <option value="{{ $ciclo->grupo }}">{{ $ciclo->grupo }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="form-control form-control-sm @error('nivel') is-invalid @enderror" wire:model.live="grupo">
                                        @error('grupo')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="nivel">Nível</label>
                                        <input type="text" class="form-control form-control-sm @error('nivel') is-invalid @enderror" wire:model.live="nivel">
                                        @error('nivel')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="ordem">Ordem</label>
                                        <input type="text" class="form-control form-control-sm @error('ordem') is-invalid @enderror" wire:model.live="ordem">
                                        @error('ordem')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="menu">Menu</label>
                                        <input type="text" class="form-control form-control-sm @error('menu') is-invalid @enderror" wire:model.live="menu">
                                        @error('menu')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <input type="text" class="form-control form-control-sm @error('descricao') is-invalid @enderror" wire:model.live="descricao">
                                        @error('descricao')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form wire:submit.prevent="edit">
                                <a href="{{  route('cfg.permissoes.index') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-primary float-right">Editar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>
