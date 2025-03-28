<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Vendas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fa fa-filter"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h6>Filtros</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label>Período</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">De</span>
                                </div>
                                <input type="date" class="form-control" wire:model.live="inicio">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">à</span>
                                </div>
                                <input type="date" class="form-control" wire:model.live="final">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control" wire:model.live="p_id_cliente">
                            <option>Todos</option>
                            <option>(Cliente não cadastrado)</option>
                            @foreach(\App\Models\Atendimento\Pessoa::orderBy('apelido', 'asc')->get() as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->apelido }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive p-0">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Data</th>
                        <th class="text-left">Cliente</th>
                        <th class="text-left">Serviço / Produto</th>
                        <th class="text-left">Profissional</th>
                        <th class="text-right">Valor</th>
                        <th class="text-right">Comissão</th>
                        <th class="text-right pr-3">Lucro</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $comissao = 0;
                        $lucro    = 0;
                    @endphp
                    @forelse($vendas as $ciclo)
                    @php
                        $comissao = $comissao + $ciclo->hgihnjekboyabez->valor;
                        $lucro    = $lucro + ($ciclo->vlr_final - $ciclo->hgihnjekboyabez->valor);
                    @endphp
                    <tr>
                        <td class="p-0 text-center">
                            <small>{{ $ciclo->id }}</small>
                        </td>
                        <td class="p-0 text-center">
                            {{ \Carbon\Carbon::parse($ciclo->created_at)->format('d/m/Y') }}
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            {{ $ciclo->sbbgaqleesuzlus->id_cliente == 0 ? '(Cliente não cadastrado)' : ($ciclo->vekwjqowidskjsd->apelido ?? $ciclo->lufqzahwwexkxli->id_cliente)  }}
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            {{ $ciclo->kcvkongmlqeklsl->nome }}
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            {{ isset($ciclo->flielwjewjdasld->apelido) ? $ciclo->flielwjewjdasld->apelido : '' }}
                        </td>
                        <td class="p-0 text-right">
                            {{ number_format( $ciclo->vlr_final, 2, ',', '.') }}
                        </td>
                        <td class="p-0 text-right">
                            {{ number_format($ciclo->hgihnjekboyabez->valor, 2, ',', '.') }}
                        </td>
                        <td class="p-0 text-right pr-3">
                            {{ number_format($ciclo->vlr_final - $ciclo->hgihnjekboyabez->valor , 2, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center"><small>Não há vendas no período</small></td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">{{ $vendas->count() }}</th>
                        <th class="text-center"></th>
                        <th class="text-left"></th>
                        <th class="text-left"></th>
                        <th class="text-left"></th>
                        <th class="text-right">{{ number_format( $vendas->sum('vlr_final'), 2, ',', '.') }}</th>
                        <th class="text-right">{{ number_format( $comissao, 2, ',', '.') }}</th>
                        <th class="text-right pr-3">{{ number_format( $lucro, 2, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $vendas->links() }}
            </div>
        </div>
    </div>

</div>
