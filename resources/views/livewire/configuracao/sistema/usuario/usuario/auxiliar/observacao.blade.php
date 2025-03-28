<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Observações gerais</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control form-control-sm @error('observacao') is-invalid @enderror" rows="3" wire:model="observacao"></textarea>
                    @error('observacao')
                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
