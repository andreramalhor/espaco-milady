<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Profissionais</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Configuração</a></li>
                        <li class="breadcrumb-item active">Profissionais</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach(\App\Models\ACL\Funcao::orderBy('nome', 'asc')->get() as $funcao)
                    @if( $funcao->nome != 'Administrador do Sistema' || $funcao->nome != 'Clientes' )
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $funcao->nome }}</h3>
                                <div class="card-tools">
                                    <span class="btn btn-tool" title="Permissões">
                                        <a href="{{ route('cfg.permissoes.funcao', $funcao->id) }}">
                                            <i class="fas fa-lock"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table projects">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-center"></th>
                                            <th class="text-left">Nome<br>Apelido</th>
                                            @if($funcao->nome == 'Colaborador')
                                            <th class="text-left">Username</th>
                                            @endif
                                            <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $funcao->slug }}">Adicionar pessoa</button>
                                                <div class="modal fade" id="modal-{{ $funcao->slug }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Adicionar pessoa em: {{ $funcao->nome }}</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Pessoa</label>
                                                                        <select class="form-control form-control-sm" wire:model="id_pessoa">
                                                                        <!-- <select class="form-control form-control-sm select2" x-init="$($el).on('change', function () { $wire.set('id_pessoa', $el.value ); });" wire:model.live="id_pessoa"></select> -->
                                                                            <option value="">Selecione a pessoa</option>
                                                                            @foreach($pessoas as $pessoa)
                                                                            <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    @if($funcao->nome == 'Colaborador')
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input type="text" class="form-control form-control-sm" wire:model="username">
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary" wire:click="adicionar_pessoa('{{ $funcao->id }}')">Adicionar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @forelse($funcao->znufwevbqgruklz()->orderBy('apelido', 'asc')->get() as $pessoa)
                                        <tr>
                                            <td class="p-1 text-center">
                                                <img class="table-avatar" src="{{ $pessoa->src_foto  }}">
                                            </td>
                                            <td class="p-1 text-left">
                                                {{ $pessoa->apelido }}<br>
                                                <small>{{ $pessoa->nome }}</small>
                                            </td>
                                            @if($funcao->nome == 'Colaborador')
                                            <td class="p-1 text-left">
                                                <small>{{ $pessoa->username }}</small>
                                            </td>
                                            @endif
                                            <td class="p-1 pr-3 text-right">
                                                <a wire:click="remover_pessoa('{{ $pessoa->id }}', '{{ $funcao->id }}')" class="btn btn-xs btn-danger" data-bs-tooltip="tooltip" data-bs-title="remover" data-original-title="remover"><i class="fas fa-trash fa-fw"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><small>Função vazia</small></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>    
</div>
