<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>auth_user</th>
            <th>nome_ordem</th>
            <th>ordem</th>
            <th>area</th>
            <th>id_pessoa</th>
            <th>asirmghaksasjsh (profissional)</th>
            <th>oewoekdwjzsdlkd (servico)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr 
        @if(!$cada->asirmghaksasjsh->kjahdkwkbewtoip->contains('nome', 'Parceiro'))
        class="bg-red"
        @endif
        >
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->auth_user }}</td>
            <td>{{ $cada->nome_ordem }}</td>
            <td>{{ $cada->ordem }}</td>
            <td>{{ $cada->area }}</td>
            <td>{{ $cada->id_pessoa }}</td>
            <td>{{ optional($cada->asirmghaksasjsh)->apelido }}</td>
            <td>{{ optional($cada->oewoekdwjzsdlkd)->apelido }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
