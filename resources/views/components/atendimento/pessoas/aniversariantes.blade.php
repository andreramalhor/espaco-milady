<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-cake-candles mr-1"></i>
            Aniversariantes de hoje
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Telefone</th>
                        <th class="text-center">Dt nascimento</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aniversariantes as $aniversariante)
                    <tr>
                        <td class="text-center">{{ $aniversariante->apelido }}</td>
                        <td class="text-center">{{ $aniversariante->telefone1 }}</td>
                        <td class="text-center">{{ $aniversariante->dt_nascimento }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Não há aniversariantes no dia de hoje.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
    </div>
</div>
