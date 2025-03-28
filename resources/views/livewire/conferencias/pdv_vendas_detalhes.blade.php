<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>id_venda</th>
            <th>id_servprod</th>
            <th>quantidade</th>
            <th>vlr_venda</th>
            <th>vlr_negociado</th>
            <th>vlr_dsc_acr</th>
            <th>vlr_final</th>
            <th>obs</th>
            <th>status</th>
            <th>id_agendamento</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            
            <th>sbbgaqleesuzlus (Venda)</th>
            <th>kcvkongmlqeklsl (ServicoProduto)</th>
            <th>vekwjqowidskjsd (Pessoa::class,Venda)</th>
            <th>csoiwjeirwifjed (Caixa::class,Venda)</th>
            <th>flielwjewjdasld (Pessoa::class,ContaInterna)</th>
            <th>aklfgdfkofedsad (Agendamento)</th>
            <th>hgihnjekboyabez (ContaInterna)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->id_venda }}</td>
            <td>{{ $cada->id_servprod }}</td>
            <td>{{ $cada->quantidade }}</td>
            <td>{{ $cada->vlr_venda }}</td>
            <td>{{ $cada->vlr_negociado }}</td>
            <td>{{ $cada->vlr_dsc_acr }}</td>
            <td>{{ $cada->vlr_final }}</td>
            <td>{{ $cada->obs }}</td>
            <td>{{ $cada->status }}</td>
            <td>{{ $cada->id_agendamento }}</td>
            <td>{{ $cada->created_at }}</td>
            <td>{{ $cada->updated_at }}</td>
            <td>{{ $cada->deleted_at }}</td>
 
            <td>{{ optional($cada->sbbgaqleesuzlus)->id }}</td>
            <td>{{ optional($cada->kcvkongmlqeklsl)->nome }}</td>
            <td>{{ optional($cada->vekwjqowidskjsd)->apelido }}</td>
            <td>{{ optional($cada->csoiwjeirwifjed)->id }}</td>
            <td>{{ optional($cada->flielwjewjdasld)->apelido }}</td>
            <td>{{ optional($cada->aklfgdfkofedsad)->id }}</td>
            <td>{{ optional($cada->hgihnjekboyabez)->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
