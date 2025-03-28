<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Valores de preço</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="tipo_preco">Tipo de preço</label>
                    <select class="form-control form-control-sm @error('tipo_preco') is-invalid @enderror" wire:model="tipo_preco">
                        <option value="Preço fixo">Preço fixo</option>
                        <option value="Preço variável">Preço variável</option>
                    </select>
                    @error('tipo_preco')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="vlr_venda">Venda</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('vlr_venda') is-invalid @enderror" wire:model="vlr_venda" placeholder="0">
                    @error('vlr_venda')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
        </div>
    </div>
</div>