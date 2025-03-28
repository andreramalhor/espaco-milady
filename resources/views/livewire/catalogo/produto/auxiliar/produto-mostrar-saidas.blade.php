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
                                <th class="text-left" width="">Qtd</th>
                                <th class="text-left" width="">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($saidas as $saida)
                            <tr class="{{ $saida->deleted_at != null ? bg-danger : '' }}">
                                <!-- // <td width="5%" style="padding: 0px 1px" class="text-center"><a href="" data-bs-toggle="modal" onclick="saidas_mostrar_modal(saida.id)"><span class="badge bg-primary">saida.id</span></a></td> -->
                                <td class="text-left" width="">{{ $saida->id }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($saida->aldkekciajsgqwp->dt_saida)->format('d/m/Y') }}</td>
                                <td class="text-left" width="">{{ $saida->qtd }}</td>
                                <td class="text-left" width="">{{ $saida->status }}</td>
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