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
                        <li class="breadcrumb-item">Saída</li>
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

                        <div class="card-body">
                            <div class="row">

                                @foreach($produtos_fornecedor->groupBy(function ($item) {
                                    return strtoupper(substr($item['nome'], 0, 1)); // Assumindo 'nome' como a chave
                                }) as $inicial => $produtos)
                                @if(is_numeric($inicial))
                                <h5>#</h5>
                                <div class="row">
                                    <div class="col-1 p-0 text-center"><small><b>#</b></small></div>
                                    <div class="col-4 p-0 text-center"><small><b>Produto</b></small></div>
                                    <div class="col-1 p-0 text-center"><small><b>Estoque atual</b></small></div>
                                    <div class="col-1 p-0 text-center"><small><b>Atualz.</b></small></div>
                                    <div class="col-1 p-0 text-center"><small><b>Saída</b></small></div>    
                                </div>
                                @else
                                <h4>{{ $inicial }}</h4>
                                <div class="row">
                                    <div class="col-1 p-0 text-center"><small><b>#</b></small></div>
                                    <div class="col-4 p-0 text-center"><small><b>Produto</b></small></div>
                                    <div class="col-1 p-0 text-center"><small><b>Estoque atual</b></small></div>
                                    <div class="col-1 p-0 text-center"><small><b>Atualz.</b></small></div>
                                    <div class="col-1 p-0 text-center"><small><b>Saída</b></small></div>    
                                </div>
                                @endif
                                    @foreach($produtos as $produto)
                                    @php $saida_atual = array_key_exists($produto->id, $produtos_saida) ? $produtos_saida[$produto->id] : 0 @endphp
                                    <div class="row">
                                        <div class="col-1 p-1">
                                            <spam class="form-control form-control-sm btn-default text-center">{{ $produto->id }}</spam>
                                        </div>
                                        <div class="col-4 p-1">
                                            <spam class="form-control form-control-sm btn-default text-left">{{ $produto->nome }}</spam>
                                        </div>
                                        <div class="col-1 p-1">
                                            <spam class="form-control form-control-sm btn-default text-center">{{ $produto->estoque_atual }}</spam>
                                        </div>
                                        <div class="col-1 p-1">
                                            <spam class="form-control form-control-sm btn-default text-center">{{ $produto->estoque_atual - $saida_atual }}</spam>
                                        </div>
                                        <div class="col-1 p-1">
                                            <input type="text" class="form-control form-control-sm text-center" value="{{ $saida_atual }}" wire:change="atualizarQtd({{ $produto->id }}, 'total', $event.target.value)">
                                        </div>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="col-1"></th>
                                        <th class="col-3">Produto</th>
                                        <th class="col-2">Quantidade</th>
                                        <th class="col-2">Valor</th>
                                        <th class="col-2">Subtotal</th>
                                        <th class="col-1">Ações</th>
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
                                    @foreach($saida_detalhes->sortByDesc('id') as $saida_detalhe)
                                    <tr>
                                        <td class="p-1 text-center">{{ $saida_detalhe->id }}</td>
                                        <td class="p-1 col-1">
                                            <img src="{{ $saida_detalhe->odkqoweiwoeiowj->src_foto ?? null }}" class="img-circle img-size-32 mr-2">
                                        </td>
                                        <td class="p-1 col-3">
                                            <input type="text" class="form-control form-control-sm" value="{{ $saida_detalhe->odkqoweiwoeiowj->nome ?? null }}" readonly>
                                        </td>
                                        <td class="p-1 col-2">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-sm input-group-prepend">
                                                    <a class="input-group-text" wire:click="atualizarQtd({{ $saida_detalhe->id }}, 'subtração' , '1')"><i class="fa-solid fa-minus"></i></a>
                                                </div>
                                                <input type="text" class="form-control form-control-sm text-center" value="{{ $saida_detalhe->qtd }}" wire:change="atualizarQtd({{ $saida_detalhe->id }}, 'total', $event.target.value)">
                                                <div class="input-group-sm input-group-append">
                                                    <a class="input-group-text" wire:click="atualizarQtd({{ $saida_detalhe->id }}, 'soma' , '1')"><i class="fa-solid fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-1 col-2">
                                            <input type="text" class="form-control form-control-sm text-right" value="{{ number_format($saida_detalhe->vlr_custo, 2, ',', '.') }}" wire:change="atualizarVlrCusto({{ $saida_detalhe->id }}, $event.target.value)">   
                                        </td>
                                        <td class="p-1 col-2">
                                            <input type="text" class="form-control form-control-sm text-right" value="{{ number_format($saida_detalhe->subtotal, 2, ',', '.') }}">
                                        </td>
                                        <td class="p-1 col-1 text-right">
                                            <div class="btn-group">
                                                <a><span class="badge bg-danger" wire:click="removerItem({{ $saida_detalhe->id }})">Remover</span></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                            <form wire:submit.prevent="gravarTudo">
                                <a href="{{  route('cat.saidas') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-primary float-right">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>