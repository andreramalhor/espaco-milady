<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pessoas</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <div class="row p-2">
                <div class="col-2">
                    @can('###############')
                    <a class="btn btn-secondary btn-block btn-sm float-right" href="{{ route('atd.pessoas.criar') }}"><i class="fa fa-plus"></i> Cadastrar nova pessoa</a>
                    @endcan
                </div>
                <div class="offset-8 col-2">
                    <livewire:Atendimento.Pessoa.PessoaFiltrar />
                </div>
            </div>
            <table class="table projects">
                    <thead class="table-dark">
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-left">Nome<br/>Saldo</th>
                        <th class="text-left">Dt Nascimento</th>
                        <th class="text-left">Contato</th>
                        <th class="text-left">Endereço<br/>Observação</th>
                        <th class="text-left">Saldo</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_nome" placeholder="Nome"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="date" wire:model.live.debounce.200ms="p_dt_nascimento"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_contato" placeholder="Contato"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_endereco" placeholder="Endereço"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_saldo" placeholder="Saldo"></td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse ($pessoas as $ciclo)
                        <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                            <td class="p-1 text-center">
                                <img class="table-avatar" src="{{ $ciclo->src_foto  }}">
                            </td>
                            <td class="p-1 text-left">
                                {{ $ciclo->apelido }}
                                <br/><small>{{ $ciclo->nome }}</small>
                            </td>
                            <td class="p-1 text-left">
                                <small>
                                    {{ \Carbon\Carbon::parse($ciclo->dt_nascimento)->format('d/m/Y') }}
                                </small>
                                <br/>
                                <small>
                                    {{ \Carbon\Carbon::today()->diffInYears(\Carbon\Carbon::parse($ciclo->dt_nascimento)) }} anos
                                </small>
                            </td>
                            <td class="p-1 text-left">
                                <small>
                                    {{ $ciclo->telefone1 ?? '' }} {{ is_null($ciclo->telefone2) ? '' : ' | '.$ciclo->telefone2 }}
                                </small>
                                <br/>
                                <small>{{ $ciclo->email }}</small>
                            </td>
                            <td class="p-1 text-left">
                                <small>
                                    {{ $ciclo->endereco }}
                                </small>
                                <br/>
                                <small>
                                    {{ $ciclo->observacao }}
                                </small>
                            </td>
                            <td class="p-1 text-right">
                                <span class="badge bg-{{ ( $ciclo->saldo_conta > 0 ? 'success' : ( $ciclo->saldo_conta < 0 ? 'danger' : 'secondary' ) ) }}">{{ number_format($ciclo->saldo_conta, 2, ',', '.') }}</span>
                            </td>
                            <td class="p-1 pr-3 text-right">
                                <a class="text-muted" style="pointer-events: auto;" data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-vertical"></i>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('atd.pessoas.mostrar', $ciclo->id) }}">Sobre</a>
                                        <a class="dropdown-item" href="{{ route('atd.pessoas.editar', $ciclo->id) }}">Editar</a>
                                        @if($ciclo->kjahdkwkbewtoip->contains('nome', 'Parceiro'))
                                        <a class="dropdown-item" href="{{ route('atd.pessoas.comissoes', $ciclo->id) }}">Comissões</a>
                                        @endif
                                        <a class="dropdown-item" href="#" wire:click="delete({{ $ciclo->id }})">Deletar</a>
                                    </div>
                                </a>                                
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
                {{ $pessoas->links() }}
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
        <script>
            window.addEventListener('pessoaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
