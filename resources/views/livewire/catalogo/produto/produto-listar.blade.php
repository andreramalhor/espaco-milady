<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Produto</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <div class="row p-2">
                <div class="col-md-2">
                    <a class="btn btn-secondary btn-block btn-sm float-right" href="{{ route('cat.produtos.criar') }}"><i class="fa fa-plus"></i> Cadastrar novo produto</a>
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
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        {{-- <th class="text-center"></th> --}}
                        <th class="text-left">Nome<br><small>Descrição</small></th>
                        <th class="text-left">Marca</th>
                        <th class="text-left">Categoria</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td></td> --}}
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_nome" placeholder="Nome ou descrição"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_marca" placeholder="Marca"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_categoria" placeholder="Categoria"></td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse ($produtos as $ciclo)
                        <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                            {{-- 
                            <td class="p-1 text-center">
                                <img class="direct-chat-img px-1" src="{{ $ciclo->src_foto  }}">
                            </td>
                            --}}
                            <td class="p-1 text-left">
                                {{ $ciclo->nome }}
                                <br><small>{{ $ciclo->descricao }}</small>
                            </td>
                            <td class="p-1 text-left">{{ $ciclo->marca }}</td>
                            <td class="p-1 text-left">{{ $ciclo->categoria }}</td>
                            <td class="p-1 text-right">
                                <div class="btn-group">
                                    <a href="#" data-bs-toggle="dropdown"><span class="badge bg-info dropdown-toggle dropdown-icon">Ações  </span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('cat.produtos.mostrar', $ciclo->id) }}">Sobre</a>
                                        <a class="dropdown-item" href="{{ route('cat.produtos.editar', $ciclo->id) }}">Editar</a>
                                        <a class="dropdown-item" href="{{ route('cat.produtos.comissoes', $ciclo->id) }}">Comissões</a>
                                        <a class="dropdown-item" href="#" wire:click="delete({{ $ciclo->id }})">Deletar</a>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center"><small>Não há produtos cadastradas</small></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $produtos->links() }}
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
        <script>
            window.addEventListener('produtoDeleted', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
