<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Comissões</h3>
        </div>
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="offset-4 col-4">
                    <div class="form-group">
                        <label for="id_pessoa">Colaboradores</label>
                        <select class="form-control form-control-sm @error('id_pessoa') is-invalid @enderror" wire:model.live="id_pessoa">
                            <option value="">Selecione a pessoa</option>
                            @foreach(\App\Models\Atendimento\Pessoa::colaboradores()->orderBy('nome')->get() as $ciclo)
                            <option value="{{ $ciclo->id }}">{{ $ciclo->apelido }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        @foreach(\App\Models\Catalogo\ServicoProduto::orderBy('nome')->get()->groupBy('id_categoria') as $categoria => $servicos)
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ optional($servicos->first()->ecgklyqfdcoguyj)->nome ?? 'NULO' }}</h3>
                </div>
                <div class="card-body p-2 text-center">
                    <div class="row">
                        <div class="px-1 text-center" style="width: 10%;">
                            <label clas="mb-0">&nbsp;</label>
                        </div>
                        <div class="px-1 text-left" style="width: 70%;">
                            <label clas="mb-0">Serviço</label>
                        </div>
                        <div class="px-1" style="width: 20%;">
                            <label clas="mb-0">Comissão</label>
                        </div>
                    </div>
                    @foreach($servicos->sortBy('ordem') as $servprod)
                    <div class="row pb-1 text-center">
                        <div class="px-1 text-center" style="width: 10%;">
                            @if($id_pessoa == "")
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" disabled="">
                                <label class="custom-control-label"></label>
                            </div>
                            @else
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="servprod_{{ $servprod->nome }}" wire:click="update_servprod({{ $servprod->id }}, 0, $event.target.checked)"
                                @if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->count() > 0)
                                checked
                                @endif
                                >
                                <label class="custom-control-label" for="servprod_{{ $servprod->nome }}"></label>
                            </div>
                            @endif
                        </div>
						<div class="px-1" style="width: 70%;">
                            <input class="form-control form-control-sm form-block text-left" type="text" value="{{ $servprod->nome }}" readonly="readonly">
						</div>
						<div class="px-1" style="width: 20%;">
                            <input class="form-control form-control-sm form-block text-center
                            @if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->count() > 0)
                            bg-green
                            @else
                            bg-red
                            @endif
                            @if($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->count() > 0)
                            " type="number" value="{{ number_format($servprod->smenhgskqwmdjwe->where('id_servprod', '=', $servprod->id)->where('id_profexec', '=', $id_pessoa)->first()->prc_comissao * 100, 0, ',', '.') }}" wire:change="update_servprod({{ $servprod->id }}, $event.target.value, 'false')"
                            @else
                            " type="number" value="{{ number_format(0, 0, ',', '.') }}" wire:change="update_servprod({{ $servprod->id }}, $event.target.value, 'false')"
                            @endif
                            @if($id_pessoa == "")
                            readonly="readonly"
                            @endif
                            >
                        </div>
					</div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <!-- push('scripts') -->
        <script>
            window.addEventListener('pessoaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
