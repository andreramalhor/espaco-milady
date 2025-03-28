<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Sobre o produto</h3>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control form-control-sm" wire:model="tipo" disabled="disabled">
                        <option value="Serviço">Serviço</option>
                        <option value="Produto">Produto</option>
                    </select>
                </div>
            </div>
        
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="nome">Nome <b class="text-danger">*</b></label>
                    <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" wire:model="nome" placeholder="Nome">
                </div>
            </div>

            {{--
            <x-catalogo.categorias-select col="2" label="Categoria" name="id_categoria" tipo="Serviço" />
            --}}

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="id_categoria">Categoria</label>
                    <select class="form-control form-control-sm" wire:model="id_categoria">
                        @foreach(App\Models\Catalogo\Categoria::orderBy('nome', 'asc')->get() as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label>&nbsp;</label><br/>
                    <div class="form-check">
                        <input type="checkbox" id="ativo" wire:model="ativo" checked="checked">
                        <label class="" for="ativo">&nbsp;Ativo</label>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control form-control-sm" wire:model="descricao" placeholder="Descrição">
                </div>
            </div>

            
            @if($tipo == 'Produto')
            {{-- Produto --}}
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control form-control-sm" wire:model="marca" placeholder="Marca">
                </div>
            </div>
            
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="id_fornecedor">Fornecedores</label>
                    <select class="form-control form-control-sm" wire:model="id_fornecedor">
                    <x-Atendimento.Pessoa.Fornecedores />
                    </select>
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="unidade">Unidade</label>
                    <select class="form-control form-control-sm" wire:model="unidade">
                        <option value="Unidade">Unidade</option>
                        <option value="Frasco">Frasco</option>
                        <option value="Kilos">Kilos</option>
                        <option value="Gramas">Gramas</option>
                        <option value="Litros">Litros</option>
                        <option value="Mililitros">Mililitros</option>
                    </select>

                </div>
            </div>
            
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="ncm_prod_serv">NCM</label>
                    <input type="text" class="form-control form-control-sm" wire:model="ncm_prod_serv" placeholder="NCM">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cod_nota">Cód. Nota</label>
                    <input type="text" class="form-control form-control-sm" wire:model="cod_nota" placeholder="Cód. Nota">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cod_barras">Cód. Barras</label>
                    <input type="text" class="form-control form-control-sm" wire:model="cod_barras" placeholder="Cód. Barras">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estoque_min">Estoque Mínimo</label>
                    <input type="text" class="form-control form-control-sm text-center" wire:model="estoque_min" placeholder="estoque_min">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="estoque_max">Estoque Máximo</label>
                    <input type="text" class="form-control form-control-sm text-center" wire:model="estoque_max" placeholder="estoque_max">
                </div>
            </div>

            @elseif($tipo == 'Serviço')
            {{-- Serviço --}}
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="duracao">Tempo de execução</label>
                    <input type="text" class="form-control form-control-sm text-center tempo" wire:model="duracao" placeholder="Duração do produto">
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
