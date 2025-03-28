<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive rounded p-0">
                    <table class="table table-sm table-striped no-padding table-valign-middle projects">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-left">Data</th>
                                <th class="text-left">Cliente</th>
                                <th class="text-left"># Comanda</th>
                                
                                <th class="text-right">Valor</th>
                                <th class="text-left">Profissional</th>
                                <th class="text-left">Obs</th>
                                <th class="text-left"># Agendamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($saidas as $saida)
                            <tr class="{{ $saida->deleted_at != null ? bg-danger : '' }}">
                                <!-- // <td width="5%" style="padding: 0px 1px" class="text-center"><a href="" data-bs-toggle="modal" onclick="saidas_mostrar_modal(saida.id)"><span class="badge bg-primary">saida.id</span></a></td> -->
                                <td class="text-left">{{ \Carbon\Carbon::parse($saida->created_at)->format('d/m/Y') }}</td>
                                <td class="text-left">{{ optional($saida->vekwjqowidskjsd)->apelido ?? '(cliente não cadastrado)' }}</td>
                                <td class="text-left">
                                    <a wire:click="$dispatch('pdv-comanda-comandamostrar', { id: {{ $saida->id_venda }} })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                                    {{ $saida->id_venda }}
                                </td>
                                
                                <td class="text-right">{{ number_format($saida->vlr_final, 2, ',', '.') }}</td>
                                <td class="text-left">{{ optional($saida->flielwjewjdasld)->apelido ?? '(sem profissional)' }}</td>
                                <td class="text-left">{{ $saida->obs }}</td>
                                <td class="text-left">{{ $saida->id_agendamento }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-left" colspan="10">Sem registro de saidas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $saidas->sum('qtd') }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $saidas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>