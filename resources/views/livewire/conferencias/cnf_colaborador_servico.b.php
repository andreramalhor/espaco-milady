<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_profexec</th>
            <th>id_servprod</th>
            <th>prc_comissao</th>

            <th>fwpokkeoewfeojd (Pessoa)</th>
            <th>eirtuqweendaksa (ServicoProduto)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        @dd($cada->fwpokkeoewfeojd, 22)
        <tr 
            @if(!$cada->fwpokkeoewfeojd->kjahdkwkbewtoip->contains('nome', 'Parceiro'))
            class="bg-red"
            @endif
        >
            <td>{{ $cada->id }}</th>
            <td>{{ $cada->id_profexec }}</th>
            <td>{{ $cada->id_servprod }}</th>
            <td>{{ $cada->prc_comissao }}</th>

            <td>{{ optional($cada->fwpokkeoewfeojd)->apelido }}</td>
            <td>{{ optional($cada->eirtuqweendaksa)->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
