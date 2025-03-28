<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Editar permissão</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Financeiro</a></li>
                        <li class="breadcrumb-item">Sistema</li>
                        <li class="breadcrumb-item">Permissão</li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="edit">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Comanda</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="col-12 p-0">
                                <table class="table table-bordered table-condensed">
                                    <tr style="background-color: #222d32; color: white;">
                                        <th class="text-center">Comanda</th>
                                        <th class="text-center">Cliente</th>
                                        <th class="text-center">Data da Venda</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href=""><span class="badge bg-primary">{{ $comissao->skfmwuorwmlpdlm->id }}</span></a></td>
                                        <td class="text-center">{{ $comissao->skfmwuorwmlpdlm->lufqzahwwexkxli->apelido ?? '(Cliente sem cadastro)' }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($comissao->created_at ?? '')->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detalhes da Comanda</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="col-12 p-0">
                                <table class="table table-bordered table-condensed">
                                    <tr style="background-color: #222d32; color: white;">
                                        <th class="text-center"># Serviço</th>
                                        <th class="text-center">Serviços</th>
                                        <th class="text-center">Valor do Serviço</th>
                                        <th class="text-center">Profissional</th>
                                        <th class="text-center">% Comissão</th>
                                        <th class="text-center">Valor Comissão</th>
                                    </tr>
                                    @foreach($comissao->skfmwuorwmlpdlm->dfyejmfcrkolqjh->sortBy('id') as $venda_detalhe)
                                    @if($venda_detalhe->id == $comissao->id_origem)
                                    <tr class="bg-primary">
                                        <td class="text-center">{{ $venda_detalhe->id }}</td>
                                        <td class="text-center">{{ $venda_detalhe->kcvkongmlqeklsl->nome }}</td>
                                        <td class="text-center">{{ number_format($venda_detalhe->vlr_final, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $venda_detalhe->hgihnjekboyabez->xeypqgkmimzvknq->apelido }}</td>
                                        <td class="text-center">{{ optional($venda_detalhe->hgihnjekboyabez)->percentual * 100 }}%</td>
                                        <td class="text-center">{{ number_format(optional($venda_detalhe->hgihnjekboyabez)->valor, 2, ',', '.') }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="text-center">{{ $venda_detalhe->id }}</td>
                                        <td class="text-center">{{ $venda_detalhe->kcvkongmlqeklsl->nome }}</td>
                                        <td class="text-center">{{ number_format($venda_detalhe->vlr_final, 2, ',', '.') }}</td>
                                        <td class="text-center">{{ $venda_detalhe->hgihnjekboyabez->xeypqgkmimzvknq->apelido ?? '(sem profissional cadastrado)' }}</td>
                                        <td class="text-center">{{ optional($venda_detalhe->hgihnjekboyabez)->percentual * 100 }}%</td>
                                        <td class="text-center">{{ number_format(optional($venda_detalhe->hgihnjekboyabez)->valor, 2, ',', '.') }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Informação da Comissão</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <div class="form-group">
                                <label class="col-form-label">ID</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->id }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label class="col-form-label">ID Origem</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->id_origem }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">Fonte Origem</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->fonte_origem }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label class="col-form-label">ID Profissional</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->id_pessoa }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="col-form-label">Profissional</label>
                                <select class="form-control form-control-sm" wire:model.live="id_pessoa" wire:change="profissional_selecionar()">
                                    <option value="NULL">Nenhum profissional</option>
                                    @foreach ($profissionals as $ciclo)
                                    <option value="{{ $ciclo->id_profexec }}">{{ $ciclo->fwpokkeoewfeojd->apelido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">Tipo</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->tipo }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label class="col-form-label">Percentual</label>
                                <input type="text" class="form-control form-control-sm text-center" wire:model.live="percentual" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label class="col-form-label">Valor</label>
                                <input type="text" class="form-control form-control-sm text-right" wire:model.live="valor" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">Dt Prevista</label>
                                <input type="text" class="form-control form-control-sm text-center" value="{{ is_null($comissao->dt_prevista) ? '' : \Carbon\Carbon::parse($comissao->dt_prevista)->format('d/m/Y') }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">Dt Quitação</label>
                                <input type="text" class="form-control form-control-sm text-center" value="{{ is_null($comissao->dt_quitacao) ? '' : \Carbon\Carbon::parse($comissao->dt_quitacao)->format('d/m/Y H:i:s') }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">ID Destino</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->id_destino }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">Fonte Destino</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->fonte_destino }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <input type="text" class="form-control form-control-sm" value="{{ $comissao->status }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="col-form-label">Dt Lançamento</label>
                                <input type="text" class="form-control form-control-sm text-center" value="{{ is_null($comissao->created_at) ? '' : \Carbon\Carbon::parse($comissao->created_at)->format('d/m/Y H:i:s') }}" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-default">Cancelar</button>
                    <button class="btn btn-primary float-right {{ $pode_editar }}" wire:click="edit()">Editar</button>
                </div>
            </div>
        </div>
    </div>
</div>
