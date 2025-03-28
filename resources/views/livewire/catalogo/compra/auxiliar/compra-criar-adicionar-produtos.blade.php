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
                                
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="dt_compra">Data da compra</label>
                                        <input type="date" class="form-control form-control-sm" value="{{ $compra->dt_compra }}" readonly>
                                        @error('dt_compra')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-3">
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
                                        <label for="vlr_final">vlr_final</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->vlr_final }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_prod_serv">vlr_prod_serv</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->vlr_prod_serv }}" readonly>
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
                                        <input type="text" class="form-control form-control-sm" value="{{ $compra->vlr_custo_total }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th></th>
                                        <th class="col-1"></th>
                                        <th class="col-3">Produto</th>
                                        <th class="col-2">Quantidade</th>
                                        <th class="col-2">Valor</th>
                                        <th class="col-2">Subtotal</th>
                                        <th class="col-1"><i class="fas fa-ellipsis-h"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="7">
                                            <select class="form-control form-control-sm" wire:change="incluirProduto($event.target.value)" id="kjsahdjksk">
                                                <option>Escolha o produto</option>
                                                @foreach($produtos_fornecedor as $id => $nome)
                                                    <option value="{{ $id }}">{{ $nome }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @foreach($compra_detalhes->sortByDesc('id') as $compra_detalhe)
                                    <tr>
                                        <td class="p-1 text-center">{{ $compra_detalhe->id }}</td>
                                        <td class="p-1 col-1">
                                            <img src="{{ $compra_detalhe->odkqoweiwoeiowj->src_foto ?? null }}" class="img-circle img-size-32 mr-2">
                                        </td>
                                        <td class="p-1 col-3">
                                            <input type="text" class="form-control form-control-sm" value="{{ $compra_detalhe->odkqoweiwoeiowj->nome ?? null }}" readonly>
                                        </td>
                                        <td class="p-1 col-2">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control form-control-sm text-center" value="{{ $compra_detalhe->qtd }}" wire:change="atualizarQtd({{ $compra_detalhe->id }}, $event.target.value)">
                                            </div>
                                        </td>
                                        <td class="p-1 col-2">
                                            <input type="text" class="form-control form-control-sm text-right" value="{{ number_format($compra_detalhe->vlr_negociado, 2, ',', '.') }}" wire:change="atualizarVlrCusto({{ $compra_detalhe->id }}, $event.target.value)">
                                        </td>
                                        <td class="p-1 col-2">
                                            <input type="text" class="form-control form-control-sm text-right" value="{{ number_format($compra_detalhe->vlr_custo_total, 2, ',', '.') }}" readonly>
                                        </td>
                                        <td class="p-1 col-1 text-right">
                                            <div class="btn-group">
                                                <a><span class="badge bg-danger" wire:click="removerItem({{ $compra_detalhe->id }})">Remover</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('cat.compras') }}" class="btn btn-sm btn-default float-left">Voltar</a>
                            <a href="{{ route('cat.compras.informar-pagamentos', $compra->id) }}" class="btn btn-sm btn-primary float-right">Pagamentos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>