<div class="row p-0">
    <table class="table table-bordered table-sm table-striped">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Data</th>
                <th class="text-center"># Comanda</th>
                <th class="text-left">Cliente</th>
                <th class="text-right">Valor</th>
                <th class="text-left">Obs</th>
                <th class="text-center">Status</th>
                <th class="text-center"># Agend.</th>
                <th class="text-center">Dif desde <br> último vez</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-left: 5px solid white;">
                <td class="p-0"></td>
                <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_comanda"  placeholder="# Comanda"></td>
                <td class="p-0 pl-1 py-1">
                    <select class="form-control form-control-sm form-block" wire:model.change="p_prd_srv">
                        <option value="{{null}}">Todos os produtos e serviços</option>
                        @foreach(\App\Models\Atendimento\Pessoa::orderBy('nome')->get() as $pessoa)
                        <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="p-0"></td>
                <td class="p-0"></td>
                <td class="p-0"></td>
                <td class="p-0"></td>
                <td class="p-0"></td>
                <td class="p-0"></td>
            </tr>
            @php($data_agora = \Carbon\Carbon::now())
            @php($previousCreatedAt = \Carbon\Carbon::now())
            @foreach($vendas as $detalhe)
            <tr>
                <td class="text-center">{{ \Carbon\Carbon::parse($detalhe->created_at)->format('d/m/Y H:i') }}</td>
                <td class="text-center">{{ $detalhe->id_venda }}</td>
                <td class="text-left">{{ $detalhe->vekwjqowidskjsd->apelido ?? "(Cliente sem cadastro)" }}</td>
                <td class="text-right">{{ number_format($detalhe->vlr_final, 2, ',', '.') }}</td>
                <td class="text-left">{{ $detalhe->obs }}</td>
                <td class="text-center">{{ $detalhe->status }}</td>
                <td class="text-center">{{ $detalhe->id_agendamento }}</td>
                <td class="text-center">
                    @if ($previousCreatedAt)
                        {{ \Carbon\Carbon::parse($detalhe->created_at)->diffInDays($data_agora) }} dia(s)
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            @php($previousCreatedAt = $detalhe->created_at)
            @endforeach
            <tr>
                <th class="p-0 text-center" colspan="8">
                    <a style="pointer-events: auto;" wire:click="load">Mostrar mais . . .</a>
                </th>
            </tr>
        </tbody>
    </table>
</div>

