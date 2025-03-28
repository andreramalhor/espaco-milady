<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>profissional</th>
            <th>servico</th>
            <th>prc_conta_interna</th>
            <th>é parceiro</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contas_interna as $conta_interna)
        <tr>
            <td>{{ $conta_interna->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
