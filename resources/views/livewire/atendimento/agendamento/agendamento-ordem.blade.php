<div>
    <div class="row">
        <div class="col-md-3">
            <!-- <div class="sticky-top mb-3"> -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Perfils de agenda</h4>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav flex-column">
                            @if(!$criar_perfil)
                            <li class="nav-item bg-secondary">
                                <a href="#" class="nav-link" wire:click="abrir_nome_novo()">
                                    Criar Novo
                                </a>
                            </li>
                            @else
                            <div class="input-group p-1">
                                <input type="text" class="form-control form-control-sm" wire:model.live="nome_novo_perfil" placeholder="Nome do novo perfil">
                                <div class="input-group-append">
                                    <button  type="button" class="btn btn-primary btn-sm" wire:click="gravar_novo_perfil">+</button>
                                </div>
                            </div>
                            @endif
                            
                            @foreach($perfis->groupBy('nome_ordem') as $perfil_nome => $parceiro)
                            <li class="nav-item" wire:click="selecionar_perfil('{{$perfil_nome}}')">
                                <a class="nav-link">
                                    {{ $perfil_nome }} <small>({{ $parceiro->count() }})</small>
                                    @if($perfil_nome != "Todos")
                                        <span class="float-right badge bg-danger" wire:click="excluir_perfil('{{ $perfil_nome}}')">Excluir</span>
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            <!-- </div> -->
        </div>

        @if(isset($perfil_selecionado))
        <div class="col-md-9">
            <div class="card">
                <div class="card-body row">
                    <div class="col-6">
                        <div class="row text-left">
                            <h2>Parceiros</h2><br>
                        </div>    
                        <br>
                        <table class="table table-striped table-bordered projects">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>#</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parceiros as $ciclo)
                                    @if(!$parceiros_perfil_selecionado->contains('id_pessoa', $ciclo->id))
                                    <tr class="p-1">
                                        <td class="p-1">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar img-circle elevation-2 img-size-32" src="{{ $ciclo->src_foto }}">
                                            </li>
                                        </td>
                                        <td class="p-1">{{ $ciclo->apelido }}</td>
                                        <td class="p-1">{{ $ciclo->id }}</td>
                                        <td class="project-actions text-right p-1">
                                            <a class="btn btn-primary btn-sm" href="#" wire:click="adicionar_usuario_ao_perfil({{$ciclo->id }})">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach                                                    
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <div class="text-left"><br>
                            <h2>Perfil<small>:</small> <strong>{{ $perfil_selecionado }}</strong></h2>
                            <div 
                                id="sortable" 
                                x-data 
                                x-init="$('#sortable').sortable({
                                    axis: 'y',
                                    update: function (event, ui)
                                    {
                                        var data = $(this).sortable('serialize')
                                        @this.atualizar_ordem(data)
                                    }
                                })">
                                @if(empty($parceiros_perfil_selecionado) || $parceiros_perfil_selecionado->count() == 1 && $parceiros_perfil_selecionado->first()->id_pessoa == null)
                                Clique no parceiro á esquerda
                                @else
                                    @foreach($parceiros_perfil_selecionado as $parceiro)
                                    <div class="external-event bg-default ui-draggable ui-draggable-handle" id="usuario_perfil_{{ $parceiro->id_pessoa }}">
                                        <img src="{{ optional($parceiro->oewoekdwjzsdlkd)->src_foto }}" class="img-circle elevation-2 img-size-32" alt="User Image">
                                        {{ optional($parceiro->oewoekdwjzsdlkd)->apelido }}
                                        |
                                        {{ optional($parceiro->oewoekdwjzsdlkd)->id }}
                                        
                                        <span class="float-right badge bg-danger" wire:click="remover_usuario_ao_perfil({{ $parceiro->id }})">Excluir</span>

                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

                            
    {{--
    <div class="card fade show" id="card-default" style="display: block !important;" aria-card="true" role="dialog">
        <div class="card-dialog" style="overflow-y: initial !important;">
            <div class="card-content">
                <div class="overlay d-none" wire:loading.class.remove="d-none">
                    <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Ordem</h3>
                    <button type="button" class="close" wire:click="toggle_card(false)">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body" style="height: 70vh; overflow-y: auto;">
                    @foreach($agendamento_ordem as $ciclo)
                    <div class="row">
                        <div class="p-1" style="width: 15%;">
                            <input type="number" class="form-control form-control-sm text-center" min="1" value="{{ $ciclo->ordem }}" wire:change="atualiza_ordem('{{ $ciclo->id }}', event.target.value)" 
                            @if(!$ciclo->ordem)
                            disabled=""
                            @endif
                            >
                        </div>
                        <div class="p-1 text-center" style="width: 10%;">
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" id="id_{{ $ciclo->id }}" wire:click="cabecalhos({{ $ciclo->id }}, event.target.checked)"
                                @if($ciclo->ordem)
                                checked=""
                                @endif
                                >
                                <label for="id_{{ $ciclo->id }}"></label>
                            </div>
                        </div>
                        
                        <!-- 
                            <span class="handle ui-sortable-handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                        -->
                        <img src="{{ optional($ciclo->oewoekdwjzsdlkd)->src_foto }}" class="user-image img-circle" style="width: 60px;">
                        <!-- 
                            <div class="p-1" style="width: 10%;">
                                <span class="text">{{ $ciclo->id_pessoa }}</span>
                            </div>
                        -->
                        <div class="p-1" style="width: 55%;">
                            <span class="text">{{ optional($ciclo->oewoekdwjzsdlkd)->nome }}</span>
                            <!-- <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small> -->
                        </div>
                        <!--
                            <div class="p-1" style="width: 5%;">
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                            </div>
                        -->
                    </div>
                    @endforeach
                </div>
                <div class="card-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="toggle_card(false)">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    --}}
</div>
