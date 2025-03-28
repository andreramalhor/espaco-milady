<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Envios</h5>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Envio: {{ \Carbon\Carbon::today()->format('d/m/Y') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row pb-0">
                                <div class="col-1 pb-0">
                                    <div class="form-group pb-0">
                                        <label>Status</label>
                                    </div>
                                </div>
                                <div class="col-3 pb-0">
                                    <div class="form-group pb-0">
                                        <label>Produto</label>
                                    </div>
                                </div>
                                <div class="col-1 pb-0">
                                    <div class="form-group pb-0">
                                        <label>Frascos</label>
                                    </div>
                                </div>
                                <div class="col-1 pb-0">
                                    <div class="form-group pb-0">
                                        <label>Qtd</label>
                                    </div>
                                </div>
                                <div class="col-2 pb-0">
                                    <div class="form-group pb-0">
                                    </div>
                                </div>
                            </div>
                            @foreach($envios as $envio)
                            
                            <div class="row">
                                <div class="col-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm text-center" value="{{ $envio->status ?? 'ERRO' }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" value="{{ $envio->produto ?? 'ERRO' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm text-center" value="{{ $envio->kit_desc ?? 'ERRO' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm text-center" value="{{ $envio->qtd_kit ?? 'ERRO' }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        @if( auth()->user()->id == 64 && $envio->status == 'Aguardando' )
                                        <button type="submit" class="form-control form-control-sm btn btn-sm btn-success" wire:click="status({{ $envio->id }}, 'Pronto')"><i class="fa-solid fa-boxes-packing"></i></button>
                                        @elseif( auth()->user()->id == 2 || auth()->user()->id == 35 )
                                        <button type="submit" class="form-control form-control-sm btn btn-sm btn-danger" wire:click="excluir({{ $envio->id }})"><i class="fa-solid fa-trash-can"></i></button>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
                            
                            @if(auth()->user()->id == 2 || auth()->user()->id == 35)
                            <div class="row">
                                
                                <div class="col-1">
                                    <div class="form-group">
                                    </div>
                                </div>
                                
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" wire:model.live="temp_produto">
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm text-center" wire:model.live="temp_kit">
                                    </div>
                                </div>

                                <div class="col-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm text-center" wire:model.live="temp_quantidade" wire:change="atualizarQtd(, 'total', $event.target.value)">
                                    </div>
                                </div>
                                
                                <div class="col-1">
                                    <div class="form-group">
                                        <button type="submit" class="form-control form-control-sm btn btn-sm btn-info" wire:click="gravar"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="card-footer">
                            <form wire:submit.prevent="gravarTudo">
                                <a href="{{  route('cat.saidas') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-info float-right">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>