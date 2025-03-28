<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>slug</th>
            <th>descricao</th>
            <th>categoria</th>
            <th>znufwevbqgruklz (Pessoa->apelido)</th>
            <th>yxwbgtooplyjjaz (Permissao->nome)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->nome }}</td>
            <td>{{ $cada->slug }}</td>
            <td>{{ $cada->descricao }}</td>
            <td>{{ $cada->categoria }}</td>
            <td>
                @if( isset($cada->znufwevbqgruklz) && $cada->znufwevbqgruklz->count() != 0)
                    {!! implode('<br>', array_column($cada->znufwevbqgruklz->toArray(), 'apelido')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->yxwbgtooplyjjaz) && $cada->yxwbgtooplyjjaz->count() != 0)
                    {!! implode('<br>', array_column($cada->yxwbgtooplyjjaz->toArray(), 'nome')) !!}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
