<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Relatorio de Estoque</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Relatórios</a></li>
                        <li class="breadcrumb-item">Estoque</li>
                        <li class="breadcrumb-item active">Sitação</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Relatórios do estoque</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th class="text-left">Nome</th>
                                        <th class="text-right">Entradas</th>
                                        <th class="text-right">Saídas</th>
                                        <th class="text-right">Estoque atual</th>
                                        <th class="text-right">Custo estoque</th>
                                        <th class="text-right">Venda média dia</th>
                                        <th class="text-right">Estoque mínimo</th>
                                        {{-- <th>Estoque Atual</th> --}}
                                        {{-- <th style="width: 40px">Label</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos->sortBy('nome') as $produto)
                                    @php($soma_saida = 1)
                                    @php($primeira_saida = \Carbon\Carbon::parse(optional($produto->weriwjerihdwhsq()->orderBy('created_at', 'asc')->first())->created_at))
                                    @php($ultima_saida = \Carbon\Carbon::parse(optional($produto->weriwjerihdwhsq()->orderBy('created_at', 'desc')->first())->created_at))
                                    @php($diferenca_dias = $primeira_saida->diffInDays($ultima_saida))
                                    <tr>
                                        <td>{{ $produto->id }}</td>
                                        <td class="p-1 text-left">
                                            <img class="table-avatar" src="{{ $produto->src_foto }}">
                                            {{ $produto->nome }}</td>
                                        <td class="text-right">{{ number_format(1, 0, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($produto->weriwjerihdwhsq->sum('qtd'), 0, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($produto->estoque_atual, 0, ',', '.') }}</td>
                                        <td class="text-right">
                                            {{ number_format($produto->custo_estoque, 2, ',', '.') }}
                                            <br><small>Custo unit. R$ {{ number_format($produto->vlr_custo ?? 0, 2, ',', '.') }}</small>
                                        </td>
                                        <td class="text-right">{{ number_format($diferenca_dias == 0 ? 0 : ($soma_saida / $diferenca_dias ), 0, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($diferenca_dias == 0 ? 0 : ($soma_saida / $diferenca_dias * 15), 0, ',', '.') }}</td>
                                        {{-- <td>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">{{ number_format($total_estoque ?? 888, 0, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($custo_estoque ?? 999, 2, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="float-right">                                
                                {{ $produtos->links() }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <form wire:submit.prevent="gravarTudo">
                                <a href="{{  route('cat.saidas') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>
