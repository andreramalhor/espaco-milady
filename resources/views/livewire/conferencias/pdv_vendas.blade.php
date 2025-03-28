<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_caixa</th>
            <th>id_usuario</th>
            <th>id_cliente</th>
            <th>qtd_produtos</th>
            <th>vlr_prod_serv</th>
            <th>vlr_negociado</th>
            <th>vlr_dsc_acr</th>
            <th>vlr_final</th>
            <th>status</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            
            <th>lufqzahwwexkxli (Pessoa)</th>
            <th>opadsiwmeqwiiwe (Caixa)</th>
            <th>dfyejmfcrkolqjh (VendaDetalhe)</th>
            <th>xzxfrjmgwpgsnta (VendaPagamento)</th>
            <th>kdebvgdwqkqnwqk (ContaInterna::class,VendaDetalhe)</th>
            <th>afewfefuwoenoei (FormaPagamento::class,VendaPagamento)</th>
            <th>snfbexhswnenrks (ContaInterna::class,VendaPagamento)</th>
            <th>skjasklruwrkwej (RecebimentoCartao::class,VendaPagamento)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_caixa }}</td>
            <td>{{ $cada->id_usuario }}</td>
            <td>{{ $cada->id_cliente }}</td>
            <td>{{ $cada->qtd_produtos }}</td>
            <td>{{ $cada->vlr_prod_serv }}</td>
            <td>{{ $cada->vlr_negociado }}</td>
            <td>{{ $cada->vlr_dsc_acr }}</td>
            <td>{{ $cada->vlr_final }}</td>
            <td>{{ $cada->status }}</td>
            <td>{{ $cada->created_at }}</td>
            <td>{{ $cada->updated_at }}</td>
            <td>{{ $cada->deleted_at }}</td>
            <td>{{ optional($cada->lufqzahwwexkxli)->apelido }}</td>
            <td>{{ optional($cada->opadsiwmeqwiiwe)->id }}</td>
            <td>
                @if( isset($cada->dfyejmfcrkolqjh) && $cada->dfyejmfcrkolqjh->count() != 0)
                {!! implode('<br>', array_column($cada->dfyejmfcrkolqjh->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->xzxfrjmgwpgsnta) && $cada->xzxfrjmgwpgsnta->count() != 0)
                {!! implode('<br>', array_column($cada->xzxfrjmgwpgsnta->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->kdebvgdwqkqnwqk) && $cada->kdebvgdwqkqnwqk->count() != 0)
                {!! implode('<br>', array_column($cada->kdebvgdwqkqnwqk->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->afewfefuwoenoei) && $cada->afewfefuwoenoei->count() != 0)
                {!! implode('<br>', array_column($cada->afewfefuwoenoei->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->snfbexhswnenrks) && $cada->snfbexhswnenrks->count() != 0)
                {!! implode('<br>', array_column($cada->snfbexhswnenrks->toArray(), 'id')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->skjasklruwrkwej) && $cada->skjasklruwrkwej->count() != 0)
                {!! implode('<br>', array_column($cada->skjasklruwrkwej->toArray(), 'id')) !!}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
