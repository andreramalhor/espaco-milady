<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Comandas do caixa: {{ $caixa->id }}</h3>
        </div>
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="col-12 float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('pdv.comandas.criar') }}"><i class="fa fa-plus"></i> Nova comanda</a>&nbsp;
                    <a class="btn btn-secondary btn-sm" href="{{ route('pdv.comandas.criar') }}"><i class="fa fa-filter"></i></a>
                </div>
            </div>
            <table class="table projects">
                <thead class="table-dark">
                    <tr style="border-left: 5px solid #212529;">
                        <th class="text-center">#</th>
                        <th class="text-left">Cliente</th>
                        <th class="text-center">Qtd itens lançacos</th>
                        <th class="text-center">Qtd produtos</th>
                        <th class="text-right">Valor da comanda</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-left: 5px solid white;">
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_id"       placeholder="id"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_cliente"  placeholder="Cliente"></td>
                        <td class="p-0"></td>
                        <td class="p-0"></td>
                        <td class="p-0 pl-1 py-1">
                            <input class="form-control form-control-sm float-left" style="width: 50%;" type="text" wire:model.live.debounce.200ms="p_vlr_min"  placeholder="Mín">
                            <input class="form-control form-control-sm float-right" style="width: 50%;" type="text" wire:model.live.debounce.200ms="p_vlr_max" placeholder="Máx">
                        </td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse($comandas as $ciclo)
                    <tr style="border-left: 5px solid {{ $ciclo->cor_status['cor'] ?? '' }};">
                        <td  class="p-1 text-center">{{ $ciclo->id }}</td>
                        <td  class="p-1 text-left">{{ $ciclo->lufqzahwwexkxli->apelido ?? '(Cliente sem cadastro)'  }}</td> 
                        <td  class="p-1 text-center">{{ number_format($ciclo->dfyejmfcrkolqjh->count(), 0, '.') }}</td> 
                        <td  class="p-1 text-center">{{ number_format($ciclo->qtd_produtos, 0, '.') }}</td> 
                        <td  class="p-1 text-right">{{ number_format($ciclo->vlr_final, 2, ',', '.') }}</td> 
                        <td  class="p-1 text-left">
                            <a wire:click="$dispatch('pdv-comanda-comandamostrar', { id: {{ $ciclo->id }} })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                            @can('###############')
                            @endcan
                            @if( isset($ciclo->cor_status) || $ciclo->cor_status['editar'] )
                            <!-- <a href="{{ route('pdv.comandas.editar', $ciclo->id) }}" class="btn btn-default btn-xs" data-bs-tooltip="tooltip" data-bs-title="Editar" data-original-title="Editar"><i class="fas fa-pencil fa-fw"></i></a> -->
                            @endif
                            @can('###############')
                            <!-- <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modal-overlay">Launch Modal with Overlay</button> -->
                            <!-- <a href="{{ route('pdv.comandas.mostrar', $ciclo->id) }}" class="btn btn-default btn-xs" data-bs-tooltip="tooltip" data-bs-title="Visualizar" data-original-title="Visualizar"><i class="fas fa-search fa-fw"></i></a> -->
                            @endcan
                            <a wire:click="delete({{ $ciclo->id }})" class="btn btn-xs btn-danger" data-bs-tooltip="tooltip" data-bs-title="Excluir" data-original-title="Excluir"><i class="fas fa-trash fa-fw"></i></a>
                            @can('###############')
                            <a wire:click="$dispatchTo('PDV/Comanda/ComandaMostrar', 'pdv-comanda-comandamostrar', { postId: 1 })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar">...</a>
                            <a wire:click="mostrar_comanda_popup({{ $ciclo->id }})" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                            <a href="{{ route('ger.comandas.index', $ciclo->id) }}" class="btn btn-info btn-xs" data-bs-tooltip="tooltip" data-bs-title="Gerenciar" data-original-title="Gerenciar"><i class="fas fa-gear fa-fw"></i></a>
                            <div class="btn-group">

                                @if ($ciclo->id_usuario_abertura == Auth::User()->id && $ciclo->status == 'Aberto')
                                <a href="{{ route('pdv.comandas.mostrar', $ciclo->id) }}" class="btn btn-info btn-xs" data-bs-tooltip="tooltip" data-bs-title="Fechar" data-original-title="Fechar"><i class="fas fa-lock fa-fw"></i></a>
                                @endif

                                @if ( $ciclo->status != 'Validado' &&
                                $ciclo->status != 'Aberto' &&
                                \Carbon\Carbon::parse($ciclo->dt_abertura)->isSameDay(\Carbon\Carbon::now()) &&
                                $ciclo->id_usuario_abertura == Auth::User()->id )
                                <a href="{{ route('pdv.comandas.mostrar', $ciclo->id) }}" class="btn btn-success btn-xs" data-bs-tooltip="tooltip" data-bs-title="Validar" data-original-title="Validar"><i class="fas fa-lock fa-fw"></i></a>
                                @endif
                            </div>
                            @endcan
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"><small>Não há comandas cadastradas</small></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{--
                    {{ $comandas->links() }}
                --}}
            </div>
        </div>
    </div>

    @if($modal)
    <div class="modal fade show" id="modal-overlay" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="overlay"> -->
                    <!-- <i class="fas fa-2x fa-sync fa-spin"></i> -->
                <!-- </div> -->
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" wire:click="fechar_modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="fechar_modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show" wire:click="fechar_modal</div>
    @endif
</div>
