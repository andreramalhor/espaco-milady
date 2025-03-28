<table class="table table-bordered">
    <thead>
        <tr>
            <th>id_permissao</th>
            <th>id_pessoa</th>
            <th>weoifjsaiydjksd (permissao)</th>
            <th>sqkdjwiqesaoudf (pessoa)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id_permissao }}</td>
            <td>{{ $cada->id_pessoa }}</td>
            <td>{{ optional($cada->weoifjsaiydjksd)->nome }}</td>
            <td>{{ optional($cada->sqkdjwiqesaoudf)->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
