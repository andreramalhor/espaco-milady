<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-header">
                    <h3 class="card-title text-center">Comissões</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row p-2">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Editar comissões de:</label>
                                <select class="form-control form-control-sm @error('id_pessoa') is-invalid @enderror" wire:model.live="id_pessoa">
                                    <option value="">Selecione a pessoa</option>
                                    @foreach(\App\Models\Atendimento\Pessoa::colaboradores()->orderBy('nome')->get() as $ciclo)
                                    <option value="{{ $ciclo->id }}">{{ $ciclo->apelido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        @if($copiar)
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Copiar comissões de:</label>
                                <select class="form-control form-control-sm @error('id_doador') is-invalid @enderror" wire:model.live="id_doador">
                                    <option value="">Selecione a pessoa</option>
                                    @foreach(\App\Models\Atendimento\Pessoa::colaboradores()->orderBy('nome')->get() as $ciclo)
                                    <option value="{{ $ciclo->id }}">{{ $ciclo->apelido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer clearfix">
                    @if(!$copiar)
                        <button type="button" class="btn btn-primary @if($id_pessoa == "") disabled @endif" wire:click="copiar_de_outro">Copiar de alguém</button>
                    @else
                        <button type="button" class="btn btn-success float-right @if($id_doador == "") disabled @endif" wire:click="copiar_comissoes"><i class="fa-solid fa-clone"></i> Copiar</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-left" style="width:10px;">#<br>&nbsp;</th>
                                <th class="text-left">Serviço<br>&nbsp;</th>
                                @if($copiar)
                                <th class="text-center" style="width:90px;">Comissão<br>atual</th>
                                <th class="text-center">></th>
                                <th class="text-center" style="width:90px;">Comissão<br>será</th>
                                @else
                                <th class="text-center" style="width:90px;">Comissão<br>&nbsp;</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Catalogo\ServicoProduto::orderBy('nome')->get()->groupBy('id_categoria') as $categoria => $servicos)
                                <tr class="bg-dark">
                                    <td colspan="5">{{ optional($servicos->first()->ecgklyqfdcoguyj)->nome ?? 'NULO' }}</td>
                                </tr>
                                @foreach($servicos->sortBy('ordem') as $servprod)
                                    <tr>
                                        <td>{{ $servprod->id }}</td>
                                        <td>
                                            <small>{{ $servprod->nome }}</small>
                                        </td>
                                        @if($copiar)
                                            <td class="p-0 text-center">
                                                @if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->count() > 0)
                                                    <strong>{{number_format( $servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->first()->prc_comissao*100, 2, ',' ) }}</strong>
                                                    <small>%</small>
                                                @else
                                                    <small class="text-disabled"></small>
                                                @endif
                                            </td>
                                            <td class="p-0 text-center">></td>
                                            <td class="p-0 text-center">
                                                @if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_doador)->count() > 0)
                                                    <strong>{{number_format( $servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_doador)->first()->prc_comissao*100, 2, ',' ) }}</strong>
                                                    <small>%</small>
                                                @else
                                                    <small class="text-disabled"></small>
                                                @endif
                                            </td>
                                        @else
                                        <td class="p-0 text-center">
                                            <input 
                                                type="number" 
                                                class="text-center" 
                                                style="width:90px;" 
                                                value="@if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->count() > 0){{ $servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->first()->prc_comissao*100}}@else{{ '' }}@endif" 
                                                step="0.01" 
                                                wire:change="update_servprod( '{{ $servprod->id }}' , $event.target.value , true)"
                                                min="0" 
                                                @if($id_pessoa == "")
                                                    disabled
                                                @endif
                                                />
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>
