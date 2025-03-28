<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Valores de custo</h3>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_nota">Valor do produto</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('vlr_nota') is-invalid @enderror" wire:model="vlr_nota" wire:change="atualizarValores">
                    @error('vlr_nota')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_frete">Frete</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('vlr_frete') is-invalid @enderror" wire:model="vlr_frete" wire:change="atualizarValores">
                    @error('vlr_frete')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_impostos">Impostos</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('vlr_impostos') is-invalid @enderror" wire:model="vlr_impostos" wire:change="atualizarValores">
                    @error('vlr_impostos')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_cst_adicional">Custo adicional</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('vlr_cst_adicional') is-invalid @enderror" wire:model="vlr_cst_adicional" wire:change="atualizarValores">
                    @error('vlr_cst_adicional')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_custo">Custo Total</label>
                    <span class="form-control form-control-sm text-right" readonly>{{ $vlr_custo }}</span>
                    @error('vlr_custo')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
