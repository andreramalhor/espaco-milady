<div>
    @if($mostrar_agendamentos_desse_cliente)
    <div class="modal fade show" id="modal-default" style="display: block !important;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" style="overflow-y: initial !important;">
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
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-sm table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center"></th>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Horário</th>
                                    <th>Profissional</th>
                                    <th>Serviço</th>
                                    <th>Obs</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="cursor: pointer;">
                                @forelse($agendamentos as $agendamento)
                                <tr wire:click="toogle_agendamento({{ $agendamento->id }})">
                                    <td class="text-center">
                                        <input type="checkbox" {{ $adicionando->contains($agendamento->id) ? 'checked' : '' }}>
                                    </td>
                                    <td>{{ $agendamento->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($agendamento->start)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($agendamento->start)->format('h:i') }} às {{ \Carbon\Carbon::parse($agendamento->end)->format('h:i') }}</td>
                                    <td>{{ $agendamento->hhmaqpijffgfhmj->apelido ?? $agendamento->id_profexec }}</td>
                                    <td>{{ $agendamento->zlpekczgsltqgwg->nome ?? $agendamento->id_servprod }}</td>
                                    <td>{{ $agendamento->obs }}</td>
                                    <td>
                                        {{--
                                        @if(!$adicionando[$agendamento->id])
                                        <span class="badge bg-{{ $agendamento->badge }}">{{ $agendamento->status }}</span>
                                        @else
                                        <span class="badge bg-primary">Adicionando</span>
                                        @endif
                                        --}}
                                    </td>
                                    <td>
                                        {{--
                                        @if(in_array(true, $this->adicionando) && $adicionando[$agendamento->id])
                                        <button type="button" class="btn btn-block btn-warning btn-sm" wire:click="cancelar_servprod({{ $agendamento->id }})"><i class="fa-solid fa-xmark"></i></button>
                                        @endif
                                        @if(!in_array(true, $this->adicionando) && !$adicionando[$agendamento->id])
                                        @if($agendamento->status == 'Agendado' || $agendamento->status == 'Confirmado')
                                        <button type="button" class="btn btn-block btn-primary btn-sm text-center" wire:click="adicionar_agendamento({{ $agendamento->id }})"><i class="fa-solid fa-circle-plus"></i></button></td>
                                        @endif
                                        @endif
                                        --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Não há agendamentos na data de hoje.</td>
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
    <div class="modal-backdrop fade show" wire:click="toggle_modal(false)"></div>
    @endif
</div>