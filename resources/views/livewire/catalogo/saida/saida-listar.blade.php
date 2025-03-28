<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Saídas</h3>
        </div>
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="col-md-2">
                    <a class="btn btn-secondary btn-block btn-sm float-right" href="{{ route('cat.saidas.criar') }}"><i class="fa fa-plus"></i> Cadastrar nova saída</a>
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
                        <th class="text-left">Data Saída</th>
                        <th class="text-left">Destino</th>
                        <th class="text-center">Qtd produtos</th>
                        <th class="text-center">Qtd itens</th>
                        <th class="text-center">Status</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($saidas as $ciclo)
                        <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                            <td class="p-1 text-left">{{ \Carbon\Carbon::parse($ciclo->dt_saida)->format('d/m/Y') }}</td>
                            <td class="p-1 text-left">{{ $ciclo->fornecedor }}</td>
                            <td class="p-1 text-center">{{ $ciclo->lkerwiucqwbnlks->count() }}</td>
                            <td class="p-1 text-center">{{ $ciclo->lkerwiucqwbnlks->sum('qtd') }}</td>
                            <td class="p-1 text-center">{{ $ciclo->status }}</td>
                            <td class="p-1 text-right">
                                <div class="btn-group">
                                    <a href="#" data-bs-toggle="dropdown"><span class="badge bg-info dropdown-toggle dropdown-icon">Ações  </span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('cat.saidas.mostrar', $ciclo->id) }}">Sobre</a>
                                        @if($ciclo->status != "Finalizado")
                                        <a class="dropdown-item" href="{{ route('cat.saidas.retirar-produtos', $ciclo->id) }}">Adicionar produtos</a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('cat.saidas.ver-produtos', $ciclo->id) }}">Ver produto</a>
                                        @endif
                                        <a class="dropdown-item" wire:click="finalizar({{ $ciclo->id }})">Finalizar</a>
                                        <a class="dropdown-item" wire:click="delete({{ $ciclo->id }})">Deletar</a>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"><small>Não há saidas cadastradas</small></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $saidas->links() }}
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
        <script>
            window.addEventListener('SaidaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
