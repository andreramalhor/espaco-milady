<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>nivel</th>
            <th>conta</th>
            <th>titulo</th>
            <th>conta_pai</th>
            <th>imprime</th>
            <th>soma</th>
            <th>tem_lancamento</th>
            <th>id_servprod</th>
            
            <th>nova_conta</th>
            <th>soma_filhos</th>

            <th>klajlksdjalkewq (Conta pai)</th>
            <th>sasjiqelrhwkejs (contar conta filha)</th>
            <th>jfsdlfeofwepokf (contar Lancamento)</th>
            <th>feoiuroqweiopwe (DRE)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}</td>
            <td>{{ $cada->nivel }}</td>
            <td>{{ $cada->conta }}</td>
            <td>{{ $cada->titulo }}</td>
            <td>{{ $cada->conta_pai }}</td>
            <td>{{ $cada->imprime }}</td>
            <td>{{ $cada->soma }}</td>
            <td>{{ $cada->tem_lancamento }}</td>
            <td>{{ $cada->id_servprod }}</td>
            
            <td>{{ $cada->nova_conta }}</td>
            <td>{{ $cada->soma_filhos }}</td>

            <td>{{ optional($cada->klajlksdjalkewq)->conta }}</td>
            <td>
                @if($cada->sasjiqelrhwkejs->count() != 0)
                    {!! implode('<br>', array_column($cada->sasjiqelrhwkejs->toArray(), 'titulo')) !!}
                @endif
            </td>
            <td>{{ optional($cada->jfsdlfeofwepokf)->count() }}</td>
            <td>{{ optional($cada->feoiuroqweiopwe)->titulo }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
