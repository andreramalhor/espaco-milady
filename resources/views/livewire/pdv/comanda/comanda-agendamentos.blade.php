<div>
    @if($modal_agendamentos)
    <div class="modal fade show" style="display: block !important;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl" style="overflow-y: initial !important;">
            <div class="modal-content">
                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="modal-header">
                    <h3 class="card-title">Agendamentos</h3>
                    <button type="button" class="close" wire:click="toggle_modal(false)">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-2">
                    <div class="row">
                        <table class="table table-sm table-striped">
                            <thead class="table-dark">
                                <tr style="border-left: 7px solid #212529;">
                                    <th class="text-center"></th>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Horário</th>
                                    <th class="text-left">Profissional</th>
                                    <th class="text-left">Serviço</th>
                                    <th class="text-right">Valor</th>
                                    <th class="text-center">Prc.</th>
                                    <th class="text-right">Comissão</th>
                                    <th class="text-left">Obs</th>
                                </tr>
                            </thead>
                            <tbody style="cursor: pointer;">
                                @forelse($agendamentos as $agendamento)
                                <tr style="border-left: 7px solid {{ $agendamento->color }};" wire:click="toogle_agendamento({{ $agendamento->id }})">
                                    <td class="text-center">
                                        <input type="checkbox" {{ $adicionando->contains($agendamento->id) ? 'checked' : '' }}>
                                    </td>
                                    <td class="text-center">{{ $agendamento->id }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($agendamento->start)->format('d/m/Y') }}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($agendamento->start)->format('h:i') }} às {{ \Carbon\Carbon::parse($agendamento->end)->format('h:i') }}</td>
                                    <td class="text-left">{{ $agendamento->hhmaqpijffgfhmj->apelido ?? $agendamento->id_profexec }}</td>
                                    <td class="text-left">{{ $agendamento->zlpekczgsltqgwg->nome ?? $agendamento->id_servprod }}</td>
                                    <td class="text-right">R$ {{ number_format($agendamento->valor, 2, ',', '.') }}</td>
                                    <td class="text-center">{{ number_format($agendamento->prc_comissao, 2, ',', '.') }}%</td>
                                    <td class="text-right">R$ {{ number_format($agendamento->vlr_comissao, 2, ',', '.') }}</td>
                                    <td class="text-left">{{ $agendamento->obs }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">Não há agendamentos na data de hoje.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="toggle_modal(false)">Fechar</button>
                    <button type="button" class="btn btn-success" wire:click="adicionar_agendados()">Adicionar selecionados</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>