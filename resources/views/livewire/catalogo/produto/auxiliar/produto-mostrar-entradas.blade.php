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
                            @forelse($entradas as $entrada)
                            <tr class="{{ $entrada->deleted_at != null ? bg-danger : '' }}">
                                <!-- // <td width="5%" style="padding: 0px 1px" class="text-center"><a href="" data-bs-toggle="modal" onclick="entradas_mostrar_modal(entrada.id)"><span class="badge bg-primary">entrada.id</span></a></td> -->
                                <td class="text-left" width="">{{ $entrada->id }}</td>
                                <td class="text-left" width="">{{ \Carbon\Carbon::parse($entrada->aldkekciajsgqwp->dt_compra)->format('d/m/Y') }}</td>
                                <td class="text-left" width="">{{ $entrada->qtd }}</td>
                                <td class="text-left" width="">{{ $entrada->status }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-left" colspan="10">Sem registro de entradas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $entradas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>