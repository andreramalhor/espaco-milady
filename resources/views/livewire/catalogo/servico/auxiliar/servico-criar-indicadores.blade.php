<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Indicadores</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="tempo_retorno">tempo_retorno</label>
                    <input type="text" class="form-control form-control-sm @error('tempo_retorno') is-invalid @enderror" wire:model="tempo_retorno" placeholder="tempo_retorno">
                    @error('tempo_retorno')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="consumo_medio">consumo_medio</label>
                    <input type="text" class="form-control form-control-sm @error('consumo_medio') is-invalid @enderror" wire:model="consumo_medio" placeholder="consumo_medio">
                    @error('consumo_medio')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="curva_abc">curva_abc</label>
                    <input type="text" class="form-control form-control-sm @error('curva_abc') is-invalid @enderror" wire:model="curva_abc" placeholder="curva_abc">
                    @error('curva_abc')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="cmv_prod_serv">cmv_prod_serv</label>
                    <input type="text" class="form-control form-control-sm @error('cmv_prod_serv') is-invalid @enderror" wire:model="cmv_prod_serv" placeholder="cmv_prod_serv">
                    @error('cmv_prod_serv')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_marg_contribuicao">Margem de contribuição</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('vlr_marg_contribuicao') is-invalid @enderror" wire:model="vlr_marg_contribuicao" placeholder="0">
                    @error('vlr_marg_contribuicao')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="marg_contribuicao">marg_contribuicao</label>
                    <input type="text" class="form-control form-control-sm @error('marg_contribuicao') is-invalid @enderror" wire:model="marg_contribuicao" placeholder="marg_contribuicao">
                    @error('marg_contribuicao')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="margem_custo">margem_custo</label>
                    <input type="text" class="form-control form-control-sm @error('margem_custo') is-invalid @enderror" wire:model="margem_custo" placeholder="margem_custo">
                    @error('margem_custo')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="vlr_custo_estoque">Custo Estoque</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro @error('vlr_custo_estoque') is-invalid @enderror" wire:model="vlr_custo_estoque" placeholder="Custo Estoque">
                    @error('vlr_custo_estoque')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" class="form-control form-control-sm @error('status') is-invalid @enderror" wire:model="status" placeholder="status">
                    @error('status')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
