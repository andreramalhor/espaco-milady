<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Caixas</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <div class="row p-2">
                <div class="col-2">
                    @can('###############')
                    <a class="btn btn-primary btn-sm btn-block" href="{{ route('pdv.caixas.criar') }}"><i class="fa fa-plus"></i> Abrir novo caixa</a>
                    @endcan
                </div>
                <div class="offset-8 col-2">
                    <livewire:PDV.Caixa.CaixaFiltrar />
                </div>
            </div>
            <table class="table projects">
                    <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-left">Local</th>
                        <th class="text-left">Usuário</th>
                        <th class="text-center">Abertura</th>
                        <th class="text-center">Fechamento</th>
                        <th class="text-center">Validação</th>
                        <th class="text-right">Saldo Aberura</th>
                        <th class="text-right">Saldo Fechamento</th>
                        <th class="text-center">Status</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_local"       placeholder="Local"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_usuario"     placeholder="Usuário"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block text-center" type="date" wire:model.live.debounce.200ms="p_dt_abertura" placeholder="Data abertura"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block text-center" type="date" wire:model.live.debounce.200ms="p_dt_fechamento" placeholder="Data fechamento"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block text-center" type="text" wire:model.live.debounce.200ms="p_status"      placeholder="Status"></td>
                        <td></td>
                    </tr>
                    @forelse ($caixas as $ciclo)
                    <tr>
                        <td  class="p-1 text-center">{{ $ciclo->id }}</td>
                        <td  class="p-1 text-left">{{ $ciclo->rybeyykhpcgwkgr->nome ?? 'ERRO INDEX CAIXA 1' }}</td>
                        <td  class="p-1 text-left">{{ isset($ciclo->kpakdkhqowIqzik->nome) ? $ciclo->kpakdkhqowIqzik->apelido : $ciclo->id_usuario_abertura }}</td>
                        <td  class="p-1 text-center">{{ \Carbon\Carbon::parse($ciclo->dt_abertura)->format('d/m/Y H:i') }}</td>
                        <td  class="p-1 text-center">{{ isset($ciclo->dt_fechamento) ? \Carbon\Carbon::parse($ciclo->dt_fechamento)->format('d/m/Y H:i') : '' }}</td>
                        <td  class="p-1 text-center">{{ isset($ciclo->dt_validacao) ? \Carbon\Carbon::parse($ciclo->dt_validacao)->format('d/m/Y H:i') : '' }}</td>
                        <td  class="p-1 text-right">{{ number_format($ciclo->vlr_abertura, 2, ',', '.') }}</td>
                        <td  class="p-1 text-right">{{ number_format($ciclo->vlr_fechamento, 2, ',', '.') }}</td>
                        <td  class="p-1 text-center">
                            <span class="badge badge-{{ $ciclo->cor_status }}">{{ $ciclo->status }}</span>
                        </td>
                        <td  class="p-1 text-right">
                            @if(auth()->user()->id == 2)
                                <a href="{{ route('pdv.caixas.comandas', $ciclo->id) }}" class="btn btn-default btn-xs" data-bs-tooltip="tooltip" data-bs-title="Comandas" data-original-title="Comandas"><i class="fas fa-receipt fa-fw"></i></a>
                            @endif

                            <div class="btn-group">
                                <a href="{{ route('pdv.caixas.mostrar', $ciclo->id) }}" class="btn btn-default btn-xs" data-bs-tooltip="tooltip" data-bs-title="Visualizar" data-original-title="Visualizar"><i class="fas fa-search fa-fw"></i></a>
                            </div>
                            
                            <div class="btn-group">
                                @if ($ciclo->id_usuario_abertura == Auth::User()->id && $ciclo->status == 'Aberto')
                                    <a href="{{ route('pdv.caixas.mostrar', $ciclo->id) }}" class="btn btn-info btn-xs" data-bs-tooltip="tooltip" data-bs-title="Fechar" data-original-title="Fechar"><i class="fas fa-lock fa-fw"></i></a>
                                @endif
                                
                                @if ( $ciclo->status != 'Validado' && $ciclo->status != 'Aberto' && \Carbon\Carbon::parse($ciclo->dt_abertura)->isSameDay(\Carbon\Carbon::now()) && $ciclo->id_usuario_abertura == Auth::User()->id )
                                    <a href="{{ route('pdv.caixas.mostrar', $ciclo->id) }}" class="btn btn-success btn-xs" data-bs-tooltip="tooltip" data-bs-title="Validar" data-original-title="Validar"><i class="fas fa-lock fa-fw"></i></a>
                                @endif
                                    
                                @if ($ciclo->status != 'Validado' && $ciclo->status != 'Aberto')
                                @can('###############')
                                    <a href="{{ route('pdv.caixas.mostrar', $ciclo->id) }}" class="btn btn-success btn-xs" data-bs-tooltip="tooltip" data-bs-title="Validar" data-original-title="Validar"><i class="fas fa-pen-nib fa-fw"></i></a>
                                @endcan
                                @endif
                            </div>
                        </td>                            
                    </tr>
                      
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"><small>Não há caixas cadastradas</small></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $caixas->links() }}
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('caixaUpdated', event => {
            console.log(event)
        });
    </script>
</div>
