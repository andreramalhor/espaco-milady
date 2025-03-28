<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Curva ABC</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Relatórios</a></li>
                        <li class="breadcrumb-item active">Curva ABC</li>
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
                            <h3 class="card-title">Curva ABC</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-striped projects">
                                <thead>
                                    <tr>
                                        <th class="text-left">Nome</th>
                                        <th class="text-right">Valor Unitário</th>
                                        <th class="text-center">Quantidade de Vendas</th>
                                        <th class="text-right">Valor Total</th>
                                        <th class="text-center">Participação em %</th>
                                        <th class="text-center">Participação em % Acumulada</th>
                                        <th class="text-center">Curva ABC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $particip_custo_estoque_acumu = 1;
                                        $custo_total_estoque = 1;
                                    @endphp
                                    @forelse($produtos->sortByDesc(function ($produto) use ($custo_total_estoque)
                                    {
                                        return ( $produto->vlr_custo * $produto->estoque_atual ) == 0 ? 0 : ( $produto->vlr_custo * $produto->estoque_atual ) / $custo_total_estoque * 100;
                                    }) as $produto)
                                    @php
                                        $particip_custo_estoque = ( $produto->vlr_custo * $produto->estoque_atual ) == 0 ? 0 : ( $produto->vlr_custo * $produto->estoque_atual ) / $custo_total_estoque * 100;
                                        $particip_custo_estoque_acumu = $particip_custo_estoque + $particip_custo_estoque_acumu;
                                    @endphp
                                    <tr>
                                        <td class="p-1 text-left">
                                            <img class="table-avatar" src="{{ $produto->src_foto }}">
                                            {{ $produto->nome }}
                                        </td>
                                        <td class="text-right">{{ number_format($produto->vlr_custo, 2, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($produto->estoque_atual, 0, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($produto->vlr_custo * $produto->estoque_atual, 2, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($particip_custo_estoque, 1, ',', '.') }} %</td>
                                        <td class="text-right">{{ number_format($particip_custo_estoque_acumu, 1, ',', '.') }} %</td>
                                        <td class="text-center"><b>
                                            @switch($particip_custo_estoque_acumu)
                                                @case($particip_custo_estoque_acumu <= 80 )
                                                    A
                                                    @break
                                                @case($particip_custo_estoque_acumu > 80 && $particip_custo_estoque_acumu <= 95 )
                                                    B
                                                    @break
                                                @case($particip_custo_estoque_acumu > 95 )
                                                    C
                                                    @break
                                            @endswitch
                                        </b>
                                    </td>
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
                                        <td class="text-right">{{ number_format($produtos->sum('estoque_atual'), 0, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($produtos->sum('custo_estoque'), 2, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
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