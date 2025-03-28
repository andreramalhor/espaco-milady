<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Valores de preço</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="tipo_preco">Tipo de preço</label>
                    <select class="form-control form-control-sm" wire:model.live="tipo_preco">
                        <option value="Preço fixo">Preço fixo</option>
                        <option value="Preço variável">Preço variável</option>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="valor_venda">Venda</label>
                    <input type="text" class="form-control form-control-sm text-right" wire:model.live="valor_venda" placeholder="0" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>
        </div>
    </div>
</div>