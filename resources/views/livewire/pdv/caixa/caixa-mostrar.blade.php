
<div>
    <div class='row'>
        <div class="col-3">
            <div class='card card-{{ $caixa->cor_status ?? "default" }}'>
                <div class='card-header'>
                    <h3 class='card-title'>Caixa</h3>
                    <div class="card-tools">
                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-default" href="{{ route('pdv.caixas.imprimir', $caixa->id ?? '0') }}" target="_blank" style="color: black;"><i class="fas fa-print"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='card-body box-profile pt-1'>
                    <h3 class='profile-username text-center'>{{ $caixa->rybeyykhpcgwkgr->nome }}</h3>
                    <p class='text-center text-muted'># {{ $caixa->id }} &nbsp; <span class='badge bg-{{ $caixa->cor_status ?? "" }}'>{{ $caixa->status ?? "" }}</span></p>
                    <ul class='list-group list-group-unbordered mb-3'>
                        <li class='list-group-item'>
                            <b>Usuário:</b> <a class='float-right'>{{ isset($caixa->kpakdkhqowIqzik) && $caixa->kpakdkhqowIqzik->count() > 0 ? optional($caixa->kpakdkhqowIqzik)->apelido :  'apelido' }}</a>
                        </li>
                        <li class='list-group-item'>
                            <b>Data do Caixa:</b> <a class='float-right'>{{ Carbon\Carbon::parse($caixa->dt_abertura ?? \Carbon\Carbon::now() )->format('d/m/Y H:i') }}</a>
                        </li>
                        @if(isset($caixa->status) && $caixa->status == 'Fechado')
                        <li class='list-group-item'>
                            <b>Fechado em:</b> <a class='float-right'>{{ \Carbon\Carbon::parse($caixa->dt_fechamento ?? \Carbon\Carbon::now() )->format('d/m/Y H:i') }}</a>
                        </li>
                        @endif
                        @if(isset($caixa->status) && $caixa->status == 'Validado')
                        <li class='list-group-item' style='padding-bottom: 0px'>
                            <b>Validado em:</b> <a class='float-right'>{{ \Carbon\Carbon::parse($caixa->dt_validacao ?? \Carbon\Carbon::now() )->format('d/m/Y H:i') }}</a>
                            <p class='text-muted text-right' style='margin-bottom: 0px'>Por: {{ $caixa->leichtmaeskrpdf->apelido ?? 'ERRO SHOW CAIXA 1' }}</p>
                        </li>
                        @endif
                        <li class='list-group-item'>
                            <b>Aberto com:</b> <a class='float-right'>R$ {{ number_format($caixa->vlr_abertura ?? 0, 2, ',', '.') }}</a>
                        </li>
                        <li class='list-group-item'>
                            @if(isset($caixa->status) && $caixa->status == 'Fechado')
                            <b>Fechado com:</b> <a class='float-right'>R$ {{ number_format($caixa->vlr_fechamento ?? 0, 2, ',', '.') }}</a>
                            @else
                            <b>Saldo Atual:</b> <a class='float-right'>R$ {{ number_format($caixa->saldo_atual ?? 0, 2, ',', '.') }}</a>
                            @endif
                        </li>
                        @if( isset($caixa->vlr_fechamento) )
                            @if( ($caixa->vlr_fechamento - $caixa->saldo_atual) >= 0.01 || ($caixa->vlr_fechamento - $caixa->saldo_atual) <= -0.01 && $caixa->status != 'Aberto' )
                            <li class='list-group-item'>
                                <b>Diferença:</b>
                                @if( ($caixa->vlr_fechamento - $caixa->saldo_atual ) > 0 )
                                <span class='badge bg-success'>Sobrando dinheiro no caixa</span>
                                @else
                                <span class='badge bg-danger'>Faltando dinheiro no caixa</span>
                                @endif
                                <a class='float-right'>R$ {{ number_format($caixa->vlr_fechamento - $caixa->saldo_atual, 2, ',', '.') }}</a>
                            </li>
                            @endif
                        @endif
                    </ul>
                </div>
                @if( $caixa->status == 'Aberto' && auth()->user()->id == $caixa->id_usuario_abertura )
                <div class='card-footer'>
                    <a href='{{ route('pdv.caixas.fechar', $caixa->id) }}' class='btn btn-block btn-success btn-sm'>Fechar</a>
                </div>
                @elseif(isset($caixa->status) && $caixa->status == 'Fechado')
                <div class='card-footer'>
                    <div class="row">
                        <div class="col-6">
                            @if( auth()->user()->id == $caixa->usuario_abertura && \Carbon\Carbon::parse($caixa->dt_abertura)->isToday() )
                            <a href='#' class='btn btn-block btn-warning btn-sm' wire:click="reabrir">Reabrir</a>
                            @endif
                        </div>
                        <div class="col-6">
                            @can('###############')
                            <a href='#' class='btn btn-block btn-success btn-sm' wire:click="validar">Validar</a>
                            @endif
                        </div>
                    </div>
                </div>
                @elseif(isset($caixa->status) && $caixa->status == 'Validado')
                <div class='card-footer'>
                    <a href='#' class='btn btn-block btn-default btn-sm'>Imprimir</a>
                </div>
                @endif
            </div>
        </div>
        
        <div class="col-9">
            <div class="row">
                <div class="col-6">
                    <div class='card card-primary'>
                        <div class='card-header'>
                            <h3 class='card-title'>Saídas</h3>
                            @if( $caixa->status == 'Aberto' && auth()->user()->id == $caixa->id_usuario_abertura && \Carbon\Carbon::parse($caixa->dt_abertura)->isToday() )
                            <div class="card-tools">
                                <div class="btn-toolbar">
                                    <div class="btn-group">
                                        <a href="#" onclick="lancamentos_direcionar('despesa_geral')" class="btn btn-sm btn-danger"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class='card-body p-0'>
                            <table class='table table-sm table-hover no-padding table-valign-middle projects'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th class='text-left'>#</th>
                                        <th class='text-left'>Pessoa > Descricao</th>
                                        <th class='text-right'>Valor</th>
                                        <th class='text-right'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($caixa->wskcngeadbjhpdu) && $caixa->wskcngeadbjhpdu->count() > 0)
                                    @forelse($caixa->wskcngeadbjhpdu->where('tipo', '=', 'D')->sortBy('id') as $saida)
                                    <tr>
                                        <td class='text-left'>{{ $saida->id }}</td>
                                        <td class='text-left'>
                                            @if( isset($saida->id_cliente) )
                                            {{ $saida->qexgzmnndqxmyks->apelido ?? $saida->id_cliente }} - {{ $saida->informacao }}
                                            @else
                                            {{ $saida->informacao }}
                                            @endif
                                        </td>
                                        <td class='text-right'>{{ number_format( $saida->vlr_final, 2, ',', '.') }}</td>
                                        <td class='text-center'><a href="{{ route('fin.lancamentos.mostrar', $saida->id) }}" target="_blank" class="text-muted" data-bs-tooltip="tooltip" data-bs-title="Visualizar" data-original-title="Visualizar"><i class="fa-solid fa-eye"></i></a>&nbsp;&nbsp;</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class='text-center' colspan='4'>Não há registros.</td>
                                    </tr>
                                    @endforelse
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if(isset($caixa->wskcngeadbjhpdu) && $caixa->wskcngeadbjhpdu->count() > 0)
                                    <tr>
                                        <th class='text-right' colspan='3'>{{ number_format( $caixa->wskcngeadbjhpdu->where('tipo', '=', 'D')->sum('vlr_final'), 2, ',', '.') }}</th>
                                        <th></th>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class='card card-primary'>
                        <div class='card-header'>
                            <h3 class='card-title'>Entradas</h3>
                            @if( $caixa->status == 'Aberto' && auth()->user()->id == $caixa->id_usuario_abertura && \Carbon\Carbon::parse($caixa->dt_abertura)->isToday() )
                            <div class="card-tools">
                                <div class="btn-toolbar">
                                    <div class="btn-group">
                                        <a href="#" onclick="lancamentos_direcionar('receita_geral')" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class='card-body p-0'>
                            <table class='table table-sm table-hover no-padding table-valign-middle projects'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th class='text-left'>#</th>
                                        <th class='text-left'>Pessoa > Descricao</th>
                                        <th class='text-right'>Valor</th>
                                        <th class='text-right'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($caixa->wskcngeadbjhpdu) && $caixa->wskcngeadbjhpdu->count() > 0)
                                    @forelse($caixa->wskcngeadbjhpdu->where('tipo', '=', 'R')->sortBy('id') as $entrada)
                                    <tr>
                                        <td class='text-left'>{{ $entrada->id }}</td>
                                        <td class='text-left'>
                                            @if( isset($entrada->id_cliente) )
                                            {{ $entrada->qexgzmnndqxmyks->apelido ?? $entrada->id_cliente }} - {{ $entrada->informacao }}
                                            @else
                                            {{ $entrada->informacao }}
                                            @endif
                                        </td>
                                        <td class='text-right'>{{ number_format( $entrada->vlr_final, 2, ',', '.') }}</td>
                                        <td class='text-center'><a href="{{ route('fin.lancamentos.mostrar', $entrada->id) }}" target="_blank" class="text-muted" data-bs-tooltip="tooltip" data-bs-title="Visualizar" data-original-title="Visualizar"><i class="fa-solid fa-eye"></i></a>&nbsp;&nbsp;</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class='text-center' colspan='4'>Não há registros.</td>
                                    </tr>
                                    @endforelse
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if(isset($caixa->wskcngeadbjhpdu) && $caixa->wskcngeadbjhpdu->count() > 0)
                                    <tr>
                                        <th class='text-right' colspan='3'>{{ number_format( $caixa->wskcngeadbjhpdu->where('tipo', '=', 'R')->sum('vlr_final'), 2, ',', '.') }}</th>
                                        <th></th>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class='card card-primary'>
                        <div class='card-header'>
                            <h3 class='card-title'>Transferências</h3>
                            @if( $caixa->status == 'Aberto' && auth()->user()->id == $caixa->id_usuario_abertura && \Carbon\Carbon::parse($caixa->dt_abertura)->isToday() )
                            <div class="card-tools">
                                <div class="btn-toolbar">
                                    <div class="btn-group">
                                        <a href="#" onclick="lancamentos_direcionar('transferencia')" class="btn btn-sm btn-default" style="color: black;"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class='card-body p-0'>
                            <table class='table table-sm table-hover no-padding table-valign-middle projects'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th class='text-left'>#</th>
                                        <th class='text-left'>Pessoa > Descricao</th>
                                        <th class='text-right'>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($caixa->wskcngeadbjhpdu) && $caixa->wskcngeadbjhpdu->count() > 0)
                                    @forelse($caixa->wskcngeadbjhpdu->where('tipo', '=', 'T')->sortBy('id') as $transferencia)
                                    <tr>
                                        <td class='text-left'>{{ $transferencia->id }}</td>
                                        <td class='text-left'>
                                            @if( isset($transferencia->id_cliente) )
                                            {{ $transferencia->qexgzmnndqxmyks->apelido ?? $transferencia->id_cliente }} - {{ $transferencia->informacao }}
                                            @else
                                            {{ $transferencia->informacao }}
                                            @endif
                                        </td>
                                        <td class='text-right'>{{ number_format( $transferencia->vlr_final, 2, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class='text-center' colspan='3'>Não há registros.</td>
                                    </tr>
                                    @endforelse
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if(isset($caixa->wskcngeadbjhpdu) && $caixa->wskcngeadbjhpdu->count() > 0)
                                    <tr>
                                        <th class='text-right' colspan='3'>{{ number_format( $caixa->wskcngeadbjhpdu->where('tipo', '=', 'T')->sum('vlr_final'), 2, ',', '.') }}</th>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-4">
            <div class='card card-primary'>
                <div class='card-header'>
                    <h3 class='card-title'>Formas de Pagamentos</h3>
                </div>
                <div class='card-body p-0'>
                    <table class='table table-sm table-hover no-padding table-valign-middle projects'>
                        <thead class='table-dark'>
                            <tr>
                                <th class='text-left'>Descricao</th>
                                <th class='text-right'>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($caixa->ssqlnxsbyywplan) && $caixa->ssqlnxsbyywplan->count() > 0)
                            @forelse($caixa->ssqlnxsbyywplan->sortBy('id_forma_pagamento')->groupBy('qmbnkthuczqdsdn.forma') as $forma => $pagamentos)
                            <tr data-widget='expandable-table' aria-expanded='true' style='background-color: ghostwhite;' >
                                <td class='text-left'><i class='expandable-table-caret fas fa-caret-right fa-fw'></i> {{ $forma }}</td>
                                <td class='text-right'>{{ number_format( $pagamentos->sum('valor'), 2, ',', '.') }}</td>
                            </tr>
                            <tr class='expandable-body'>
                                <td colspan='2'>
                                    <div class='p-0'>
                                        <table class='table table-hover m-0' style="width: -webkit-fill-available;">
                                            <tbody>
                                                @foreach($pagamentos->groupBy('qmbnkthuczqdsdn.bandeira') as $bandeira => $pagamento)
                                                <tr data-widget='expandable-table' aria-expanded='true'>
                                                    <td class='text-left' style='border-bottom-width: 0px;'>{{ $bandeira }}</td>
                                                    <td class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $pagamento->sum('valor'), 2, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class='text-center' colspan='2'>Não há pagamentos registrados.</td>
                            </tr>
                            @endforelse
                            @endif
                        </tbody>
                        <tfoot>
                            @if(isset($caixa->ssqlnxsbyywplan) && $caixa->ssqlnxsbyywplan->count() > 0)
                            <tr>
                                <th class='text-right' colspan='2'>{{ number_format( $caixa->ssqlnxsbyywplan->sum('valor'), 2, ',', '.') }}</th>
                            </tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-8">
            <div class='card card-primary'>
                <div class='card-header'>
                    <h3 class='card-title'>Vendas</h3>
                </div>
                <div class='card-body p-0'>
                    <table class='table table-sm table-hover no-padding table-valign-middle projects'>
                        <thead class='table-dark'>
                            <tr>
                                <th width="10%" class='text-left'>#</th>
                                <th width="" colspan='2' class='text-left'>Clientes  Produtos</th>
                                <th width="10%" class='text-right'>Vlr Prod/Serv.</th>
                                <th width="10%" class='text-right'>Vlr. Negoc.</th>
                                <th width="10%" class='text-right'>Dsc/Acr</th>
                                <th width="10%" class='text-right'>Vlr. Final</th>
                                <th width="5%"  class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($caixa->rtafathibgwfust) && $caixa->rtafathibgwfust->count() > 0)
                            @forelse($caixa->rtafathibgwfust->sortBy('id') as $key => $venda)
                            <tr data-widget='expandable-table' aria-expanded='false' style='background-color: ghostwhite;'>
                                <td width="10%" class='text-left'>
                                    <i class='expandable-table-caret fas fa-caret-right fa-fw'></i>
                                    <a href="" data-bs-toggle="modal" onclick="vendas_mostrar_modal({{ $venda->id }})">
                                        <span class="badge bg-pink">{{ $venda->id }}</span>
                                    </a>
                                </td>
                                <td width="" class='text-left' colspan='2'>{{ $venda->lufqzahwwexkxli->apelido ?? '(Cliente sem cadastro)' }}</td>
                                <td width="10%" class='text-right'>{{ number_format( $venda->vlr_prod_serv, 2, ',', '.') }}</td>
                                <td width="10%" class='text-right'>{{ number_format( $venda->vlr_negociado, 2, ',', '.') }}</td>
                                <td width="10%" class='text-right'>{{ number_format( $venda->vlr_dsc_acr, 2, ',', '.') }}</td>
                                <td width="10%" class='text-right'>{{ number_format( $venda->vlr_final, 2, ',', '.') }}</td>
                                <td width="10%" class='text-center'>
                                    <a wire:click="$dispatch('pdv-comanda-comandamostrar', { id: {{ $venda->id }} })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                                </td>
                            </tr>
                            <tr class='expandable-body'>
                                <td colspan='8'>
                                    <div class='p-0'>
                                        <table class='table table-hover m-0' style="width: -webkit-fill-available;">
                                            <tbody>
                                                @foreach($venda->dfyejmfcrkolqjh as $produto)
                                                <tr data-widget='expandable-table'>
                                                    <td width="10%"></td>
                                                    <td width="" class='text-left' colspan="2" style='border-bottom-width: 0px;'>{{ $produto->kcvkongmlqeklsl->nome ?? $produto->id_servprod }}</td>
                                                    <td width="10%" class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $produto->vlr_venda, 2, ',', '.') }}</td>
                                                    <td width="10%" class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $produto->vlr_negociado, 2, ',', '.') }}</td>
                                                    <td width="10%" class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $produto->vlr_dsc_acr, 2, ',', '.') }}</td>
                                                    <td width="10%" class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $produto->vlr_final, 2, ',', '.') }}</td>
                                                    <td width="10%"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class='text-center' colspan='6'>Não há pagamentos registrados.</td>
                            </tr>
                            @endforelse
                            @endif
                        </tbody>
                        <tfoot>
                            @if(isset($caixa->rtafathibgwfust) && $caixa->rtafathibgwfust->count() > 0)
                            <tr>
                                <th class='text-right' colspan='6'>{{ number_format( $caixa->rtafathibgwfust->sum('vlr_final'), 2, ',', '.') }}</th>
                            </tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class='card card-primary'>
                    <div class='card-header'>
                        <h3 class='card-title'>Cartões liquidados</h3>
                    </div>
                    <div class='card-body p-0'>
                        <table class='table table-sm table-hover no-padding table-valign-middle projects'>
                            <thead class='table-dark'>
                                <tr>
                                    <th class='text-left'>Forma</th>
                                    <th class='text-left'>Bandeira</th>
                                    <th class='text-right'>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($caixa->fjjeiofuwerwqouw as $cartao)
                                <tr>
                                    <td class='text-left' style='border-bottom-width: 0px;'>{{ $cartao->gevmgwjvzgdexwm->forma ?? $cartao->id_pagamento ?? '' }}</td>
                                    <td class='text-left' style='border-bottom-width: 0px;'>{{ $cartao->gevmgwjvzgdexwm->bandeira ?? $cartao->id_pagamento ?? 'aaaaa' }}</td>
                                    <td class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $cartao->vlr_final, 2, ',', '.') }}</td>                                    
                                </tr>
                                @empty
                                <tr>
                                    <td class='text-center' colspan='3'>Não houve cartões liquidados neste caixa.</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    @if(isset($caixa->fjjeiofuwerwqouw) && $caixa->fjjeiofuwerwqouw->count() > 0)
                                    <th class='text-right' colspan='3'>{{ number_format( $caixa->fjjeiofuwerwqouw->sum('vlr_final'), 2, ',', '.') }}</th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
