<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pessoas</h3>
        </div>
        <div class="card-body table-responsive table-bordered p-0">
            <table class="table projects">
                    <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Data</br>Horário</th>
                        <th class="text-left">Cliente</th>
                        <th class="text-left">Serviço</br>Profissional</th>
                        <th class="text-left">id_comanda</th>
                        <th class="text-left">valor</th>
                        <th class="text-left">id_criador</th>
                        <th class="text-left">status</th>
                        <th class="text-left">id_venda_detalhe</th>
                        <th class="text-left">prc_comissao</th>
                        <th class="text-left">vlr_comissao</th>
                        <th class="text-left">grupo</th>
                        <th class="text-left">telefone</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="date" wire:model.live.debounce.200ms="p_dt_start"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_nome" placeholder="Nome"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_contato" placeholder="Contato"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_endereco" placeholder="Endereço"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_saldo" placeholder="Saldo"></td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse ($agendamentos as $ciclo)
                        <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                            <td class="text-center" rowspan="2">{{ $ciclo->id }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($ciclo->start)->format('d/m/Y') }}</br>{{ \Carbon\Carbon::parse($ciclo->start)->format('H:i') }}</td>
                            <td class="text-left">{{ optional($ciclo->xhooqvzhbgojbtg)->apelido ?? '(cliente não cadastrado)' }}</td>
                            <td class="text-left">
                                {{ optional($ciclo->zlpekczgsltqgwg)->nome }}
                            </br>
                                {{ optional($ciclo->hhmaqpijffgfhmj)->apelido ?? '(sem profissional)' }}
                            </td>
                            <td class="text-left">{{ $ciclo->id_comanda }}</td>
                            <td class="text-left">{{ $ciclo->valor }}</td>
                            <td class="text-left">{{ $ciclo->id_criador }}</td>
                            <td class="text-left">{{ $ciclo->status }}</td>
                            <td class="text-left">{{ $ciclo->id_venda_detalhe }}</td>
                            <td class="text-left">{{ $ciclo->prc_comissao }}</td>
                            <td class="text-left">{{ $ciclo->vlr_comissao }}</td>
                            <td class="text-left">{{ $ciclo->grupo }}</td>
                            <td class="text-left">{{ $ciclo->telefone }}</td>
                            <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                        </tr>
                        <tr>
                            <td class="text-left p-0 no-wrap" colspan="10"><strong>Obs: </strong>{{ $ciclo->obs }}</td>
                            <td class="text-left p-0 no-wrap" colspan="3"><strong>Criado em: </strong>{{ \Carbon\Carbon::parse($ciclo->created_at)->format('d/m/Y H:i') }}</td>
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
                {{ $agendamentos->links() }}
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
