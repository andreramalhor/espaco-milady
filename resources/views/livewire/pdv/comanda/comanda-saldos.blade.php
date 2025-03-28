<div>
    @if($mostrar_saldos_desse_cliente)
    <div class="modal fade show" id="modal-default" style="display: block !important;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" style="overflow-y: initial !important;">
            <div class="modal-content">
                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="modal-header">
                    <h3 class="card-title">Lançar saldo</h3>
                    <button type="button" class="close" wire:click="toggle_modal(false)">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @if($saldos < 0)
                            <p>Deseja lançar o saldo para o cliente pagá-lo?</p>
                            <span class="text-xl text-danger">R$ {{ number_format($saldos * -1, 2, ',', '.') }}</span>
                        @elseif($saldos > 0)
                            <p>Deseja usar o crédito para pagamento nesta comanda?</p>
                            <span class="text-xl text-success">R$ {{ number_format($saldos, 2, ',', '.') }}</span>
                        @endif        
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="toggle_modal(false)">Fechar</button>
                    <button type="button" class="btn btn-{{ $saldos < 0 ? 'danger' : 'success' }} disabled" wire:click="adicionar_saldos()">Lançar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show" wire:click="toggle_modal(false)"></div>
    @endif
</div>