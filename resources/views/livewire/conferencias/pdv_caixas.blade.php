<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_banco</th>
            <th>id_usuario_abertura</th>
            <th>vlr_abertura</th>
            <th>vlr_fechamento</th>
            <th>status</th>
            <th>dt_abertura</th>
            <th>dt_fechamento</th>
            <th>dt_validacao</th>
            <th>id_usuario_validacao</th>
            <th>nota200</th>
            <th>nota100</th>
            <th>nota50</th>
            <th>nota20</th>
            <th>nota10</th>
            <th>nota5</th>
            <th>nota2</th>
            <th>moeda100</th>
            <th>moeda50</th>
            <th>moeda25</th>
            <th>moeda10</th>
            <th>moeda5</th>
            <th>moeda1</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>

            <th>rybeyykhpcgwkgr (Banco)</th>
            <th>kpakdkhqowIqzik (Pessoa)</th>
            <th>leichtmaeskrpdf (Pessoa)</th>
            <th>rtafathibgwfust (Venda)</th>
            <th>ssqlnxsbyywplan (VendaPagamento::class,Venda)</th>
            <th>oiefhueyedosaia (VendaDetalhe::class,Venda)</th>
            <th>wskcngeadbjhpdu (Lancamento)</th>
            <th>fjjeiofuwerwqou (RecebimentoCartao)</th>
            <th>druxvxuskbnfggv (AReceber)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_banco }}</td>
            <td>{{ $cada->id_usuario_abertura }}</td>
            <td>{{ $cada->vlr_abertura }}</td>
            <td>{{ $cada->vlr_fechamento }}</td>
            <td>{{ $cada->status }}</td>
            <td>{{ $cada->dt_abertura }}</td>
            <td>{{ $cada->dt_fechamento }}</td>
            <td>{{ $cada->dt_validacao }}</td>
            <td>{{ $cada->id_usuario_validacao }}</td>
            <td>{{ $cada->nota200 }}</td>
            <td>{{ $cada->nota100 }}</td>
            <td>{{ $cada->nota50 }}</td>
            <td>{{ $cada->nota20 }}</td>
            <td>{{ $cada->nota10 }}</td>
            <td>{{ $cada->nota5 }}</td>
            <td>{{ $cada->nota2 }}</td>
            <td>{{ $cada->moeda100 }}</td>
            <td>{{ $cada->moeda50 }}</td>
            <td>{{ $cada->moeda25 }}</td>
            <td>{{ $cada->moeda10 }}</td>
            <td>{{ $cada->moeda5 }}</td>
            <td>{{ $cada->moeda1 }}</td>
            <td>{{ $cada->created_at }}</td>
            <td>{{ $cada->updated_at }}</td>
            <td>{{ $cada->deleted_at }}</td>
            
            <td>{{ optional($cada->rybeyykhpcgwkgr)->nome }}</td>
            <td>{{ optional($cada->kpakdkhqowIqzik)->apelido }}</td>
            <td>{{ optional($cada->leichtmaeskrpdf)->apelido }}</td>
            <td>
                @if( isset($cada->rtafathibgwfust) && $cada->rtafathibgwfust->count() != 0)
                {!! implode('<br>', array_column($cada->rtafathibgwfust->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->ssqlnxsbyywplan) && $cada->ssqlnxsbyywplan->count() != 0)
                {!! implode('<br>', array_column($cada->ssqlnxsbyywplan->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->oiefhueyedosaia) && $cada->oiefhueyedosaia->count() != 0)
                {!! implode('<br>', array_column($cada->oiefhueyedosaia->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->wskcngeadbjhpdu) && $cada->wskcngeadbjhpdu->count() != 0)
                {!! implode('<br>', array_column($cada->wskcngeadbjhpdu->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->fjjeiofuwerwqou) && $cada->fjjeiofuwerwqou->count() != 0)
                {!! implode('<br>', array_column($cada->fjjeiofuwerwqou->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->druxvxuskbnfggv) && $cada->druxvxuskbnfggv->count() != 0)
                {!! implode('<br>', array_column($cada->druxvxuskbnfggv->toArray(), 'id')) !!}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
