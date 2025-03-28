<table class="table table-bordered">
    <thead>
        <tr>
            <th>id_permissao</th>
            <th>id_funcao</th>
            <th>poqwoiwoeieussq (permissao)</th>
            <th>wqoeifjqwisaudd (funcao)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id_permissao }}</td>
            <td>{{ $cada->id_funcao }}</td>
            <td>{{ optional($cada->poqwoiwoeieussq)->nome }}</td>
            <td>{{ optional($cada->wqoeifjqwisaudd)->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
