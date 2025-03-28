<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>agenda de</th>
            <th>nome agenda</th>
            <th>ordem</th>
            <th>pessoa</th>
            <th>.</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordem_agendas as $ordem_agenda)
        <tr>
            <td>{{ $ordem_agenda->id }}</td>
            <td>{{ isset($ordem_agenda->oewoekdwjzsdlkd) ? $ordem_agenda->asirmghaksasjsh->apelido : '' }}</td>
            <td>{{ $ordem_agenda->nome_ordem }}</td>
            <td>{{ $ordem_agenda->ordem }}</td>
            <td>{{ isset($ordem_agenda->oewoekdwjzsdlkd) ? $ordem_agenda->asirmghaksasjsh->apelido : '' }}</td>
            <td class="{{ !$ordem_agenda->oewoekdwjzsdlkd->temFuncao('Parceiro') ? 'bg-red' : 'bg-green' }}">{{ optional($ordem_agenda->oewoekdwjzsdlkd)->apelido }} ( {{ optional($ordem_agenda->oewoekdwjzsdlkd)->id }} )</td>
            <td>
                @if(!$ordem_agenda->oewoekdwjzsdlkd->temFuncao('Parceiro'))
                <button wire:click="excluir_ordemagenda({{ $ordem_agenda->id }})">{{ $ordem_agenda->id }}</button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
