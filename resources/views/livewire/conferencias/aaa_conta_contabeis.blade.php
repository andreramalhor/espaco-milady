<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>dre_superior</th>
            <th>categoria_dre</th>
            <th>categoria</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr >
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->dre_superior }}</td>
            <td>{{ $cada->categoria_dre }}</td>
            <td>{{ $cada->categoria }}</td>
            <td>{{ $cada->created_at }}</td>
            <td>{{ $cada->updated_at }}</td>
            <td>{{ $cada->deleted_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
