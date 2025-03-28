<table class="table table-bordered">
    <thead>
        <tr>
            <th>coluna 1</th>
            <th>coluna 2</th>
            <th>coluna 3</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id_pessoa }}</td>
            <td>{{ $cada->id_funcao }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
