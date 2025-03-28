<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" wire:model.live="email">
                                @error('email')
                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Senha</label>
                                <input type="text" class="form-control form-control-sm" value="{{ is_null($compra->usarname) ? '123456' : '******' }}" readonly="true">
                            </div>
                        </div>
                    </div>     
                </div>
                <div class="card-footer">
                    <form wire:submit.prevent="salvar">
                        <button type="submit" class="btn btn-sm btn-info">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>