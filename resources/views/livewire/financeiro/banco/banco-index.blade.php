<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="overlay d-none" wire:loading.class="d-block"></div>
            <div class="card-header">
                <h3 class="card-title">Bancos</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <div class="row p-2">
                    <div class="offset-md-8 col-md-2">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control float-right" placeholder="Pesquisar" wire:model.live="pesquisar">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-secondary btn-block btn-sm float-right" href="{{ route('fin.bancos.criar') }}"><i class="fa fa-plus"></i> Cadastrar banco</a>
                    </div>
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-left">Nome</th>
                            <th class="text-center">Nº Banco</th>
                            <th class="text-center">Nº Agência</th>
                            <th class="text-center">Nº Conta</th>
                            <th class="text-right">Saldo Atual</th>
                            <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bancos as $ciclo)
                        <tr wire:key="{{ $ciclo->id }}">
                            <td class="p-1 text-center">{{ $ciclo->id }}</td>
                            <td class="p-1 text-left">{{ $ciclo->nome }}</td>
                            <td class="p-1 text-center">{{ $ciclo->num_banco }}</td>
                            <td class="p-1 text-center">{{ $ciclo->num_agencia }}</td>
                            <td class="p-1 text-center">{{ $ciclo->num_conta }}</td>
                            <td class="p-1 text-right">{{ number_format($ciclo->saldo_atual, 2, ',', '.') }}</td>
                            <td class="p-1 text-right">
                                <div class="btn-group">
                                    <a href="{{ route('fin.bancos.extrato', $ciclo->id) }}" class="btn btn-default btn-xs"><i class="fa-solid fa-receipt"></i></a>
                                    <a href="{{ $ciclo->id }}" class="btn btn-default btn-xs"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    <a href="{{ $ciclo->id }}" class="btn btn-default btn-xs"><i class="fas fa-edit"></i></a>
                                    <a href="{{ $ciclo->id }}" class="btn btn-default btn-xs"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center"><small>Não há bancos cadastradas</small></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="float-right">
                    {{ $bancos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
