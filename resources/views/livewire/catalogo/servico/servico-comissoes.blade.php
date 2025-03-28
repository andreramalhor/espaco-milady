<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Serviços</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Catálogo</a></li>
                        <li class="breadcrumb-item">Serviço</li>
                        <li class="breadcrumb-item active">Comissões</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="edit">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Comissões do serviço: {{ $nome }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="65%">Apelido</th>
                                            <th width="10%"></th>
                                            <th width="20%">Prc Comissão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(\App\Models\Atendimento\Pessoa::parceiros()->orderBy('apelido', 'asc')->get() as $pessoa)
                                        <tr>
                                            <td>{{ $pessoa->id }}</td>
                                            <td>{{ $pessoa->apelido }}</td>
                                            
                                            @if($pessoa->aeahvtsijjoprlc->contains('id_servprod', $id))
                                            <td><a class="btn btn-sm btn-danger" wire:click="comissao_excluir( '{{ $pessoa->id }}', '{{ $id }}' )"><i class="fas fa-times"></i></a></td>
                                            @else
                                            <td><a class="btn btn-sm btn-success" wire:click="comissao_ativar( '{{ $pessoa->id }}', '{{ $id }}' )"><i class="fas fa-plus"></i></a></td>
                                            @endif
                                            
                                            @if($pessoa->aeahvtsijjoprlc->contains('id_servprod', $id))
                                            <td><input class="form-control form-control-sm text-right" type="number" step="0.01" value="{{ $pessoa->aeahvtsijjoprlc->where('id_servprod', '=', $id)->first()->prc_comissao * 100 }}.00" wire:change="definir_comissao( '{{ $pessoa->id }}', '{{ $id }}', event.target.value )"></td>
                                            @else
                                            <td><input class="form-control form-control-sm text-right" type="number" step="0.01" value=0.00 wire:change="definir_comissao( '{{ $pessoa->id }}', '{{ $id }}', event.target.value )" disabled></td>
                                            @endif    
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form wire:submit.prevent="edit">
                                <a href="{{  route('cat.servicos.index') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
                                <button type="submit" class="btn btn-sm btn-primary float-right">Editar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="edit">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Comissões do serviço: {{ $nome }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="65%">Apelido</th>
                                            <th width="10%"></th>
                                            <th width="20%">Prc Comissão</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($servprod->smenhgskqwmdjwe as $pessoa)
                                        <tr>
                                            <td>{{ optional($pessoa->fwpokkeoewfeojd)->id }}</td>
                                            <td>{{ optional($pessoa->fwpokkeoewfeojd)->apelido }}</td>
                                            <td><a class="btn btn-sm btn-danger" wire:click="comissao_excluir( '{{ optional($pessoa->fwpokkeoewfeojd)->id }}', '{{ $id }}' )"><i class="fas fa-times"></i></a></td>
                                            <td><input class="form-control form-control-sm text-right" type="number" step="0.01" value="{{ $pessoa->prc_comissao * 100 }}.00" disabled></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>