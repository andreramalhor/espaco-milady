<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Sobre o produto</h3>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control form-control-sm @error('tipo') is-invalid @enderror" wire:model="tipo" disabled="disabled">
                        <option value="Serviço">Serviço</option>
                        <option value="Produto">Produto</option>
                    </select>
                    @error('tipo')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
        
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nome">Nome <b class="text-danger">*</b></label>
                    <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" wire:model="nome" placeholder="Nome">
                    @error('nome')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <x-catalogo.categorias-select col="2" label="Categoria" name="id_categoria" tipo="Serviço" />

            <div class="col-sm-2">
                <div class="form-group">
                    <label>&nbsp;</label><br/>
                    <div class="form-check">
                        <input type="checkbox" @error('ativo') is-invalid @enderror id="ativo" wire:model="ativo" checked="checked">
                        <label class="" for="ativo">&nbsp;Ativo</label>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control form-control-sm @error('descricao') is-invalid @enderror" wire:model="descricao" placeholder="Descrição">
                    @error('descricao')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            
            @if($tipo == 'Produto')
            {{-- Produto --}}
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control form-control-sm @error('marca') is-invalid @enderror" wire:model="marca" placeholder="Marca">
                    @error('marca')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="id_fornecedor">Fornecedores</label>
                    <select class="form-control form-control-sm @error('id_fornecedor') is-invalid @enderror" wire:model="id_fornecedor">
                    <x-Atendimento.Pessoa.Fornecedores />
                    </select>
                    @error('id_fornecedor')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="unidade">Unidade</label>
                    <select class="form-control form-control-sm @error('unidade') is-invalid @enderror" wire:model="unidade">
                        <option value="Unidade">Unidade</option>
                        <option value="Frasco">Frasco</option>
                        <option value="Kilos">Kilos</option>
                        <option value="Gramas">Gramas</option>
                        <option value="Litros">Litros</option>
                        <option value="Mililitros">Mililitros</option>
                    </select>

                    @error('unidade')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="ncm_prod_serv">NCM</label>
                    <input type="text" class="form-control form-control-sm @error('ncm_prod_serv') is-invalid @enderror" wire:model="ncm_prod_serv" placeholder="NCM">
                    @error('ncm_prod_serv')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cod_nota">Cód. Nota</label>
                    <input type="text" class="form-control form-control-sm @error('cod_nota') is-invalid @enderror" wire:model="cod_nota" placeholder="Cód. Nota">
                    @error('cod_nota')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cod_barras">Cód. Barras</label>
                    <input type="text" class="form-control form-control-sm @error('cod_barras') is-invalid @enderror" wire:model="cod_barras" placeholder="Cód. Barras">
                    @error('cod_barras')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estoque_min">Estoque Mínimo</label>
                    <input type="text" class="form-control form-control-sm text-center @error('estoque_min') is-invalid @enderror" wire:model="estoque_min" placeholder="estoque_min">
                    @error('estoque_min')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estoque_max">Estoque Máximo</label>
                    <input type="text" class="form-control form-control-sm text-center @error('estoque_max') is-invalid @enderror" wire:model="estoque_max" placeholder="estoque_max">
                    @error('estoque_max')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>

            @elseif($tipo == 'Serviço')
            {{-- Serviço --}}
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="duracao">Tempo de execução</label>
                    <input type="text" class="form-control form-control-sm text-center tempo @error('duracao') is-invalid @enderror" wire:model="duracao" placeholder="Duração do produto">
                    @error('duracao')<div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>@enderror
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
