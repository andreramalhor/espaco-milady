<div class="row">
    <div class="col-md-12">
        <div class="overlay d-none" wire:loading.class="d-block"></div>
        <div class="card">
        <form wire:submit.prevent="gravar"> <!-- Adicione o formulário aqui -->
            <div class="card-header">
                <h3 class="card-title">Cadastrar novo banco</h3>
            </div>
            <div class="card-body">
                <div class="row p-2">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" wire:model.live="nome" placeholder="Nome">
                            @error('nome')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="num_banco">Nº do banco</label>
                            <input type="text" class="form-control form-control-sm @error('num_banco') is-invalid @enderror" wire:model.live="num_banco" placeholder="000">
                            @error('num_banco')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="num_agencia">Nº da agência</label>
                            <input type="text" class="form-control form-control-sm @error('num_agencia') is-invalid @enderror" wire:model.live="num_agencia" placeholder="0000">
                            @error('num_agencia')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="num_conta">Nº da conta</label>
                            <input type="text" class="form-control form-control-sm @error('num_conta') is-invalid @enderror" wire:model.live="num_conta" placeholder="00000-0">
                            @error('num_conta')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="saldo_inicial">Saldo inicial</label>
                            <input type="text" class="form-control form-control-sm text-right @error('saldo_inicial') is-invalid @enderror" wire:model.live="saldo_inicial" placeholder="0,00">
                            @error('saldo_inicial')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-default mt-4" wire:click="cancel">Cancelar</button>
                <button type="submit" class="btn btn-secondary mt-4">Cadastrar</button>
            </div>
        </form>
        </div>
    </div>
</div>
