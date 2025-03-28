<div class="row p-0">
    <table class="table table-bordered table-sm table-striped">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Data</th>
                <th class="text-center" style="width: 100px;"># Comanda</th>
                <th class="text-center">Origem</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Percentual</th>
                <th class="text-center">Valor</th>
                <th class="text-center">Saldo</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-left: 5px solid white;">
                <td class="p-0"></td>
                <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_comanda"  placeholder="# Comanda"></td>
                <td class="p-0 pl-1 py-1">
                    <select class="form-control form-control-sm form-block" wire:model.change="p_fonte_origem">
                        <option value="{{null}}">Todos</option>
                        <option value="pdv_vendas_pagamentos">Pagamento de comanda</option>
                        <option value="pdv_vendas_detalhes">Serviço executado</option>
                        <option value="fin_lancamentos">fin_lancamentos</option>
                    </select>
                </td>
                <td class="p-0"></td>
                <td class="p-0"></td>
                <td class="p-0"></td>
                <td class="text-right text-green">
                    <b>
                        {{ number_format(0, 2, ',', '.') }}
                    </b>
                </td>
                <td class="p-0"></td>
            </tr>
            @php($saldo_total = 0)
            @foreach($conta_saldo as $ciclo)
            <tr>
                <td class="text-center">{{ \Carbon\Carbon::parse($ciclo->created_at)->format('d/m/Y H:i') }}</td>
                <td class="text-center">{{ $ciclo->origem_id }}
                    <a wire:click="$dispatch('pdv-comanda-comandamostrar', { id: {{ $ciclo->origem_id }} })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                </td>
                <td class="text-center">{{ $ciclo->fonte_origem }}</td>
                <td class="text-center">{{ $ciclo->tipo }}</td>
                <td class="text-center">{{ $ciclo->percentual }}</td>
                <td class="text-right  
                    @if($ciclo->valor < 0)
                        text-red
                    @else
                        text-green
                    @endif
                    "><b>
                        {{ number_format($ciclo->valor, 2, ',', '.') }}
                    </b>
                </td>
                @php($saldo_total = $ciclo->valor + $saldo_total)
                <td class="text-right  
                    @if($saldo_total < 0)
                        text-red
                    @else
                        text-green
                    @endif
                    "><b>
                        {{ number_format($saldo_total, 2, ',', '.') }}
                    </b>
                </td>
                <td class="text-center">{{ $ciclo->status }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="p-0 text-left" colspan="2">
                    {{ $conta_saldo->count() }} / {{ $pessoinha->opmnhtrvansmesd->count() }}
                </th>
                <th class="p-0 text-center" colspan="6">
                    @if($conta_saldo->count() < $pessoinha->opmnhtrvansmesd->count())
                        <a style="pointer-events: auto;" wire:click="load">Mostrar mais . . .</a>
                    @endif
                </th>
            </tr>
        </tfoot>
    </table>
</div>

