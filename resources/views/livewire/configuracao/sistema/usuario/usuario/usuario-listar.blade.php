<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Usuários do sistema</h3>
        </div>
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="col-md-2">
                    <a class="btn btn-secondary btn-block btn-sm float-right" href="{{ route('cfg.usuarios.criar') }}"><i class="fa fa-plus"></i> Cadastrar novo usuário</a>
                </div>
                <div class="offset-md-8 col-md-2">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control float-right"  placeholder="Pesquisar" wire:model.live.debounce.200ms="p_pesquisar" >
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-condensed">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-left">Nome</th>
                        <th class="text-left">E-mail</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_nome" placeholder="Nome"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_email" placeholder="E-mail"></td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse ($usuarios as $ciclo)
                        <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                            <td class="p-1 text-center">
                                <img class="direct-chat-img px-1" src="{{ optional($ciclo->sdfjsefbdjfhufe)->src_foto }}">
                            </td>
                            <td class="p-1 text-left">
                                <small>{{ $ciclo->name }}</small>
                            </td>
                            <td class="p-1 text-left">{{ $ciclo->email }}</td>
                            <td class="p-1 text-right">
                                <div class="btn-group">
                                    <a href="#" data-bs-toggle="dropdown"><span class="badge bg-info dropdown-toggle dropdown-icon">Ações  </span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('cfg.usuarios.mostrar', $ciclo->id) }}">Sobre</a>
                                        <a class="dropdown-item" href="{{ route('cfg.usuarios.editar', $ciclo->id) }}">Editar</a>
                                        <livewire:Configuracao.Sistema.Usuario.BBBBDeletar :usuario="$ciclo" :wire:key="'delete-usuario-'. $ciclo->id" class="dropdown-item" />
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"><small>Não há usuários cadastrados</small></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{-- $usuarios->links() --}}
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
        <script>
            window.addEventListener('usuarioDeleted', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
