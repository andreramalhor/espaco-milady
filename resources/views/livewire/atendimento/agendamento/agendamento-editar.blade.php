<div>
    @if($modal)
    <div class="modal fade show" id="modal-default" style="display: block !important;" aria-modal="true" role="dialog">
        <div class="modal-dialog" style="overflow-y: initial !important;">
            <div class="modal-content">
                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="modal-header">
                    <h3 class="card-title">Editar agendamento: {{ $agendamento->id }}</h3>
                    <button type="button" class="close" wire:click="toggle_modal(false)">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 70vh; overflow-y: auto;">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="col-form-label">Nome do Cliente</label>
                                <select class="form-control form-control-sm" wire:model.live="id_cliente">
                                <option>Selecione um cliente . . .</option>
                                    <option value="0">( Cliente sem cadastro )</option>
                                    <x-Atendimento.Pessoa.Clientes /> 
                                </select>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <label for="col-form-label">Serviço</label>
                                <select class="form-control form-control-sm" wire:model.live="id_servprod" wire:change="preencher_servicos_profissionais( 'id_servprod' )">
                                    <option>Selecione um serviço . . .</option>
                                    <x-Catalogo.ServicoProduto /> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label">Valor</label>
                                <input type="number" step="0.01" class="form-control form-control-sm text-center" wire:model="valor" wire:change="reajuste_valores( 'valor' )">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="col-form-label">Profissional</label>
                                <select class="form-control form-control-sm" wire:model.live="id_profexec" wire:change="preencher_servicos_profissionais( 'id_profexec' )">
                                    <option>Selecione um profissional . . .</option>
                                    <x-Atendimento.Pessoa.Parceiros /> 
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label">% Comissão</label>
                                <input type="number" step="0.01" class="form-control form-control-sm text-center" wire:model="prc_comissao" wire:change="reajuste_valores( 'prc_comissao' )">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label">R$ Comissão</label>
                                <input type="number" step="0.01" class="form-control form-control-sm text-center" wire:model="vlr_comissao" wire:change="reajuste_valores( 'vlr_comissao' )">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="col-form-label">Início</label>
                                <input type="hidden" wire:model="dia">
                                <input type="time" class="form-control form-control-sm text-center" wire:model.live="start" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="col-form-label">Duração<small>(h:m)</small></label>
                                <input type="time" class="form-control form-control-sm text-center" wire:model="duracao" wire:change="reajuste_tempo( 'duracao' )">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="col-form-label">Final</label>
                                <input type="time" class="form-control form-control-sm text-center" wire:model="end" wire:change="reajuste_tempo( 'end' )">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group">
                                <label for="col-form-label">Observação</label>
                                <input type="text" class="form-control form-control-sm" wire:model="obs">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label">dia</label>
                                <input type="date" class="form-control form-control-sm text-center" wire:model="dia" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="toggle_modal(false)">Fechar</button>
                    <button type="button" class="btn btn-success" wire:click="store">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>
