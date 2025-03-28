<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Valores de comissão</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="tipo_comissao">Tipo de comissão</label>
                    <select class="form-control form-control-sm" wire:model.live="tipo_comissao">
                        <option value="Valor fixo">Valor fixo</option>
                        <option value="% Venda">% Venda</option>
                        <option value="% Lucro">% Lucro</option>
                    </select>
                </div>
            </div>
            
            @if($tipo_comissao == '% Venda' || $tipo_comissao == '% Lucro')
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="prc_comissao">Perc. comissão</label>
                    <input type="text" class="form-control form-control-sm text-center percentual" wire:model.live="prc_comissao" placeholder="0" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>
            @else
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="valor_comissao">Valor comissão</label>
                    <input type="text" class="form-control form-control-sm text-right dinheiro" wire:model.live="valor_comissao" placeholder="0" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>
            @endif
            
            @if ('Ativar despois q corrigir partes de ipi, icms, simples, etc.' == 1)
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="ipi_prod_serv">ipi_prod_serv</label>
                    <input type="text" class="form-control form-control-sm" wire:model.live="ipi_prod_serv" placeholder="ipi_prod_serv" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="icms_prod_serv">icms_prod_serv</label>
                    <input type="text" class="form-control form-control-sm" wire:model.live="icms_prod_serv" placeholder="icms_prod_serv" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>
    
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="simples_prod_serv">simples_prod_serv</label>
                    <input type="text" class="form-control form-control-sm" wire:model.live="simples_prod_serv" placeholder="simples_prod_serv" x-mask:dynamic="$money($input, ',', '.', 2)">
                </div>
            </div>
            @endif        
        </div>
    </div>
</div>
