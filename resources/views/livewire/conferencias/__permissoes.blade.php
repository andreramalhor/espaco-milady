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
            <th>usuarios<br>linkados</th>
            <th>funcoes<br>linkadas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissoes as $permissao)
        <tr>
            <td>{{ $permissao->id }}</td>
            <td>{{ $permissao->nome }}</td>
            <td>{{ $permissao->grupo }}</td>
            <td>{{ $permissao->nivel }}</td>
            <td>{{ $permissao->ordem }}</td>
            <td>{{ $permissao->menu }}</td>
            <td>{{ $permissao->descricao }}</td>
            <td>{{ $permissao->deleted_at }}</td>
            <td>
                @if($permissao->aewluaerqwnisdq->count() != 0)
                {{ implode(', ', array_column($permissao->aewluaerqwnisdq->toArray(), 'apelido')) }}
                @endif
            </td>
            <td>
                @if($permissao->dzjvxinawjwtnfa->count() != 0)
                {{ implode(', ', array_column($permissao->dzjvxinawjwtnfa->toArray(), 'slug')) }}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
