<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Ver Produtos</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Catalogo</a></li>
                        <li class="breadcrumb-item">Saída</li>
                        <li class="breadcrumb-item active">Ver</li>
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
                            <h3 class="card-title">Saídas</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="dt_saida">Data da saida</label>
                                        <input type="date" class="form-control form-control-sm" value="{{ $saida->dt_saida }}" readonly>
                                        @error('dt_saida')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="id_fornecedor">Fornecedor</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->fornecedor }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="num_pedido">Cód. Referência</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->num_pedido }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="qtd_produtos">Qtd Produtos</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->qtd_produtos }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="somatorio_produtos">somatorio_produtos</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->somatorio_produtos }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_final">vlr_final</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_final }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_prod_serv">vlr_prod_serv</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_prod_serv }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_negociados">vlr_negociados</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_negociados }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_dsc_acr">vlr_dsc_acr</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_dsc_acr }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_dsc_acr">vlr_dsc_acr</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_dsc_acr }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_frete_total">vlr_frete_total</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_frete_total }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_imposto_total">vlr_imposto_total</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_imposto_total }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="vlr_custo_total">vlr_custo_total</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $saida->vlr_custo_total }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id }}</td>
                                        <td>{{ $produto->odkqoweiwoeiowj->nome }}</td>
                                        <td>{{ $produto->qtd }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <a href="{{  route('cat.saidas') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>