<div>
    <div class="row">
        <div class="col-3">
            <button class="btn btn-primary btn-sm" type="button" aria-controls="painel_agendamentos" wire:click="trocar_tela">Consultar agendamentos</button>
        </div>
    </div>
    
    <div class="offcanvas offcanvas-end {{ $exibir_ocultar ? 'show' : '' }}" tabindex="-1" id="painel_agendamentos" aria-labelledby="painel_agendamentos_label" style="width:50%;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="painel_agendamentos_label">Painel de agendamentos</h5>
            <button type="button" class="btn-close" wire:click="trocar_tela" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body table-responsive p-0">
            <div class="row p-2">
                <div class="form-group">
                    <label>Telefone </label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" placeholder="(00) 90000-0000" wire:model="telefone">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="button" wire:click="consultar">Consultar</button>
                </div>
            </div>
            <br>
            @if(!is_null($telefone))
            <table class="table table-striped table-valign-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-left">Profissional</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Horário</th>
                        <th class="text-center">Serviço</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agendamentos as $agendamento)
                    <tr>
                        <td class="text-left text-nowrap">
                            <img class="img-circle img-fluid elevation-1" src="{{ \App\Models\Atendimento\Pessoa::find($agendamento['id_profexec'])->src_foto }}" alt="{{  \App\Models\Atendimento\Pessoa::find($agendamento['id_profexec'])->apelido }}" style="max-width: 10%;">
                            <small>
                                {{ \App\Models\Atendimento\Pessoa::find($agendamento['id_profexec'])->apelido ?? $agendamento['id_profexec'] }}
                            </small>
                        </td>
                        <td class="text-center text-nowrap">
                            <small>
                                {{ \Carbon\Carbon::parse($agendamento['start'])->format('d/m/Y') }}
                            </small>
                        </td>
                        <td class="text-center text-nowrap">
                            <small>
                                {{ \Carbon\Carbon::parse($agendamento['start'])->format('H:i') }} à {{ \Carbon\Carbon::parse($agendamento['start'])->format('H:i') }}
                            </small>
                        </td>
                        <td class="text-center text-nowrap">
                            <small>
                                {{ \App\Models\Catalogo\ServicoProduto::find($agendamento['id_servprod'])->nome ?? $agendamento['id_servprod'] }}
                            </small>
                        </td>
                        <td class="text-center text-nowrap">
                            <small>
                                {{ $agendamento['status'] }}
                            </small>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <small>
                                Ainda não há agendamentos marcados.
                            </small>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            <br>
            @endif
        </div>
    </div>
    @if($exibir_ocultar)
    <div class="offcanvas-backdrop fade show"></div>
    @endif
    {{--
        start - {{ \Carbon\Carbon::parse($agendamento['start'])->format('d/m H:i') }}
        <br>end - {{ \Carbon\Carbon::parse($agendamento['end'])->format('d/m H:i') }}
        <br>id_profexec - {{ \App\Models\Atendimento\Pessoa::find($agendamento['id_profexec'])->apelido ?? $agendamento['id_profexec'] }}
        <br>id_servprod - {{ \App\Models\Catalogo\ServicoProduto::find($agendamento['id_servprod'])->nome ?? $agendamento['id_servprod'] }}
        <br>valor - {{ $agendamento['valor'] }}
        <br>status - {{ $agendamento['status'] }}
        <br>obs - {{ $agendamento['obs'] }}
        <br>======================================================
    --}}
</div>