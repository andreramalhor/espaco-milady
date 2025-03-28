<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>id_agendamento</th>
            <th>prc_comissao</th>
            <th>vlr_comissao</th>
            <th>status</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            <th>kwdlsdnasdmlwhd (Agendamento->id)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tabela_analisada as $cada)
        <tr>
            <td>{{ $cada->id }}
            <td>{{ $cada->id_agendamento }}
            <td>{{ $cada->prc_comissao }}
            <td>{{ $cada->vlr_comissao }}
            <td>{{ $cada->status }}
            <td>{{ $cada->created_at }}
            <td>{{ $cada->updated_at }}
            <td>{{ $cada->deleted_at }}
            <td>{{ optional($cada->kwdlsdnasdmlwhd)->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
