<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Vendas</h3>
        </div>
        
        <div class="card-body p-2">
            @can('###############')
            <div class="row">
                <div class="offset-10 col-2 form-group">
                    <a href="{{ route('com.vendas.criar') }}" class="btn btn-block btn-primary btn-sm">Nova venda</a>
                </div>
            </div>
            @endcan

            <div class="row">                
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Data</th>
                            <th>Produtor</th>
                            <th>Produto</th>
                            <th>Tipo</th>
                            <th>Observações</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendas as $venda)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($venda->created_at)->format('d/m/Y') }}</td>
                                <td>{{ $venda->id_produtor }}</td>
                                <td>{{ $venda->nome_produto }}</td>
                                <td>{{ $venda->tipo_produto }}</td>
                                <td>{{ $venda->obs_produto }}</td>
                                <td>
                                    @can('###############')
                                    <a href="{{ route( 'com.vendas.editar', $venda->id ) }}"><i class="fas fa-edit"></i></a>
                                    @endcan                                    
                                    @can('###############')
                                    <a href="#" wire:click="delete({{ $venda->id }})"><i class="fas fa-trash"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                <div class="row">
                    <ul class="pagination pagination-month pagination-sm justify-content-center p-0">
                        <li class="page-item">
                            <a class="page-link" href="#" wire:click="filtrar_data( 'change', '-1' )">«</a>
                        </li>
                        @foreach ($filtro_meses as $data)
                        <li class="page-item 
                        @if(\Carbon\Carbon::parse($data->created_at, 'Y-m-d H:i:s P')->year == $ano && \Carbon\Carbon::parse($data->created_at, 'Y-m-d H:i:s P')->month == $mes ) active @endif">
                        <a class="page-link" href="#" wire:click="filtrar_data( {{ \Carbon\Carbon::parse($data->created_at, 'Y-m-d H:i:s P')->year }}, {{ \Carbon\Carbon::parse($data->created_at, 'Y-m-d H:i:s P')->month }} )">
                            <p class="page-month">{{ \Carbon\Carbon::parse($data->created_at, 'Y-m-d H:i:s P')->year }}</p>
                            <p class="page-year">{{ \Carbon\Carbon::parse($data->created_at, 'Y-m-d H:i:s P')->format('M') }}</p>
                        </a>
                        @endforeach
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" wire:click="filtrar_data( 'change', '+1' )">»</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
        <script>
            window.addEventListener('vendaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
