<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Funções</h3>
        </div>
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="col-md-2">
                    <!-- <a class="btn btn-secondary btn-block btn-sm float-right" href="'cfg.funcoes.criar') }}"><i class="fa fa-plus"></i> Cadastrar nova pessoa</a> -->
                </div>
                <div class="offset-md-8 col-md-2">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control float-right"  placeholder="Pesquisar" wire:model.live.debounce.200ms="p_pesquisar" >
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="text-left">Nome</th>
                        <th class="text-left">Descricao</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_nome" placeholder="Nome"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_descricao" placeholder="Descrição"></td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse ($funcoes as $ciclo)
                        <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                            <td class="px-2 text-left">{{ $ciclo->nome }}</td>
                            <td class="px-2 text-left">{{ $ciclo->descricao }}</td>
                            <td class="px-2 text-right">
                                <div class="btn-group">
                                    <a href="#" data-bs-toggle="dropdown"><span class="badge bg-info dropdown-toggle dropdown-icon">Ações  </span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('cfg.acessos.mostrar', $ciclo->slug) }}">Mostrar permissões</a>
                                        <a class="dropdown-item" href="{{ route('cfg.acessos.pessoas', $ciclo->slug) }}">Mostrar pessoas</a>
                                        <!-- <a class="dropdown-item" href="'cfg.funcoes.editar', $ciclo->id) }}">Editar</a> -->
                                        {{-- 
                                            <livewire:Atendimento.Pessoa.AAAADeletar :pessoa="$ciclo" :wire:key="'delete-pessoa-'. $ciclo->id" class="dropdown-item" />
                                            --}}
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"><small>Não há funções cadastradas</small></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{-- $funcoes->links() --}}
            </div>
        </div>
    </div>
</div>
