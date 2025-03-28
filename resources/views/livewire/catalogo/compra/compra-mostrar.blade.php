<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Compra</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Catálogo</a></li>
                        <li class="breadcrumb-item active">Compra</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <p class="text-muted text-center mb-0">Fornecedor:</p>
                            <h3 class="profile-username text-center mt-0">{{ $compra->fornecedor }}</h3>
                            
                            <hr>

                            <p class="text-muted text-center mb-0">#:</p>
                            <h6 class="profile-username text-center mt-0 mb-4">{{ $compra->id }}</h6>

                            <p class="text-muted text-center mb-0">Quantidade de produtos:</p>
                            <h6 class="profile-username text-center mt-0 mb-4">{{ $compra->qtd_produtos }}</h6>

                            <p class="text-muted text-center mb-0">Quantidade total de itens:</p>
                            <h6 class="profile-username text-center mt-0 mb-4">{{ number_format($compra->somatorio_produtos, 0, '', '.') }}</h6>
                            
                            <p class="text-muted text-center mb-0">Valor Nota:</p>
                            <h6 class="profile-username text-center mt-0 mb-4">R$ {{ number_format($compra->vlr_custo_total, 2, ',', '.') }}</h6>
                            
                            <p class="text-muted text-center mb-0">Status:</p>
                            <h6 class="profile-username text-center mt-0 mb-4">{{ $compra->status }}</h6>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="num_pedido">num_pedido</label>
                                        <input type="text" class="form-control form-control-sm" wire:model="num_pedido">
                                    </div>
                                </div>

                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="num_nf">num_nf</label>
                                        <input type="text" class="form-control form-control-sm" wire:model="num_nf">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="dt_nf">dt_nf</label>
                                        <input type="date" class="form-control form-control-sm" wire:model="dt_nf">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            @if(!$compra->lkerwiucqwbnlks->where('status', '!=', 'Confirmado')->first())
                            <button wire:click="concluirCompra()" class="btn btn-sm btn-info float-right">Confirmar compra</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Produtos</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-condensed">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-left">Produto</th>
                                        <th class="text-center">Quantidade</th>
                                        <th class="text-right">Custo</th>
                                        <th class="text-right">Subtotal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($compra->lkerwiucqwbnlks as $produto)
                                    <tr>
                                        <td class="text-left"><u><a href="{{ route('cat.produtos.mostrar', $produto->id_servprod ) }}" target="_blank" class="">{{ $produto->odkqoweiwoeiowj->nome }}</a></u></td>
                                        <td class="text-center">{{ $produto->qtd }}</td>
                                        <td class="text-right">{{ number_format($produto->vlr_negociado, 2, ',', '.') }}</td>
                                        <td class="text-right">{{ number_format($produto->vlr_custo_total, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $produto->status }}</td>
                                        <td class="text-center"><a href="#" wire:click="confirmarChegadaProduto({{ $produto->id }})"><span class="badge bg-info">Chegou</span></a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="5">Não há produtos cadastrados</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Faturamento</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th class="text-center">Data prevista</th>
                                        <th class="text-left">Forma de Pagamento</th>
                                        <th class="text-center">Parcela</th>
                                        <th class="text-right">Valor</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($compra->knweohweirhwqeq as $pagamento)
                                    <tr>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($pagamento->dt_prevista)->format('d/m/Y') }}</td>
                                        <td class="text-left">{{ $pagamento->descricao }}</td>
                                        <td class="text-center">{{ $pagamento->parcela }}</td>
                                        <td class="text-right">{{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $pagamento->status ?? 'Sem Status' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <td class="text-center" colspan="5">Não há pagamentos cadastrados</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>