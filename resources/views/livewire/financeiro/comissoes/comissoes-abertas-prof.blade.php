<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Comissões Abertas: {{ optional(\App\Models\Atendimento\Pessoa::find($id))->apelido ?? '(Comissões não alocadas)' }}<span> - ({{ $id }})</span></h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <td class="text-center"><br><input type="checkbox" wire:click="marcar_todos( $event.target.checked )"></td>
                        <th class="text-center">#</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center"># Origem</th>
                        <th class="text-center">Data da <br/>Comanda</th>
                        <th class="text-left">Cliente</th>
                        <th class="text-left">Serviço / Produto</th>
                        <th class="text-right">Valor do <br/>serviço</th>
                        <th class="text-right">% Comissão</th>
                        <th class="text-right">Valor da <br/>comissão</th>
                        <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comissoes_abertas->sortBy('dt_prevista')->groupBy('dt_prevista') as $dt_prevista => $gp_dt_prevista)
                    <tr>
                        <td colspan="11" class="bg-secondary">{{ \Carbon\Carbon::parse($dt_prevista)->format('d/m/Y') }}</td>
                    </tr>
                    @foreach($gp_dt_prevista as $comissao)
                    <tr>
                        <td class="text-center"><input type="checkbox" wire:model.live="a_pagar" value="{{ $comissao->id }}"></td>
                        <td class="text-center">{{ $comissao->id }}</td>
                        <td class="text-center">{{ $comissao->tipo }}</td>
                        <td class="text-center">{{ $comissao->origem_id }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse(optional($comissao->skfmwuorwmlpdlm)->created_at ?? null)->format('d/m/Y') }}</td>
                        <td class="text-left">{{ $comissao->origem_nome }}</td>
                        <td class="text-left">{{ $comissao->origem_servprod }}</td>
                        <td class="text-right">{{ number_format($comissao->origem_valor, 2, ',', '.') }}</td>
                        <td class="text-right">{{ number_format($comissao->percentual, 2, ',', '.') }} %</td>
                        <td class="text-right">{{ number_format($comissao->valor, 2, ',', '.') }}</td>
                        <td class="text-center">
                            @can('###############')
                            <a wire:click="$dispatch('pdv-comanda-comandamostrar', { id: {{ $comissao->origem_id }} })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                            @endcan
                            
                            @can('###############')
                            <a href="{{ route('fin.comissoes.editar', $comissao->id) }}" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="Editar" data-original-title="Editar"><i class="fas fa-edit fa-fw"></i></a>
                            @endcan
                            
                            @can('###############')
                            {{--
                            <a href="{{ route('fin.comissoes.abertas', $comissao->id) }}" class="text-muted" data-bs-tooltip="tooltip" data-bs-title="Ver" data-original-title="Ver"><i class="fa-solid fa-search"></i></a>
                            --}}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">{{ count($a_pagar) }} / {{ $comissoes_abertas->count() }}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-right">0,00</th>
                        <th></th>
                        <th class="text-right">{{ number_format($comissoes_abertas->whereIn('id', $a_pagar )->sum('valor'), 2, ',', '.') }} / {{ number_format($comissoes_abertas->sum('valor'), 2, ',', '.') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{  route('fin.comissoes.index') }}" class="btn btn-sm btn-default float-left">Cancelar</a>
            
            <button class="btn btn-sm btn-primary float-right {{ (count($a_pagar) > 0 && !is_null($banco)) ? '' : 'disabled' }}" wire:click="comissoes_pagar">Pagar</button>

            <div class="btn-group float-right mr-2" style="width: 150px;">
                <button type="button" class="btn btn-sm btn-default" type="button" data-bs-toggle="dropdown">
                    Banco <i class="fa-solid fa-caret-down"></i>
                    <br><small>{{ $banco->nome ?? '(escolha um banco)'}}</small>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    @foreach(\App\Models\Financeiro\Banco::get() as $ciclo)
                    <a class="dropdown-item {{ $ciclo->nome == $banco ? 'bg-primary' : '' }}" wire:click="banco_mudar('{{$ciclo->nome}}')">{{ $ciclo->nome }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
