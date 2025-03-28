<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive rounded p-0">
                    <table class="table table-sm table-striped no-padding table-valign-middle projects">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-left" width="">#</th>
                                <th class="text-left" width="">Data</th>
                                <th class="text-left" width="">Início</th>
                                <th class="text-left" width="">Fim</th>
                                <th class="text-left" width="">Profissional</th>
                                <th class="text-left" width="">Serv. / Prod.</th>
                                <th class="text-left" width=""># Comanda</th>
                                <th class="text-left" width="">Status</th>
                                <th class="text-rigth" width="">Valor</th>
                                <th class="text-left" width="">Agendado em:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($agendamentos as $agendamento)
                            <tr class="{{ $agendamento->deleted_at != null ? bg-danger : '' }}">
                                <!-- // <td width="5%" style="padding: 0px 1px" class="text-center"><a href="" data-bs-toggle="modal" onclick="agendamentos_mostrar_modal(agendamento.id)"><span class="badge bg-primary">agendamento.id</span></a></td> -->
                                <td class="text-left" width="">{{ $agendamento->id }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($agendamento->start)->format('d/m/Y') }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($agendamento->start)->format('H:i') }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($agendamento->end)->format('H:i') }}</td>
                                <td class="text-left" width="">{{ optional($agendamento->hhmaqpijffgfhmj)->apelido }}</td>
                                <td class="text-left" width="">{{ optional($agendamento->zlpekczgsltqgwg)->nome }}</td>
                                <td class="text-center" width="">
                                    <a href="" data-bs-toggle="modal" onclick="agendamentos_mostrar_modal(agendamento.id_comanda == null ?  : agendamento.id_comanda)"><span class="badge bg-primary">{{ $agendamento->id_comanda == null ? '' : $agendamento->id_comanda }}</span></a>
                                </td>
                                <td class="text-center" width=""><span class="badge" style="background-color: {{ $agendamento->color }}">{{ $agendamento->status }}</span></td>
                                <td class="text-rigth" width="">{{ number_format($agendamento->valor, 2, ',', '.') }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($agendamento->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-left" colspan="10">Sem registro de agendamentos.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $agendamentos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>