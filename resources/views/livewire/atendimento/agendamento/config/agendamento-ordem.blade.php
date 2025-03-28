<div>
    @if($modal)
    <div class="modal fade show" id="modal-default" style="display: block !important;" aria-modal="true" role="dialog">
        <div class="modal-dialog" style="overflow-y: initial !important;">
            <div class="modal-content">
                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="modal-header">
                    <h3 class="card-title">Ordem</h3>
                    <button type="button" class="close" wire:click="toggle_modal(false)">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 70vh; overflow-y: auto;">
                    @foreach($agendamento_ordem as $ciclo)
                        <div class="row">
                            <div class="p-1" style="width: 15%;">
                                <input type="number" class="form-control form-control-sm text-center" min="1" value="{{ $ciclo->ordem }}" wire:change="atualiza_ordem('{{ $ciclo->id }}', event.target.value)" 
                                @if(!$ciclo->ordem)
                                    disabled=""
                                @endif
                                >
                            </div>
                            <div class="p-1 text-center" style="width: 10%;">
                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" id="id_{{ $ciclo->id }}" wire:click="cabecalhos({{ $ciclo->id }}, event.target.checked)"
                                    @if($ciclo->ordem)
                                    checked=""
                                    @endif
                                    >
                                    <label for="id_{{ $ciclo->id }}"></label>
                                </div>
                            </div>
                            
                            <!-- 
                            <span class="handle ui-sortable-handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            -->
                            <img src="{{ optional($ciclo->oewoekdwjzsdlkd)->src_foto }}" class="user-image img-circle" style="width: 60px;">
                            <!-- 
                            <div class="p-1" style="width: 10%;">
                                <span class="text">{{ $ciclo->id_pessoa }}</span>
                            </div>
                             -->
                            <div class="p-1" style="width: 55%;">
                                <span class="text">{{ optional($ciclo->oewoekdwjzsdlkd)->nome }}</span>
                                <!-- <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small> -->
                            </div>
                            <!-- <div class="p-1" style="width: 5%;">
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div> -->
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="toggle_modal(false)">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>
