<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pessoas</h3>
        </div>
        <div class="card-body p-0">
            <div class="row p-2">
                <div class="col-md-2">
                    <a class="btn btn-secondary btn-block btn-sm float-right" href="{{ route('atd.pessoas.criar') }}"><i class="fa fa-plus"></i> Cadastrar nova pessoa</a>
                </div>
                <div class="offset-md-8 col-md-2">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control float-right"  placeholder="Pesquisar" wire:model.live.debounce.200ms="p_pesquisar">
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
                        <th class="text-center"></th>
                        <th class="text-left">Nome</th>
                        <th class="text-left">E-mail</th>
                        <th class="text-left">Endereço</th>
                        <th class="text-left">Telefone</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_nome" placeholder="Nome"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_email" placeholder="E-mail"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_endereco" placeholder="Endereço"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_telefone" placeholder="Telefone"></td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse ($pessoas as $ciclo)
                    <tr wire:key="{{ $ciclo->id }}" {{ !is_null($ciclo->deleted_at) ?? 'class="table-danger"' }}>
                            <td class="p-1 text-center">
                                <img class="direct-chat-img px-1" src="{{ $ciclo->src_foto  }}">
                            </td>
                            <td class="p-1 text-left">
                                {{ $ciclo->apelido }}
                                <br><small>{{ $ciclo->nome }}</small>
                            </td>
                            <td class="p-1 text-left">{{ $ciclo->email }}</td>
                            <td class="p-1 text-left">{{ $ciclo->endereco }}</td>
                            <td class="p-1 text-left">{{ $ciclo->fone }}</td>
                            <td class="p-1 text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-icon" data-bs-toggle="dropdown">Ações  </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('atd.pessoas.editar', $ciclo->id) }}">Editar</a>
                                        <livewire:Atendimento.Pessoa.AAAADeletar :pessoa="$ciclo" :wire:key="'delete-pessoa-'. $ciclo->id" class="dropdown-item" />
                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center"><small>Não há pessoas cadastradas</small></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{-- {{ $pessoas->links() }} --}}
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
        <script>
            
            window.addEventListener('pessoaDeleted', event => {
console.log(event)
                // Livewire.on('pessoaDeleted', () => {
                //     alert('88888777');
                //     // window.location.reload();
                // });
            });

        </script>
    <!-- endpush -->
</div>
