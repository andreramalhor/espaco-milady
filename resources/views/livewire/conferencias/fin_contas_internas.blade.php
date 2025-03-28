<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_origem</th>
            <th>fonte_origem</th>
            <th>id_pessoa</th>
            <th>tipo</th>
            <th>percentual</th>
            <th>valor</th>
            <th>dt_prevista</th>
            <th>dt_quitacao</th>
            <th>id_destino</th>
            <th>fonte_destino</th>
            <th>status</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            
            <th>xeypqgkmimzvknq (Pessoa)</th>
            <th>lskjasdlkdflsdj (VendaDetalhe)</th>
            <th>sflfmensjwleneb (VendaPagamento)</th>
            <th>fsoljswufheuens (Lancamento)</th>
            <th>skfmwuorwmlpdlm (Venda::class,VendaDetalhe)</th>
            <th>aiuwlwqelejqone (Venda::class,VendaPagamento)</th>
            <th>ygferchrtuwewhq (ServicoProduto::class,VendaDetalhe)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_origem }}</td>
            <td>{{ $cada->fonte_origem }}</td>
            <td>{{ $cada->id_pessoa }}</td>
            <td>{{ $cada->tipo }}</td>
            <td>{{ $cada->percentual }}</td>
            <td>{{ $cada->valor }}</td>
            <td>{{ $cada->dt_prevista }}</td>
            <td>{{ $cada->dt_quitacao }}</td>
            <td>{{ $cada->id_destino }}</td>
            <td>{{ $cada->fonte_destino }}</td>
            <td>{{ $cada->status }}</td>
            <td>{{ $cada->created_at }}</td>
            <td>{{ $cada->updated_at }}</td>
            <td>{{ $cada->deleted_at }}</td>

            <td>{{ optional($cada->xeypqgkmimzvknq)->apelido }}</td>
            <td>{{ optional($cada->lskjasdlkdflsdj)->id }}</td>
            <td>{{ optional($cada->sflfmensjwleneb)->id }}</td>
            <td>{{ optional($cada->fsoljswufheuens)->id }}</td>
            <td>{{ optional($cada->skfmwuorwmlpdlm)->id }}</td>
            <td>{{ optional($cada->aiuwlwqelejqone)->id }}</td>
            <td>{{ optional($cada->ygferchrtuwewhq)->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
