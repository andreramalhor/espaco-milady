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
                            @forelse($comandas as $comanda)
                            <tr class="{{ $comanda->deleted_at != null ? 'bg-danger' : '' }}">
                                <!-- // <td width="5%" style="padding: 0px 1px" class="text-center"><a href="" data-bs-toggle="modal" onclick="comandas_mostrar_modal(comanda.id)"><span class="badge bg-primary">comanda.id</span></a></td> -->
                                <td class="text-left" width="">{{ $comanda->id }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($comanda->start)->format('d/m/Y') }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($comanda->start)->format('H:i') }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($comanda->end)->format('H:i') }}</td>
                                <td class="text-left" width="">{{ optional($comanda->hhmaqpijffgfhmj)->apelido }}</td>
                                <td class="text-left" width="">{{ optional($comanda->zlpekczgsltqgwg)->nome }}</td>
                                <td class="text-center" width="">
                                    <a href="" data-bs-toggle="modal" onclick="comandas_mostrar_modal(comanda.id_comanda == null ?  : comanda.id_comanda)"><span class="badge bg-primary">{{ $comanda->id_comanda == null ? '' : $comanda->id_comanda }}</span></a>
                                </td>
                                <td class="text-center" width=""><span class="badge" style="background-color: {{ $comanda->color }}">{{ $comanda->status }}</span></td>
                                <td class="text-rigth" width="">{{ number_format($comanda->valor, 2, ',', '.') }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($comanda->created_at)->format('d/m/Y H:i') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-left" colspan="10">Sem registro de comandas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $comandas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>