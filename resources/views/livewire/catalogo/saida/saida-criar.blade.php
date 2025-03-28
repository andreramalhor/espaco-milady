<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Cadastrar nova saída</h5>
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
                                        <label for="dt_compra">Data da saída</label>
                                        <input type="date" class="form-control form-control-sm @error('dt_compra') is-invalid @enderror" wire:model="dt_compra">
                                        @error('dt_compra')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="id_fornecedor">Destino</label>
                                        <select class="form-control form-control-sm @error('id_fornecedor') is-invalid @enderror" wire:model.live="id_fornecedor">
                                            <option value="null">Selecione o destino</option>
                                            @foreach(\App\Models\ACL\Funcao::where('nome', '=', 'Cliente')->first()->znufwevbqgruklz as $ciclo)
                                                <option value="{{ $ciclo->id }}">{{ $ciclo->apelido }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_fornecedor')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="num_pedido">Cód. Referência</label>
                                        <input type="text" class="form-control form-control-sm @error('num_pedido') is-invalid @enderror" wire:model="num_pedido">
                                        @error('num_pedido')
                                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-2">
                                    <label>&nbsp;</label>
                                    <form wire:submit.prevent="gravarSaida">
                                        <button type="submit" class="btn btn-sm btn-primary float-right @if(is_null($id_fornecedor) || $id_fornecedor == 'null') disabled @endif">Cadastrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>