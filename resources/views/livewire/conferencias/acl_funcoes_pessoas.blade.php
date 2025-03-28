<table class="table table-bordered">
    <thead>
        <tr>
            <th>id_funcao</th>
            <th>id_pessoa</th>
            <th>woiejiowefdeijd (funcao)</th>
            <th>lkfjdslkfjeldmf (pessoa)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id_funcao }}</td>
            <td>{{ $cada->id_pessoa }}</td>
            <td>{{ optional($cada->woiejiowefdeijd)->nome }}</td>
            <td>{{ optional($cada->lkfjdslkfjeldmf)->apelido }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
