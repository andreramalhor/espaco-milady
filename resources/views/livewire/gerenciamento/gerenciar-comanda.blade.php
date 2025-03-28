<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cliente</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if(!$cliente_alterar)
                    <div class="col-4">
                        <div class="form-group">
                            <label>Cliente</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $comanda->lufqzahwwexkxli->apelido ?? '(Cliente sem cadastro)' }}" readonly>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $comanda->lufqzahwwexkxli->cpf_cnpj ?? '000.000.000-00' }}" readonly>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>Saldo Conta</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $comanda->lufqzahwwexkxli->saldo_conta ?? '0,00' }}" readonly>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-block btn-primary btn-sm" wire:click="editar_cliente()"><i class="fa-solid fa-pen-to-square"></i></button>
                        </div>
                    </div>
                    @else                    
                    <div class="col-4">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select class="form-control form-control-sm" wire:model.live="id_cliente">
                                <option value="0">( Cliente sem cadastro )</option>
                                @foreach(\App\Models\Atendimento\Pessoa::orderBy('nome', 'asc')->get() as $cliente)
                                <option {{ $comanda->id_cliente == $cliente->id ? 'selected' : '' }} value="{{ $cliente->id }}">{{ $cliente->nomes }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $comanda->lufqzahwwexkxli->cpf_cnpj ?? '000.000.000-00' }}" readonly>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>Saldo Conta</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $comanda->lufqzahwwexkxli->saldo_conta ?? '0,00' }}" readonly>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-block btn-success btn-sm" wire:click="atualizar_cliente()"><i class="fa-solid fa-floppy-disk"></i></button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Serviços </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <label>Serviço</label>
                    </div>
                    <div class="col-1">
                        <label>Qtd</label>
                    </div>
                    <div class="col-1">
                        <label>vlr_venda</label>
                    </div>
                    <div class="col-1">
                        <label>vlr_negociado</label>
                    </div>
                    <div class="col-1">
                        <label>vlr_dsc_acr</label>
                    </div>
                    <div class="col-1">
                        <label>vlr_final</label>
                    </div>
                    <div class="col-2">
                        <label>Profissional</label>
                    </div>
                    <div class="col-1">
                        <label>Percentual</label>
                    </div>
                    <div class="col-1">
                        <label>Comissão</label>
                    </div>
                    <div class="col-1">
                        <label>&nbsp;</label>
                    </div>
                </div>
                @foreach($venda_detalhes as $id_detalhe => $detalhe)
                    @if(!$detalhe['edit'])
                    <div class="row pb-1">
                        <div class="px-1" style="width: 5%;">
                            {{ $id_detalhe }}
                        </div>
                        <div class="px-1" style="width: 13%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['nome_servprod'] }}" readonly>
                        </div>
                        <div class="px-1" style="width: 5%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['quantidade'] }}" readonly>
                        </div>
                        <div class="px-1" style="width: 8%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_venda'] }}" readonly>
                        </div>
                        <div class="px-1" style="width: 8%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_negociado'] }}" readonly>
                        </div>
                        <div class="px-1" style="width: 8%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_dsc_acr'] }}" readonly>
                        </div>
                        <div class="px-1" style="width: 8%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_final'] }}" readonly>
                        </div>
                        <div class="px-1" style="width: 18%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['nome_pessoa'] }}" readonly>
                        </div>
                        <div class="px-1" style="width: 8%;">
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['percentual'] * 100 }}" readonly>
                        </div>
                        <div class="px-1" style="width: 5%;">
                            @if( $detalhe['status'] == 'Em Aberto')
                            <input type="text" class="form-control form-control-sm border border-warning" value="{{ $detalhe['valor'] }}">
                            @elseif( $detalhe['status'] == 'Pago')
                            <input type="text" class="form-control form-control-sm border border-success" value="{{ $detalhe['valor'] }}">
                            @else
                            <input type="text" class="form-control form-control-sm" value="{{ $detalhe['valor'] }}">
                            @endif
                        </div>
                        <div class="px-1" style="width: 5%;">
                        </div>
                        <div class="px-1" style="width: 5%;">
                        </div>
                        <div class="px-1" style="width: 5%;">
                            @if($detalhe['edit'] == false)
                            <button type="button" class="btn btn-block btn-primary btn-sm" wire:click="editar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-pen-to-square"></i></button>
                            @endif
                        </div>
                    </div>
                    @else
                    <form>
                        <div class="row pb-1">
                            <div class="px-1" style="width: 5%;">
                                {{ $id_detalhe }}
                            </div>
                            <div class="px-1" style="width: 15%;">
                                <select class="form-control form-control-sm" wire:model="id_servprod">
                                    @foreach(\App\Models\Catalogo\ServicoProduto::orderBy('nome', 'asc')->get() as $servico)
                                    <option {{ $detalhe['id_servprod'] == $servico->id ? 'selected' : '' }} value="{{ $servico->id }}">{{ $servico->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="px-1" style="width: 5%;">
                                <input type="text" class="form-control form-control-sm" wire:model="quantidade" value="{{ $detalhe['quantidade'] }}">
                            </div>
                            <div class="px-1" style="width: 10%;">
                                <input type="text" class="form-control form-control-sm" wire:model="vlr_venda" value="{{ $detalhe['vlr_venda'] }}">
                            </div>
                            <div class="px-1" style="width: 10%;">
                                <input type="text" class="form-control form-control-sm" wire:model="vlr_negociado" value="{{ $detalhe['vlr_negociado'] }}">
                            </div>
                            <div class="px-1" style="width: 10%;">
                                <input type="text" class="form-control form-control-sm" wire:model="vlr_dsc_acr" value="{{ $detalhe['vlr_dsc_acr'] }}">
                            </div>
                            <div class="px-1" style="width: 10%;">
                                <input type="text" class="form-control form-control-sm" wire:model="vlr_final" value="{{ $detalhe['vlr_final'] }}">
                            </div>
                            <div class="px-1" style="width: 15%;">
                                <select class="form-control form-control-sm" wire:model="id_pessoa">
                                    <option value="">-</option>
                                    @foreach(\App\Models\Atendimento\Pessoa::orderBy('nome', 'asc')->get() as $profissional)
                                    <option {{ $detalhe['id_pessoa'] == $profissional->id ? 'selected' : '' }} value="{{ $profissional->id }}">{{ $profissional->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="px-1" style="width: 5%;">
                                <input type="text" class="form-control form-control-sm" wire:model="percentual" value="{{ $detalhe['percentual'] * 100 }}">
                            </div>
                            <div class="px-1" style="width: 10%;">
                                @if( $detalhe['status'] == 'Em Aberto')
                                <input type="text" class="form-control form-control-sm border border-warning" wire:model="valor" value="{{ $detalhe['valor'] }}">
                                @elseif( $detalhe['status'] == 'Pago')
                                <input type="text" class="form-control form-control-sm border border-success" wire:model="valor" value="{{ $detalhe['valor'] }}">
                                @else
                                <input type="text" class="form-control form-control-sm" wire:model="valor" value="{{ $detalhe['valor'] }}">
                                @endif
                            </div>
                            <div class="px-1" style="width: 4%;">
                                @if($detalhe['edit'] == true)
                                <button type="button" class="btn btn-block btn-warning btn-sm" wire:click="cancelar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-xmark"></i></button>
                                @endif
                            </div>
                            <div class="px-1" style="width: 4%;">
                                @if($detalhe['edit'] == true)
                                <button type="button" class="btn btn-block btn-danger btn-sm" wire:click="deletar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-trash-can"></i></button>
                                @endif
                            </div>
                            <div class="px-1" style="width: 4%;">
                                @if($detalhe['edit'] == true)
                                <button type="button" class="btn btn-block btn-success btn-sm" wire:click="atualizar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-floppy-disk"></i></button>
                                @endif
                            </div>
                        </div>
                    </form>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalhes da comanda: {{ $comanda->id }}</h3>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="row">
                        <table width="100%">
                            <tr>
                                <td rowspan="4" class="text-center" width="75"><img src="{{ asset('img/atendimentos/pessoas/0.png') }}" alt="{{ $empresa->nome ?? 'Nome da Empresa' }}" width="75" style="margin-right: 50px;"></td>
                                <td><strong>{{ $empresa->nome ?? 'Nome da Empresa' }}</strong></td>
                                <td width="26%" rowspan="4" class="text-center" style="vertical-align: top;"><h4 class="text-left"><strong><font>Recibo de Comanda</font></strong></h4>&emsp;</td>
                                <td><strong>ID Comanda: &nbsp;</strong><span>{{ $comanda->id }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>CNPJ: &nbsp;</strong>{{ $empresa->cnpj ?? 'CNPJ' }}</td>
                                <td><strong>ID Caixa: &nbsp;</strong><a target="_blank" class="badge bg-pink"><span>{{ $comanda->id_caixa }}</span></a></td>
                            </tr>
                            <tr>
                                <td><strong>Telefone: &nbsp;</strong>{{ $empresa->telefone_fixo ?? 'Telefone' }}</td>
                                <td><strong>Data Compra: &nbsp;</strong><span>{{ \Carbon\Carbon::parse($comanda->created_at)->format('d/m/Y H:i:s') }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>e-Mail: &nbsp;</strong>{{ $empresa->email ?? 'email@email.com' }}</td>
                                <td><strong class="d-none">Vendedor: &nbsp;</strong><span></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 form-group">
                            <h5 style="border-bottom: 1px solid lightgray; margin: 0px;">Dados do Cliente</h5>
                            <table width="100%">
                                <tr>
                                <td style="width:1%; white-space:nowrap;"><strong>ID Cliente: </strong><a target="_blank" class="badge bg-pink"><span onclick="pessoas_mostrar_card({{ $comanda->id_cliente }})" style="cursor: pointer;">{{ $comanda->id_cliente }}</span></a>&emsp;&nbsp;&emsp;</td>
                                <td><strong>Nome: </strong><span>{{ $comanda->lufqzahwwexkxli->apelido ?? '(Cliente sem cadastro)' }}</span></td>
                                <td class="text-right"><strong>CPF: &nbsp;</strong><span>{{ $comanda->lufqzahwwexkxli->cpf ?? ' - ' }}</span></td>
                                </tr>
                            </table>
                            @if ( isset($comanda->lufqzahwwexkxli->uqbchiwyagnnkip) && count($comanda->lufqzahwwexkxli->uqbchiwyagnnkip) >= 1 )
                            <table width="100%">
                                <tr>
                                <td><strong>Endereço: </strong>{{ $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->logradouro ?? '' }}</td>
                                <td><strong>Nº: </strong>{{ $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->numero ?? '' }}</td>
                                @if( $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->complemento != '' )
                                <td><strong>Comp.: </strong>{{ $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->complemento ?? '' }}</td>
                                @endif
                                <td><strong>Bairro: </strong>{{ $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->bairro ?? '' }}</td>
                                <td><strong>Cidade: </strong>{{ $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->cidade ?? '' }}</td>
                                <td><strong>UF: </strong>{{ $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->uf ?? '' }}</td>
                                <td class="text-right"><strong>CEP: </strong>{{ $comanda->lufqzahwwexkxli->uqbchiwyagnnkip->first()->cep ?? '' }}</td>
                                </tr>
                            </table>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <h5 style="border-bottom: 1px solid lightgray; margin: 0px;">Dados do Pagamento</h5>
                            <table class="table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-left">Forma</th>
                                    <th class="text-left">Parcela</th>
                                    <th class="text-left">Dt prevista</th>
                                    <th class="text-right">Valor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($comanda->xzxfrjmgwpgsnta as $pagamento )
                                <tr>
                                    <td class="text-left">{{ $pagamento->qmbnkthuczqdsdn->forma == $pagamento->qmbnkthuczqdsdn->bandeira ? $pagamento->qmbnkthuczqdsdn->forma : $pagamento->qmbnkthuczqdsdn->forma.' - '.$pagamento->qmbnkthuczqdsdn->bandeira }}</td>
                                    <td class="text-left">{{ $pagamento->parcela }}</td>
                                    <td class="text-left">{{ \Carbon\Carbon::parse($pagamento->dt_prevista)->format('d/m/Y') }}</td>
                                    <td class="text-right">{{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="4"></td>
                                </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-right" colspan="4">{{ number_format($comanda->xzxfrjmgwpgsnta->sum('valor'), 2, ',', '.') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn  btn-success url()->previous() }}">Voltar</a>
                <a class="btn  btn-success route('pdv.comandas.imprimir', $comanda->id) }}" target="_blank" style="color: black;"><i class="fas fa-print"></i> Imprimir</a>
            </div>
        </div>
    </div>
</div>