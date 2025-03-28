<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Adicionar Produtos</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Catalogo</a></li>
                        <li class="breadcrumb-item">Compra</li>
                        <li class="breadcrumb-item active">Criar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Compras</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="dt_compra">Data da compra</label>
                                        <input type="date" class="form-control form-control-sm" value="{{ $compra->dt_compra }}" readonly>
                                        @error('dt_compra')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="id_fornecedor">Fornecedor</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->fornecedor }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="num_pedido">Cód. Referência</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->num_pedido }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="qtd_produtos">Qtd Produtos</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->qtd_produtos }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="somatorio_produtos">somatorio_produtos</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->somatorio_produtos }}" readonly>
                                    </div>
                                </div>
                                

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_negociados">vlr_negociados</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->vlr_negociados }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_dsc_acr">vlr_dsc_acr</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->vlr_dsc_acr }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_frete_total">vlr_frete_total</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->vlr_frete_total }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_imposto_total">vlr_imposto_total</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->vlr_imposto_total }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_custo_total">vlr_custo_total</label>
                                        <input type="text" class="form-control form-control-sm text-right" value="{{number_format($compra->vlr_custo_total, 2, ',', '.') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="id_forma_pagamento">Forma de Pagamento</label>
                                        <select class="form-control form-control-sm" wire:model.live="id_forma_pagamento">
                                            <option value="1">Boleto</option>
                                            <option value="2">PIX</option>
                                            <option value="3">Cartão de Crédito</option>
                                            <option value="4">Cartão de Débito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="parcela">Qtd parcelas</label>
                                        <input type="number" class="form-control form-control-sm text-center" wire:model.live="parcela" wire:change="recalcularValor()" min="1">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="valor_amigavel">Valor parcela</label>
                                        <input type="text" class="form-control form-control-sm text-right" wire:model.live="valor_amigavel" readonly>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="dt_prevista">Primeira data prevista</label>
                                        <input type="date" class="form-control form-control-sm text-center" wire:model.live="dt_prevista">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="dt_prevista">&nbsp;</label>
                                        <button type="button" class="btn btn-block btn-primary btn-sm" wire:click="gerarParcelas()">Gerar parcelas</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">Forma de pagamento</th>
                                        <th class="text-center">Parcela</th>
                                        <th class="text-center">Valor</th>
                                        <th class="text-center">Data Prevista</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($parcelas_temp as $pagamento)
                                    <tr>
                                        <td class="p-1 text-center">{{ $pagamento['id_forma_pagamento'] }}</td>
                                        <td class="p-1 text-center">{{ $pagamento['parcela'] }}</td>
                                        <td class="p-1 text-center">{{ number_format($pagamento['valor'] ?? 0, 2, ',', '.') }}</td>
                                        <td class="p-1 text-center">{{ \Carbon\Carbon::parse($pagamento['dt_prevista'])->format('d/m/Y') }}</td>
                                        <td class="p-1 text-center">{{ $pagamento['status'] }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="5">Não há pagamentos cadastrados</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{  route('cat.compras') }}" class="btn btn-sm btn-default float-left">Voltar</a>
                            <a href="#" wire:click="gravarParcelas()" class="btn btn-sm btn-default float-right">Gravar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>