<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Valores de custo</h3>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="valor_nota">Valor do produto</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('valor_nota') is-invalid @enderror" wire:model.live="valor_nota" wire:change="atualizarValores">
                    @error('valor_nota')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="valor_frete">Frete</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('valor_frete') is-invalid @enderror" wire:model.live="valor_frete" wire:change="atualizarValores">
                    @error('valor_frete')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="valor_impostos">Impostos</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('valor_impostos') is-invalid @enderror" wire:model.live="valor_impostos" wire:change="atualizarValores">
                    @error('valor_impostos')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="valor_cst_adicional">Custo adicional</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('valor_cst_adicional') is-invalid @enderror" wire:model.live="valor_cst_adicional" wire:change="atualizarValores">
                    @error('valor_cst_adicional')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="valor_custo">Custo Total</label>
                    <span class="form-control form-control-sm text-right" readonly>{{ $valor_custo }}</span>
                    @error('valor_custo')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
