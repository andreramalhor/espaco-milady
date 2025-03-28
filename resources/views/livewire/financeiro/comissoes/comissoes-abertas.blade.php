<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Comissões Abertas</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        {{-- <th style="width: 10px">#</th> --}}
                        <th>Nome</th>
                        <th class="text-center">Período</th>
                        <th class="text-center">Qtd</th>
                        <th class="text-right">Valor</th>
                        <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @php($total_comissoes=0)
                    @foreach($colaboradores as $colaborador)
                    <tr>
                        {{-- <td>{{ $colaborador->first()->id_pessoa }}</td> --}}
                        <td>{{ $colaborador->apelido }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($colaborador->opmnhtrvansmesd->min('created_at'))->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($colaborador->opmnhtrvansmesd->max('created_at'))->format('d/m/Y') }}</td>
                        <td class="text-center">{{ $colaborador->opmnhtrvansmesd->where('status', '=', 'Em aberto')->count() }}</td>
                        @php($total_comissoes = $total_comissoes + $colaborador->opmnhtrvansmesd->where('status', '=', 'Em aberto')->sum('valor'))
                        <td class="text-right">{{ number_format($colaborador->opmnhtrvansmesd->where('status', '=', 'Em aberto')->sum('valor'), 2, ',', '.') }}</td>
                        <td class="text-center">
                            @can('###############')
                            <a href="{{ route('fin.comissoes.abertas', $colaborador->id) }}" class="text-muted" data-bs-tooltip="tooltip" data-bs-title="Ver" data-original-title="Ver"><i class="fa-solid fa-search"></i></a>
                            @endcan
                        </td>                            
                    </tr>
                    @endforeach
                    <tr>
                        <td>(Comissóes não alocadas)</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            @can('###############')
                            <a href="{{ route('fin.comissoes.abertas', 0) }}" class="text-muted" data-bs-tooltip="tooltip" data-bs-title="Ver" data-original-title="Ver"><i class="fa-solid fa-search"></i></a>
                            @endcan
                        </td>                            
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th class="text-right">{{ number_format($total_comissoes, 2, ',', '.') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <div class="row">
     
    </div>


    <!-- push('scripts') -->
        <script>
            window.addEventListener('pessoaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
