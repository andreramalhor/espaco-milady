<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Comissões: {{ $pessoa->apelido }}</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table projects table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-left">Serviço</th>
                        <th class="text-center">Comissão</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servicos->groupBy('id_categoria') as $categoria => $servicos)
                    <tr class="bg-dark">
                        <td colspan="5">{{ optional($servicos->first()->ecgklyqfdcoguyj)->nome ?? 'NULO' }}</td>
                    </tr>
                        @foreach($servicos->sortBy('ordem') as $servprod)
                        <tr>
                            <td class="text-center">{{ $servprod->id }}</td>
                            <td class="text-left">{{ $servprod->nome }}</td>
                            <td class="p-0 text-center">
                                <input 
                                type="number" 
                                class="text-center" 
                                style="width:90px;" 
                                value="@if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $pessoa->id)->count() > 0){{ $servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $pessoa->id)->first()->prc_comissao*100}}@else{{ '' }}@endif" 
                                step="0.01" 
                                wire:change="update_servprod( '{{ $servprod->id }}' , $event.target.value , true)"
                                min="0" 
                                @if($pessoa->id == "")
                                    disabled
                                @endif
                                />
                            </td>
                            <td class="text-left">
                                @if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $pessoa->id)->count() > 0)
                                <strong>{{number_format( $servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $pessoa->id)->first()->prc_comissao*100, 2, ',' ) }}</strong>
                                <small>%</small>
                                @else
                                <small class="text-disabled"></small>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
