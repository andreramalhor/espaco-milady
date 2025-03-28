<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Vendas</h3>

            <div class="card-tools">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary {{ $quadro == 'resumo' ? 'active' : ''}}" wire:click="trocar_quadro('resumo')">
                        <i class="fa-solid fa-table-cells-large"></i>
                    </label>
                    <label class="btn btn-secondary {{ $quadro == 'detalhe' ? 'active' : ''}}" wire:click="trocar_quadro('detalhe')">
                        <i class="fa-solid fa-table-cells"></i>    
                    </label>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fa fa-filter"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h6>Filtros</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label>Período</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">De</span>
                                </div>
                                <input type="date" class="form-control" wire:model.live="inicio">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">à</span>
                                </div>
                                <input type="date" class="form-control" wire:model.live="final">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control" wire:model.live="p_id_cliente">
                            <option>Todos</option>
                            <option>(Cliente não cadastrado)</option>
                            @foreach(\App\Models\Atendimento\Pessoa::orderBy('apelido', 'asc')->get() as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->apelido }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @if($quadro == 'resumo')
        <div class="table-responsive">
            <p>
                Vendas por período    
            </p>
            <table class="table">
                <thead class="table-dark">
                    <tr>    
                        <th class="text-center">Data</th>
                        <th class="text-center">Valor Bruto</th>
                        <th class="text-center">Desconto</th>
                        <th class="text-center">Valor Líquido</th>
                        <th class="text-center">Valor Pago</th>
                        <th class="text-center">Comissão</th>
                        <th class="text-center">Saldo Aberto</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $data         = $vendas_caixas->first()->dt_abertura;
                        $valor_bruto  = 0;
                        $desconto     = 0;
                        $vlr_final    = 0;
                        $vlr_pago     = 0;
                        $comissao     = 0;
                        $saldo_aberto = 0;
                    @endphp

                    @forelse($vendas_caixas as $caixa)
                        @if(\Carbon\Carbon::parse($caixa->dt_abertura)->format('Y-m-d') === \Carbon\Carbon::parse($data)->format('Y-m-d'))
                            @foreach ($caixa->rtafathibgwfust as $venda)
                                @foreach ($venda->dfyejmfcrkolqjh as $detalhes)
                                    @php
                                        $valor_bruto  = 0;
                                        $desconto     = 0;
                                        $vlr_final    = $vlr_final + $detalhes->vlr_final;
                                        $vlr_pago     = 0;
                                        $comissao     = 0;
                                        $saldo_aberto = 0;
                                    @endphp
                                @endforeach
                            @endforeach
                        @endif


                        <tr class="bg-red">
                            <td class="p-0 text-center">
                                <small>{{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</small>
                            </td>
                            <td class="p-0 text-center">
                                {{ number_format($vlr_final, 2, ',', '.') }}
                            </td>
                        </tr>





                        {{--

                                


                        <td class="p-0 text-right">
                            @foreach($caixas as $caixa)
                            @dd($caixa)
                            {{ $vlr_final = $vlr_final + $caixa->sum('vlr_final') }}
                            @endforeach
                        </td>
                        <td class="p-0 text-center">
                            <small>{{ $ciclo->first()->opadsiwmeqwiiwe->id }}</small>
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            {{ $ciclo->first()->id_cliente == 0 ? '(Cliente não cadastrado)' : $ciclo->first()->lufqzahwwexkxli->apelido }}
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            $ciclo->first()->kcvkongmlqeklsl->nome
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            {{ isset($ciclo->first()->flielwjewjdasld->apelido) ? $ciclo->first()->flielwjewjdasld->apelido : '' }}
                        </td>
                        <td class="p-0 text-right">
                            number_format($ciclo->first()->vlr_final - $ciclo->first()->hgihnjekboyabez->valor , 2, ',', '.')
                        </td>
                        <td class="p-0 text-right pr-2">
                            {{ number_format( $ciclo->first()->vlr_final, 2, ',', '.') }}
                        </td>
                        --}}
                    

                    @empty
                    <tr>
                        <td colspan="5" class="text-center"><small>Não há vendas no período</small></td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">{{ $vendas_caixas->count() }}</th>
                        <th class="text-center"></th>
                        <th class="text-left"></th>
                        <th class="text-left"></th>
                        <th class="text-right">{{ number_format( $vendas_caixas->sum('vlr_final'), 2, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        @elseif($quadro == 'detalhe')
        <div class="table-responsive p-0">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Caixa</th>
                        <th class="text-center">Dt Abertura</th>
                        <th class="text-left">Cliente</th>
                        {{--
                        <th class="text-left">Qtd Serv/Prod</th>
                        --}}
                        <th class="text-right">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vendas_detalhes as $ciclo)
                    <tr>
                        <td class="p-0 text-center">
                            <small>{{ $ciclo->id }}</small>
                        </td>
                        <td class="p-0 text-center">
                            <small>{{ $ciclo->opadsiwmeqwiiwe->id }}</small>
                        </td>
                        <td class="p-0 text-center">
                            {{ \Carbon\Carbon::parse($ciclo->opadsiwmeqwiiwe->dt_abertura)->format('d/m/Y') }}
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            {{ $ciclo->id_cliente == 0 ? '(Cliente não cadastrado)' : $ciclo->lufqzahwwexkxli->apelido }}
                        </td>
                        {{--
                        <td class="p-0 text-left text-nowrap">
                            $ciclo->kcvkongmlqeklsl->nome
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            {{ isset($ciclo->flielwjewjdasld->apelido) ? $ciclo->flielwjewjdasld->apelido : '' }}
                        </td>
                        <td class="p-0 text-right">
                            number_format($ciclo->hgihnjekboyabez->valor, 2, ',', '.')
                        </td>
                        <td class="p-0 text-right">
                            number_format($ciclo->vlr_final - $ciclo->hgihnjekboyabez->valor , 2, ',', '.')
                        </td>
                        --}}
                        <td class="p-0 text-right pr-2">
                            {{ number_format( $ciclo->vlr_final, 2, ',', '.') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center"><small>Não há vendas no período</small></td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">{{ $vendas_detalhes->count() }}</th>
                        <th class="text-center"></th>
                        <th class="text-left"></th>
                        <th class="text-left"></th>
                        <th class="text-right">{{ number_format( $vendas_detalhes->sum('vlr_final'), 2, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        @endif

        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $vendas_detalhes->links() }}
            </div>
        </div>
    </div>

</div>
