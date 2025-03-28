<div>
    <div class="row">
        <div class="col-3">
            <div class="col-12">
                <div class="card card-{{ $caixa->cor_status ?? 'default' }} card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">#ID do Caixa: {{ $caixa->id }}</h3>
                        <p class="text-muted text-center">{{ $caixa->rybeyykhpcgwkgr->nome }} <span class="badge bg-{{ $caixa->cor_status }}">{{ $caixa->status }}</span></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Usuário:</b> <a class="float-right text-dark">{{ $caixa->kpakdkhqowIqzik->apelido }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Data do caixa:</b> <a class="float-right text-dark">{{ Carbon\Carbon::parse($caixa->dt_abertura)->format('d/m/Y H:i') }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Aberto com:</b> <a class="float-right text-dark">R$ {{ number_format($caixa->vlr_abertura, 2, ',', '.') }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Saldo atual:</b> <a class="float-right text-dark">R$ {{ number_format($caixa->saldo_atual, 2, ',', '.') }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Saldo dinheiro:</b> <a class="float-right text-dark"><span>R$ {{ number_format($saldo_dinheiro, 2, ',', '.') }}</span></a>
                            </li>
                            <li class="list-group-item">
                                <b>Diferença da contagem:</b> <a class="float-right text-dark"><span>R$ {{ number_format($diferenca ?? 0, 2, ',', '.') }}</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-default" href="{{ url()->previous() }}">Voltar</a>
                        @if($fechar)
                        <button type="button" class="btn btn-danger float-end" wire:click="fechar_caixa">Fechar Caixa</button>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <h3 class="card-title text-left">Resumo</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table">
                            <tbody>
                                @foreach($caixa->ssqlnxsbyywplan->groupby('qmbnkthuczqdsdn.forma') as $key => $cada)
                                <tr>
                                    <td class="align-middle">{{ $key }}</td>
                                    <td class="align-middle text-center">( {{ $cada->groupBy('id_venda')->count() }} )</td>
                                    <td class="align-middle text-right">
                                        R$ {{ number_format($cada->sum('valor'), 2, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-left">Contagem das Notas</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/nota200.png') }}" alt="200 reais" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('nota200')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('nota200')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $nota200 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_nota200">R$ {{ number_format($nota200 * 200, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/nota100.png') }}" alt="100 reais" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('nota100')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('nota100')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $nota100 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_nota100">R$ {{ number_format($nota100 * 100, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/nota50.png') }}" alt="50 reais" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('nota050')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('nota050')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $nota050 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_nota50">R$ {{ number_format($nota050 * 50, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/nota20.png') }}" alt="20 reais" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('nota020')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('nota020')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $nota020 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_nota20">R$ {{ number_format($nota020 * 20, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/nota10.png') }}" alt="10 reais" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('nota010')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('nota010')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $nota010 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_nota10">R$ {{ number_format($nota010 * 10, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/nota5.png') }}" alt="5 reais" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('nota005')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('nota005')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $nota005 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_nota5">R$ {{ number_format($nota005 * 5, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/nota2.png') }}" alt="2 reais" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('nota002')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('nota002')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $nota002 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_nota2">R$ {{ number_format($nota002 * 2, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="align-middle text-right">
                                    <b><span>R$ {{ number_format($saldo_notas, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>    
            </div>
        </div>
        
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title text-left">Contagem das Moedas</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/moeda100.png') }}" alt="1 real" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('moeda100')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('moeda100')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $moeda100 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_moeda100">R$ {{ number_format($moeda100 * 1, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/moeda50.png') }}" alt="50 centavos" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('moeda050')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('moeda050')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $moeda050 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_moeda50">R$ {{ number_format($moeda050 * 0.50, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/moeda25.png') }}" alt="25 centavos" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('moeda025')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('moeda025')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $moeda025 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_moeda25">R$ {{ number_format($moeda025 * 0.25, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/moeda10.png') }}" alt="10 centavos" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('moeda010')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('moeda010')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $moeda010 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_moeda10">R$ {{ number_format($moeda010 * 0.10, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/moeda5.png') }}" alt="5 centavos" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('moeda005')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('moeda005')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $moeda005 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_moeda5">R$ {{ number_format($moeda005 * 0.05, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img style="height: 40px;" src="{{ asset('/stg/img/pdv/caixa/moedas/moeda1.png') }}" alt="1 centavo" />
                                </td>
                                <td class="align-middle">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" wire:click="mais('moeda001')"> + </a>
                                        <a class="btn btn-sm btn-danger" wire:click="menos('moeda001')"> - </a>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <span>{{ $moeda001 ?? 0 }}</span>
                                </td>
                                <td class="align-middle text-center">=</td>
                                <td class="align-middle text-right">
                                    <b><span id="vlr_moeda1">R$ {{ number_format($moeda001 * 0.01, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="align-middle text-right">
                                    <b><span>R$ {{ number_format($saldo_moedas, 2, ',', '.') }}</span></b>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>    
            </div>
        </div>
        
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title text-left">Automáticos</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                            @forelse($caixa->ssqlnxsbyywplan->sortBy('id_forma_pagamento')->groupBy('qmbnkthuczqdsdn.forma') as $forma => $pagamentos)
                                @if($forma == "Dinheiro")
                                    <tr>
                                        <td class="align-middle" colspan="2">{{ $forma }}</td>
                                        <td class="align-middle text-right" id="vlr_especie">R$ 0,00</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="align-middle">{{ $forma }}</td>
                                        <td class="align-middle">{{ $pagamentos->groupBy('id_venda')->count() }}</td>
                                        <td class="align-middle text-right">R$ {{ number_format( $pagamentos->sum('valor'), 2, ',', '.') }}</td>
                                    </tr>
                                    @foreach($pagamentos->groupBy('id_venda') as $id_venda => $pagamento)
                                        @foreach($pagamento->groupBy('qmbnkthuczqdsdn.bandeira') as $bandeira => $valores)
                                        <tr style="background-color: lightgrey;">
                                            <td class="text-left">
                                                <input type="checkbox" wire:model.live="cartoes_marcados" wire:click="atualizar_saldos" value="{{ $valores[0]['id'] }}">&nbsp;&nbsp;&nbsp;{{ $bandeira }}
                                            </td>
                                            <td class="text-left">{{ $id_venda }}</td>
                                            <td class="text-right">{{ number_format( $valores->sum('valor'), 2, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                            @empty
                                <tr>
                                    <td class='text-center' colspan='2'>Não há pagamentos registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
