<div>
    <div class="card">
        <!-- <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div> -->
        <div class="card-header">
            <h3 class="card-title">Permissões</h3>
        </div>
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="offset-4 col-4">
                    <div class="form-group">
                        <label for="id_pessoa">Permissões</label>
                        <select class="form-control form-control-sm @error('id_pessoa') is-invalid @enderror" wire:model.live="id_pessoa">
                            <option value="">Selecione a pessoa</option>
                            @foreach(\App\Models\Atendimento\Pessoa::colaboradores()->orderBy('nome')->get() as $ciclo)
                            <option value="{{ $ciclo->id }}">{{ $ciclo->apelido }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @can('###############')
                <div class="offset-2 col-2">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <a href="{{ route('cfg.permissoes.criar') }}" class="btn btn-block btn-primary btn-sm">Nova Permissão</a>
                    </div>
                </div>
                @endcan
            </div>
        </div>
        <div class="card-body p-2">
            <div class="row">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 10px">
                            <th>Ordem</th>
                            <th>Nome</th>
                            <th>Menu</th>
                            <th>Descrição</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissoes->sortBy('grupo')->groupBy('grupo') as $grupo => $grupo_permissao)
                        <tr class="bg-gray">
                            <th colspan="6">{{ $grupo }}</th>
                        </tr>
                            @foreach ($grupo_permissao->sortBy('ordem') as $permissao)
                            <tr>
                                <td style="width: 10px">
                                    @if($id_pessoa == "")
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" disabled="">
                                        <label class="custom-control-label"></label>
                                    </div>
                                    @else
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="permissao_{{ $permissao->nome }}" wire:click="update_permissao({{ $permissao }}, $event.target.checked)"
                                        @if($permissao->aewluaerqwnisdq->contains('id', $id_pessoa))
                                        checked
                                        @endif
                                        >
                                        <label class="custom-control-label" for="permissao_{{ $permissao->nome }}"></label>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $permissao->ordem }}</td>
                                <td>{{ $permissao->nome }}</td>
                                <td>{{ $permissao->menu }}</td>
                                <td>{{ $permissao->descricao }}</td>
                                <td>
                                    <a href="{{ route( 'cfg.permissoes.editar', $permissao->id ) }}"><i class="fas fa-edit"></i></a>
                                    <a href="#" wire:click="delete({{ $permissao->id }})"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="float-right">
                    asas
                </div>
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
        <script>
            window.addEventListener('pessoaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
