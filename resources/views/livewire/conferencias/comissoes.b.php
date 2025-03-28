<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>profissional</th>
            <th>servico</th>
            <th>prc_comissao</th>
            <th>é parceiro</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comissoes as $comissao)
        <tr>
            <td>{{ $comissao->id }}</td>
            <td class="{{ !is_null($comissao->fwpokkeoewfeojd->deleted_at) ? 'bg-red' : 'bg-green' }}">{{ $comissao->fwpokkeoewfeojd->apelido }} ( {{ $comissao->id_profexec }} )</td>
            <td class="{{ !is_null($comissao->eirtuqweendaksa->deleted_at) ? 'bg-red' : 'bg-green' }}">{{ $comissao->eirtuqweendaksa->nome }} ( {{ $comissao->id_servprod }} )</td>
            <td>{{ $comissao->prc_comissao }}</td>
            <td>{{ $comissao->fwpokkeoewfeojd->wuclsoqsdppaxmf->contains('nome', 'Parceiro') ? 'sim' : 'não' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
