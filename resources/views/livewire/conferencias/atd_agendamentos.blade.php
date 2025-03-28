<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_empresa</th>
            <th>start</th>
            <th>end</th>
            <th>id_cliente</th>
            <th>id_profexec</th>
            <th>id_servprod</th>
            <th>id_comanda</th>
            <th>valor</th>
            <th>id_criador</th>
            <th>obs</th>
            <th>status</th>
            <th>id_venda_detalhe</th>
            <th>prc_comissao</th>
            <th>vlr_comissao</th>
            <th>grupo</th>
            <th>telefone</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            
            <th>jkweviewflkjdas (Empresa->nome)</th>
            <th>xhooqvzhbgojbtg (Pessoa->apelido)</th>
            <th>hhmaqpijffgfhmj (Pessoa->apelido)</th>
            <th>zlpekczgsltqgwg (ServicoProduto->nome)</th>
            <th>eiuroereuwnofiw (Pessoa->apelido)</th>
            <th>sadlqwdnlaskdla (Comissao->id)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_empresa }}</td>
            <td>{{ $cada->start }}</td>
            <td>{{ $cada->end }}</td>
            <td>{{ $cada->id_cliente }}</td>
            <td>{{ $cada->id_profexec }}</td>
            <td>{{ $cada->id_servprod }}</td>
            <td>{{ $cada->id_comanda }}</td>
            <td>{{ $cada->valor }}</td>
            <td>{{ $cada->id_criador }}</td>
            <td>{{ $cada->obs }}</td>
            <td>{{ $cada->status }}</td>
            <td>{{ $cada->id_venda_detalhe }}</td>
            <td>{{ $cada->prc_comissao }}</td>
            <td>{{ $cada->vlr_comissao }}</td>
            <td>{{ $cada->grupo }}</td>
            <td>{{ $cada->telefone }}</td>
            <td>{{ $cada->created_at }}</td>
            <td>{{ $cada->updated_at }}</td>
            <td>{{ $cada->deleted_at }}</td>
            
            <td>{{ optional($cada->jkweviewflkjdas)->nome }}</td>
            <td>{{ optional($cada->xhooqvzhbgojbtg)->apelido }}</td>
            <td>{{ optional($cada->hhmaqpijffgfhmj)->apelido }}</td>
            <td>{{ optional($cada->zlpekczgsltqgwg)->nome }}</td>
            <td>{{ optional($cada->eiuroereuwnofiw)->apelido }}</td>
            <td>{{ optional($cada->sadlqwdnlaskdla)->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
