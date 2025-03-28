<table class="table table-bordered">
    <thead>
        <tr>
            <th>id_profexec</th>
            <th>id_servprod</th>
            <th>fwpokkeoewfeojd (profissional)</th>
            <th>eirtuqweendaksa (servico)</th>
            <th>prc_comissao</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr 
        @if(!$cada->fwpokkeoewfeojd->kjahdkwkbewtoip->contains('nome', 'Parceiro'))
        class="bg-red"
        @endif
        >
            <td>{{ $cada->id_profexec }}</td>
            <td>{{ $cada->id_servprod }}</td>
            <td>{{ optional($cada->fwpokkeoewfeojd)->apelido }}</td>
            <td>{{ optional($cada->eirtuqweendaksa)->nome }}</td>
            <td>{{ $cada->prc_comissao }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
