<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_venda</th>
            <th>id_forma_pagamento</th>
            <th>descricao</th>
            <th>parcela</th>
            <th>valor</th>
            <th>dt_prevista</th>
            <th>status</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>

            <th>yshghlsawerrgvd (Venda)</th>
            <th>qmbnkthuczqdsdn (FormaPagamento)</th>
            <th>pqwnldkwjfencsb (ContaInterna)</th>
            <th>fjwlfkjalpdwepf (RecebimentoCartao)</th>
            <th>kfwejkahdwqbsal (Caixa::class,Venda)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_venda }}</td>
            <td>{{ $cada->id_forma_pagamento }}</td>
            <td>{{ $cada->descricao }}</td>
            <td>{{ $cada->parcela }}</td>
            <td>{{ $cada->valor }}</td>
            <td>{{ $cada->dt_prevista }}</td>
            <td>{{ $cada->status }}</td>
            <td>{{ $cada->created_at }}</td>
            <td>{{ $cada->updated_at }}</td>
            <td>{{ $cada->deleted_at }}</td>

            <td>{{ optional($cada->yshghlsawerrgvd)->id }}</td>
            <td>{{ optional($cada->qmbnkthuczqdsdn)->id }}</td>
            <td>{{ optional($cada->pqwnldkwjfencsb)->id }}</td>
            <td>{{ optional($cada->fjwlfkjalpdwepf)->id }}</td>
            <td>
                @if( isset($cada->kfwejkahdwqbsal) && $cada->kfwejkahdwqbsal->count() != 0)
                {!! implode('<br>', array_column($cada->kfwejkahdwqbsal->toArray(), 'id')) !!}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
