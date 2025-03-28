<div class="container-fluid p-3">
    <button type="button" class="btn btn-sm btn-primary m-1" wire:click="addForm">Add Form</button>
    @for($i = count($forms) - 1; $i >= 0; $i--)
    <div class="row">
        <div class="col-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Formulário: {{ $i }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn bg-danger" wire:click="removeForm({{ $i }})"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <div class="card-body mb-0 pb-0">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="mb-0">Valor<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.valor" value="{{ $forms[$i]['valor'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="mb-0">Nº Recibo</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.num_recibo" value="{{ $forms[$i]['num_recibo'] }}">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="mb-0">Pagador<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.pagador" value="{{ $forms[$i]['pagador'] }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="mb-0">CPF ou CNPJ (opcional)</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.cpf_cnpj" value="{{ $forms[$i]['cpf_cnpj'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="mb-0">Referente<b class="text-red">*</b></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model.lazy="forms.{{ $i }}.referente_artigo" value="à">
                                    <label class="form-check-label">à</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model.lazy="forms.{{ $i }}.referente_artigo" value="a">
                                    <label class="form-check-label">a</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model.lazy="forms.{{ $i }}.referente_artigo" value="às">
                                    <label class="form-check-label">às</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model.lazy="forms.{{ $i }}.referente_artigo" value="ao">
                                    <label class="form-check-label">ao</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" wire:model.lazy="forms.{{ $i }}.referente_artigo" value="aos">
                                    <label class="form-check-label">aos</label>
                                </div>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.referente" value="{{ $forms[$i]['referente'] }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="mb-0">Cidade<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.cidade_pag" value="{{ $forms[$i]['cidade_pag'] }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="mb-0">Data do pagamento<b class="text-red">*</b></label>
                                <input type="date" class="form-control text-center" wire:model.lazy="forms.{{ $i }}.dt_pagamento" value="{{ $forms[$i]['dt_pagamento'] }}">
                            </div>
                        </div>
                    </div>

                    <p class="h5">Dados do prestador de serviço</h1>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="mb-0">Nome do prestador de serviço<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.prestador" value="{{ $forms[$i]['prestador'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="mb-0">CPF ou CNPJ (opcional)</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.cnpj_cpf" value="{{ $forms[$i]['cnpj_cpf'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="mb-0">Telefone (opcional)</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.telefone" value="{{ $forms[$i]['telefone'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="mb-0">CEP<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.cep" value="{{ $forms[$i]['cep'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="mb-0">Endereço<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.endereco" value="{{ $forms[$i]['endereco'] }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="mb-0">Bairro<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.bairro" value="{{ $forms[$i]['bairro'] }}">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label class="mb-0">Número<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.numero" value="{{ $forms[$i]['numero'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="mb-0">Complemento</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.complemento" value="{{ $forms[$i]['complemento'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="mb-0">Cidade<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.cidade_prest" value="{{ $forms[$i]['cidade_prest'] }}">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label class="mb-0">UF<b class="text-red">*</b></label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.uf" value="{{ $forms[$i]['uf'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="mb-0">Forma de Pagamento</label>
                                <select class="form-control" d="forma_pagamento" wire:model.lazy="forms.{{ $i }}.forma_pagamento" value="{{ $forms[$i]['forma_pagamento'] }}">
                                    <option value="dinheiro">Dinheiro</option>
                                    <option value="pix">PIX</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="transf_depos">Transferência/Depósito</option>
                                    <option value="cartao_cred_deb">Cartão de Crédito / Débito</option>
                                    <option value="boleto">Boleto</option>
                                </select>
                            </div>
                        </div>
                        
                        @if($forms[$i]['forma_pagamento'] == "pix")
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Quem recebeu?</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.quem_recebeu" value="{{ $forms[$i]['quem_recebeu'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Instituição/Banco</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.banco" value="{{ $forms[$i]['banco'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Chave</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.chave" value="{{ $forms[$i]['chave'] }}">
                            </div>
                        </div>
                        @endif

                        @if($forms[$i]['forma_pagamento'] == "cheque")
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Nº do cheque</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.num_cheque" value="{{ $forms[$i]['num_cheque'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Instituição/Banco</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.banco" value="{{ $forms[$i]['banco'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Agência</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.agencia" value="{{ $forms[$i]['agencia'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Bom para</label>
                                <input type="date" class="form-control" wire:model.lazy="forms.{{ $i }}.bom_para" value="{{ $forms[$i]['bom_para'] }}">
                            </div>
                        </div>
                        @endif

                        @if($forms[$i]['forma_pagamento'] == "transf_depos")
                        <div class="col-sm-1">
                            <div class="form-group">
                            <label class="mb-0">Conta</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.conta" value="{{ $forms[$i]['conta'] }}">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                            <label class="mb-0">Agência</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.agencia" value="{{ $forms[$i]['agencia'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Data</label>
                                <input type="date" class="form-control" wire:model.lazy="forms.{{ $i }}.data" value="{{ $forms[$i]['data'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Banco</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.banco" value="{{ $forms[$i]['banco'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Favorecido</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.favorecido" value="{{ $forms[$i]['favorecido'] }}">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                            <label class="mb-0">Nº docum.</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.num_documento" value="{{ $forms[$i]['num_documento'] }}">
                            </div>
                        </div>
                        @endif

                        @if($forms[$i]['forma_pagamento'] == "boleto")
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Data do pagamento</label>
                                <input type="date" class="form-control" wire:model.lazy="forms.{{ $i }}.data" value="{{ $forms[$i]['data'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Banco emissor</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.banco" value="{{ $forms[$i]['banco'] }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="mb-0">Número do boleto</label>
                                <input type="text" class="form-control" wire:model.lazy="forms.{{ $i }}.num_documento" value="{{ $forms[$i]['num_documento'] }}">
                            </div>
                        </div>
                        @endif
                        
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="{{ $i }}.duas_vias" wire:model.lazy="forms.{{ $i }}.duas_vias" value="{{ $forms[$i]['duas_vias'] }}">
                                    <label class="form-check-label" for="{{ $i }}.duas_vias">Duas vias?</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-primary float-end" wire:click="generatePdf('{{ $i }}')">Salvar em PDF</button>
                </div>
            </div>
        </div>
        
        <div class="col-6">
            <style>
                .tudo {
                    /* font-family: Arial, sans-serif; */
                    /* background-color: #f8f8f8; */
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    /* padding: 20px; */
                }
                .recibo-container {
                    /* width: 700px; */
                    background: white;
                    border: 1px solid #ddd;
                    padding: 20px;
                    margin-bottom: 20px;
                    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                }
                .recibo-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .recibo-valor {
                    border: 1px solid #000;
                    padding: 5px 10px;
                    font-weight: bold;
                    border-radius: 5px;
                }
                .recibo-destaque {
                    font-weight: bold;
                }
                .recibo-assinatura {
                    margin-top: 30px;
                    text-align: center;
                }
                hr {
                    margin-top: 20px;
                    margin-bottom: 20px;
                    border: none;
                    border-top: 1px solid #ddd;
                }
                .recibo-via {
                    font-size: 14px;
                    /* font-weight: bold; */
                }
            </style>

            <div class="recibo-container">
                <div class="recibo-header">
                    <div class="row">
                        <p class="h6 text-center">RECIBO DE PRESTAÇÃO DE SERVIÇO</p>
                    </div>
                    <div class="row">
                        @if($forms[$i]['duas_vias'])
                        <span class="recibo-via float-end">1ª Via</span>
                        @endif
                        <span class="recibo-via float-end"><b>Nº {{ $forms[$i]['num_recibo'] ?? '' }}</b></span>
                        <span class="recibo-valor">R$ {{ number_format($forms[$i]['valor'], 2, ',', '.') }}</span>
                    </div>
                </div>

                <p>
                    Recebi de 
                    <span class="recibo-destaque">
                        {{ $forms[$i]['pagador'] ?? '' }}
                    </span>
                     - CPF {{ $forms[$i]['cpf_cnpj'] ?? '' }}, a importância de
                    <span class="recibo-destaque">
                        {{ $this->numeroext($forms[$i]['valor']) }}
                    </span>
                    , referente {{ $forms[$i]['referente_artigo'] }} 
                    <b>
                        {{ $forms[$i]['referente'] ?? '' }}.
                    </b>
                </p>
                <p>
                    Para maior clareza, firmo o presente recibo, que comprova o recebimento integral do valor mencionado, concedendo <span class="recibo-destaque">quitação plena, geral e irrevogável</span> pela quantia recebida.
                </p>
                @if( $forms[$i]['forma_pagamento'] == 'pix')
                <p>Pagamento recebido por {{ $forms[$i]['quem_recebeu'] }} através da chave Pix: {{ $forms[$i]['banco'] }}, {{ $forms[$i]['chave'] }}.</p>
                @endif
                <p class="recibo-assinatura">_____________________________<br>{{ $forms[$i]['prestador'] ?? '' }}</p>
                <p>CPF: {{ $forms[$i]['cnpj_cpf'] ?? '' }}<br>{{ $forms[$i]['telefone'] ?? '' }}<br>Rua {{ $forms[$i]['endereco'] ?? '' }} {{ $forms[$i]['numero'] ?? '' }}, {{ $forms[$i]['bairro'] ?? '' }}, {{ $forms[$i]['cidade'] ?? '' }} - {{ $forms[$i]['uf'] ?? '' }}, {{ $forms[$i]['cep'] ?? '' }}</p>
                <p style="text-align: right;">{{ $forms[$i]['cidade_pag'] ?? '' }}, {{ \Carbon\Carbon::parse($forms[$i]['dt_pagamento'])->format('d/m/Y')  }}</p>
                @if($forms[$i]['duas_vias'])
                <hr>
                <div class="recibo-header">
                    <h3>Recibo de Prestação de Serviço</h3>
                    <span class="recibo-via float-end">2ª Via</span>
                    <span class="recibo-via float-end"><b>Nº {{ $forms[$i]['num_recibo']}}</b></span>
                    <span class="recibo-valor">R$ {{ number_format($forms[$i]['valor'], 2, ',', '.') }}</span>
                </div>
                <p>
                    Recebi de 
                    <span class="recibo-destaque">
                        {{ $forms[$i]['pagador'] ?? '' }}
                    </span>
                     - CPF {{ $forms[$i]['cpf_cnpj'] ?? '' }}, a importância de
                    <span class="recibo-destaque">
                        {{ $this->numeroext($forms[$i]['valor']) }}
                    </span>
                    , referente {{ $forms[$i]['referente_artigo'] }} 
                    <b>
                        {{ $forms[$i]['referente'] ?? '' }}.
                    </b>
                </p>
                <p>
                    Para maior clareza, firmo o presente recibo, que comprova o recebimento integral do valor mencionado, concedendo 
                    <span class="recibo-destaque">quitação plena, geral e irrevogável</span> pela quantia recebida.
                </p>
                @if( $forms[$i]['forma_pagamento'] == 'pix')
                <p>Pagamento recebido por {{ $forms[$i]['quem_recebeu'] }} através da chave Pix: {{ $forms[$i]['banco'] }}, {{ $forms[$i]['chave'] }}.</p>
                @endif
                <p class="recibo-assinatura">_____________________________<br>prestador {{ $forms[$i]['prestador'] ?? '' }}</p>
                <p>CPF: {{ $forms[$i]['cnpj_cpf'] ?? '' }}<br>{{ $forms[$i]['telefone'] ?? '' }}<br>Rua {{ $forms[$i]['endereco'] ?? '' }} {{ $forms[$i]['numero'] ?? '' }}, {{ $forms[$i]['bairro'] ?? '' }}, {{ $forms[$i]['cidade'] ?? '' }} - {{ $forms[$i]['uf'] ?? '' }}, {{ $forms[$i]['cep'] ?? '' }}</p>
                <p style="text-align: right;">{{ $forms[$i]['cidade_pag'] ?? '' }}, {{ \Carbon\Carbon::parse($forms[$i]['dt_pagamento'])->format('d/m/Y')  }}</p>
                @endif
            </div>
        </div>
    </div>
    @endfor
</div>
