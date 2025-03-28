<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Cadastrar nova permissão</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Configuração</a></li>
                        <li class="breadcrumb-item">Sistema</li>
                        <li class="breadcrumb-item">Permissão</li>
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
                        <div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="store">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="card-header p-2">
                            <h3 class="card-title">Nova permissão</h3>
                            <ul class="nav nav-pills float-right">
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-produto' ? 'active' : '' }}"   wire:click="tabActive('tab-produto')"   href="#produto"   data-bs-toggle="tab">Produto</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-valores' ? 'active' : '' }}"   wire:click="tabActive('tab-valores')"   href="#valores"   data-bs-toggle="tab">Valores</a></li>
                                <li class="nav-item"><a class="nav-link {{ $tab_active == 'tab-foto' ? 'active' : '' }}"      wire:click="tabActive('tab-foto')"      href="#foto"      data-bs-toggle="tab">Foto</a></li>
                            </ul>
                        </div>
                        <div class="card-body p-2">
                            <div class="tab-content">
                                <div class="tab-pane {{ $tab_active == 'tab-produto' ? 'active' : '' }}" id="tab-produto">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="id_produtor">Produtor</label>
                                                <input type="text" class="form-control form-control-sm @error('id_produtor') is-invalid @enderror" wire:model.live="id_produtor">
                                                @error('id_produtor')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="contrato_assinado">Contrato Assinado ?</label>
                                                <input type="text" class="form-control form-control-sm @error('contrato_assinado') is-invalid @enderror" wire:model.live="contrato_assinado">
                                                @error('contrato_assinado')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="tipo_produto">Tipo de Produto</label>
                                                <select class="form-control form-control-sm @error('grupo') is-invalid @enderror" wire:model.live="tipo_produto">
                                                    <option value="Gotas">Gotas</option>
                                                    <option value="Cápsulas">Cápsulas</option>
                                                    <option value="Gel">Gel</option>
                                                    <option value="Sérum">Sérum</option>
                                                    <option value="Comprimido">Comprimido</option>
                                                    <option value="Gotas 15ml">Gotas 15ml</option>
                                                    <option value="Gotas 30ml">Gotas 30ml</option>
                                                    <option value="Caps 15">Caps 15</option>
                                                    <option value="Caps 30">Caps 30</option>
                                                    <option value="Caps 60">Caps 60</option>
                                                </select>
                                                @error('tipo_produto')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="nome_produto">Nome do Produto</label>
                                                <input type="text" class="form-control form-control-sm @error('nome_produto') is-invalid @enderror" wire:model.live="nome_produto">
                                                @error('nome_produto')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="plano">Plano</label>
                                                <input type="text" class="form-control form-control-sm @error('plano') is-invalid @enderror" wire:model.live="plano">
                                                @error('plano')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="vlr_unitario">Vlr unidade</label>
                                                <input type="text" class="form-control form-control-sm @error('vlr_unitario') is-invalid @enderror" wire:model.live="vlr_unitario">
                                                @error('vlr_unitario')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="frete">Frete</label>
                                                <input type="text" class="form-control form-control-sm @error('frete') is-invalid @enderror" wire:model.live="frete">
                                                @error('frete')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="quantidade">Qtd</label>
                                                <input type="text" class="form-control form-control-sm @error('quantidade') is-invalid @enderror" wire:model.live="quantidade">
                                                @error('quantidade')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="estoque_nosso">Estoque Nosso</label>
                                                <input type="text" class="form-control form-control-sm @error('estoque_nosso') is-invalid @enderror" wire:model.live="estoque_nosso">
                                                @error('estoque_nosso')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="telefone">Telefone</label>
                                                <input type="text" class="form-control form-control-sm @error('telefone') is-invalid @enderror" wire:model.live="telefone">
                                                @error('telefone')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="cnpj">CNPJ</label>
                                                <input type="text" class="form-control form-control-sm @error('cnpj') is-invalid @enderror" wire:model.live="cnpj">
                                                @error('cnpj')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="inscricao_estadual">inscrição estadual</label>
                                                <input type="text" class="form-control form-control-sm @error('inscricao_estadual') is-invalid @enderror" wire:model.live="inscricao_estadual">
                                                @error('inscricao_estadual')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="couple">Couple</label>
                                                <input type="text" class="form-control form-control-sm @error('couple') is-invalid @enderror" wire:model.live="couple">
                                                @error('couple')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="cor_capsula">Cor da cápsula</label>
                                                <input type="text" class="form-control form-control-sm @error('cor_capsula') is-invalid @enderror" wire:model.live="cor_capsula">
                                                @error('cor_capsula')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="frasco">Frasco</label>
                                                <input type="text" class="form-control form-control-sm @error('frasco') is-invalid @enderror" wire:model.live="frasco">
                                                @error('frasco')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="cor_tampa">Cor da tampa</label>
                                                <input type="text" class="form-control form-control-sm @error('cor_tampa') is-invalid @enderror" wire:model.live="cor_tampa">
                                                @error('cor_tampa')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="obs_produto">Observações</label>
                                                <input type="text" class="form-control form-control-sm @error('obs_produto') is-invalid @enderror" wire:model.live="obs_produto">
                                                @error('obs_produto')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="nota_fiscal">Nota Fiscal</label>
                                                <input type="text" class="form-control form-control-sm @error('nota_fiscal') is-invalid @enderror" wire:model.live="nota_fiscal">
                                                @error('nota_fiscal')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="pedido_feito">Pedido feito</label>
                                                <input type="text" class="form-control form-control-sm @error('pedido_feito') is-invalid @enderror" wire:model.live="pedido_feito">
                                                @error('pedido_feito')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-valores' ? 'active' : '' }}" id="tab-valores">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="dt_parcela_1">Data parcela 1</label>
                                                <input type="date" class="form-control form-control-sm @error('dt_parcela_1') is-invalid @enderror" wire:model.live="dt_parcela_1">
                                                @error('dt_parcela_1')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="vlr_parcela_1">Valor parcela 1</label>
                                                <input type="text" class="form-control form-control-sm @error('vlr_parcela_1') is-invalid @enderror" wire:model.live="vlr_parcela_1">
                                                @error('vlr_parcela_1')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="forma_parcela_1">Forma Parcela 1</label>
                                                <input type="text" class="form-control form-control-sm @error('forma_parcela_1') is-invalid @enderror" wire:model.live="forma_parcela_1">
                                                @error('forma_parcela_1')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="perc_comissao_1">% Comissão 1</label>
                                                <input type="text" class="form-control form-control-sm @error('perc_comissao_1') is-invalid @enderror" wire:model.live="perc_comissao_1">
                                                @error('perc_comissao_1')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="status_comissao_1">Status Comissão 1</label>
                                                <input type="text" class="form-control form-control-sm @error('status_comissao_1') is-invalid @enderror" wire:model.live="status_comissao_1">
                                                @error('status_comissao_1')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="dt_parcela_2">Data parcela 2</label>
                                                <input type="date" class="form-control form-control-sm @error('dt_parcela_2') is-invalid @enderror" wire:model.live="dt_parcela_2">
                                                @error('dt_parcela_2')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="vlr_parcela_2">Valor parcela 2</label>
                                                <input type="text" class="form-control form-control-sm @error('vlr_parcela_2') is-invalid @enderror" wire:model.live="vlr_parcela_2">
                                                @error('vlr_parcela_2')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="forma_parcela_2">Forma Parcela 2</label>
                                                <input type="text" class="form-control form-control-sm @error('forma_parcela_2') is-invalid @enderror" wire:model.live="forma_parcela_2">
                                                @error('forma_parcela_2')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="perc_comissao_2">% Comissão 2</label>
                                                <input type="text" class="form-control form-control-sm @error('perc_comissao_2') is-invalid @enderror" wire:model.live="perc_comissao_2">
                                                @error('perc_comissao_2')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="status_comissao_2">Status Comissão 2</label>
                                                <input type="text" class="form-control form-control-sm @error('status_comissao_2') is-invalid @enderror" wire:model.live="status_comissao_2">
                                                @error('status_comissao_2')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="dt_parcela_3">Data parcela 3</label>
                                                <input type="date" class="form-control form-control-sm @error('dt_parcela_3') is-invalid @enderror" wire:model.live="dt_parcela_3">
                                                @error('dt_parcela_3')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="vlr_parcela_3">Valor parcela 3</label>
                                                <input type="text" class="form-control form-control-sm @error('vlr_parcela_3') is-invalid @enderror" wire:model.live="vlr_parcela_3">
                                                @error('vlr_parcela_3')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="forma_parcela_3">Forma Parcela 3</label>
                                                <input type="text" class="form-control form-control-sm @error('forma_parcela_3') is-invalid @enderror" wire:model.live="forma_parcela_3">
                                                @error('forma_parcela_3')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="perc_comissao_3">% Comissão 3</label>
                                                <input type="text" class="form-control form-control-sm @error('perc_comissao_3') is-invalid @enderror" wire:model.live="perc_comissao_3">
                                                @error('perc_comissao_3')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="status_comissao_3">Status Comissão 3</label>
                                                <input type="text" class="form-control form-control-sm @error('status_comissao_3') is-invalid @enderror" wire:model.live="status_comissao_3">
                                                @error('status_comissao_3')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <br>
    
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="total_pago">Total Pago</label>
                                                <input type="text" class="form-control form-control-sm @error('total_pago') is-invalid @enderror" wire:model.live="total_pago">
                                                @error('total_pago')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="conta_pagamento">Conta pagamento</label>
                                                <input type="text" class="form-control form-control-sm @error('conta_pagamento') is-invalid @enderror" wire:model.live="conta_pagamento">
                                                @error('conta_pagamento')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="forma_pagamento">Forma de pagamento</label>
                                                <input type="text" class="form-control form-control-sm @error('forma_pagamento') is-invalid @enderror" wire:model.live="forma_pagamento">
                                                @error('forma_pagamento')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="id_vendedor">Vendedor</label>
                                                <input type="text" class="form-control form-control-sm @error('id_vendedor') is-invalid @enderror" wire:model.live="id_vendedor">
                                                @error('id_vendedor')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="quem_fechou">Quem Fechou ?</label>
                                                <input type="text" class="form-control form-control-sm @error('quem_fechou') is-invalid @enderror" wire:model.live="quem_fechou">
                                                @error('quem_fechou')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="vlr_pago_comissao">Valor pago comissão</label>
                                                <input type="text" class="form-control form-control-sm @error('vlr_pago_comissao') is-invalid @enderror" wire:model.live="vlr_pago_comissao">
                                                @error('vlr_pago_comissao')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="dt_pgto_comissao">Data pagamento comissão</label>
                                                <input type="date" class="form-control form-control-sm @error('dt_pgto_comissao') is-invalid @enderror" wire:model.live="dt_pgto_comissao">
                                                @error('dt_pgto_comissao')
                                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane {{ $tab_active == 'tab-foto' ? 'active' : '' }}" id="tab-foto">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form wire:submit.prevent="store">
                                <a href="{{  route('cfg.permissoes.index') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-primary float-right">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>
