<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Pontos de fidelidade</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="fidelidade_pontos_ganhos">Pontos ganhos</label>
                    <input type="text" class="form-control form-control-sm @error('fidelidade_pontos_ganhos') is-invalid @enderror" wire:model="fidelidade_pontos_ganhos" placeholder="0">
                    @error('fidelidade_pontos_ganhos')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="fidelidade_pontos_necessarios">Pontos necessários</label>
                    <input type="text" class="form-control form-control-sm @error('fidelidade_pontos_necessarios') is-invalid @enderror" wire:model="fidelidade_pontos_necessarios" placeholder="0">
                    @error('fidelidade_pontos_necessarios')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
        </div>
    </div>
</div>