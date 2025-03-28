<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>grupo</th>
            <th>nivel</th>
            <th>ordem</th>
            <th>menu</th>
            <th>descricao</th>
            <th>deleted_at</th>
            <th>dzjvxinawjwtnfa (Funcao->nome)</th>
            <th>aewluaerqwnisdq (Pessoa->apelido)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->nome }}</td>
            <td>{{ $cada->grupo }}</td>
            <td>{{ $cada->nivel }}</td>
            <td>{{ $cada->ordem }}</td>
            <td>{{ $cada->menu }}</td>
            <td>{{ $cada->descricao }}</td>
            <td>{{ $cada->deleted_at }}</td>
            <td>
                @if( isset($cada->dzjvxinawjwtnfa) && $cada->dzjvxinawjwtnfa->count() != 0)
                    {!! implode('<br>', array_column($cada->dzjvxinawjwtnfa->toArray(), 'nome')) !!}
                @endif
            </td>
            <td>
                @if( isset($cada->aewluaerqwnisdq) && $cada->aewluaerqwnisdq->count() != 0)
                    {!! implode('<br>', array_column($cada->aewluaerqwnisdq->toArray(), 'apelido')) !!}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>