<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Indicadores</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="tempo_retorno">tempo_retorno</label>
                    <input type="text" class="form-control form-control-sm" wire:model="tempo_retorno" placeholder="tempo_retorno">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="consumo_medio">consumo_medio</label>
                    <input type="text" class="form-control form-control-sm" wire:model="consumo_medio" placeholder="consumo_medio">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="curva_abc">curva_abc</label>
                    <input type="text" class="form-control form-control-sm" wire:model="curva_abc" placeholder="curva_abc">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="cmv_prod_serv">cmv_prod_serv</label>
                    <input type="text" class="form-control form-control-sm" wire:model="cmv_prod_serv" placeholder="cmv_prod_serv">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_marg_contribuicao">Margem de contribuição</label>
                    <input type="text" class="form-control form-control-sm text-right" wire:model="vlr_marg_contribuicao" placeholder="0" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="marg_contribuicao">marg_contribuicao</label>
                    <input type="text" class="form-control form-control-sm" wire:model="marg_contribuicao" placeholder="marg_contribuicao">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="margem_custo">margem_custo</label>
                    <input type="text" class="form-control form-control-sm" wire:model="margem_custo" placeholder="margem_custo">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_custo_estoque">Custo Estoque</label>
                    <input type="text" class="form-control form-control-sm text-right" wire:model="vlr_custo_estoque" placeholder="Custo Estoque" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" class="form-control form-control-sm" wire:model="status" placeholder="status">
                </div>
            </div>
        </div>
    </div>
</div>
