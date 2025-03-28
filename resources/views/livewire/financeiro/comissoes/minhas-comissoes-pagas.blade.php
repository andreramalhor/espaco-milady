<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Comissões Pagas: {{ \App\Models\Atendimento\Pessoa::find($id)->apelido }}<span> - ({{ $id }})</span></h3>
        </div>
        <div class="card-body table-responsive p-0">
            <div class="row p-2">
                <div class="col-3" wire:ignore>
                    <table class="table table-sm">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Data do <br/>pagamento</th>
                                <th class="text-center">Qtd de <br/>comissões</th>
                                <th class="text-right">Valor total <br/>das comissões</th>
                                <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pagamentos->sortBy('id_destino') as $comissoes)
                            <tr>
                                <td class="text-center">{{ $comissoes->id_destino }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($comissoes->dt_quitacao)->format('d/m/Y') }}</td>
                                <td class="text-center">{{ $comissoes->qtd_valor }}</td>
                                <td class="text-right">{{ number_format($comissoes->total_valor, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <a wire:click="ver_comissoes('{{ $comissoes->id_destino }}')" class="text-muted" data-bs-tooltip="tooltip" data-bs-title="Ver" data-original-title="Ver"><i class="fa-solid fa-arrow-right"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-center">{{ $pagamentos->count() }}</th>
                                <th class="text-right">{{ number_format($pagamentos->sum('total_valor'), 2, ',', '.') }}</th>
                                <th></th>
                            </tr>    
                        </tfoot>
                    </table>
                </div>
                <div class="col-1"></div>
                <div class="col-8">
                    <div class="row">
                        <table class="table table-sm">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-left">Tipo</th>
                                    <th class="text-center"># Origem</th>
                                    <th class="text-center">Data da <br/>Comanda</th>
                                    <th class="text-left">Cliente</th>
                                    <th class="text-left">Serviço / Produto</th>
                                    <th class="text-left">Valor do <br/>serviço</th>
                                    <th class="text-right">% Comissão</th>
                                    <th class="text-right">Valor da <br/>comissão</th>
                                    <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                                </tr>
                            </thead>
                            @if(!is_null($comissoes_pagas))
                            <tbody>
                                @foreach($comissoes_pagas as $comissao)
                                <tr>
                                    <td class="text-center">{{ $comissao->id }}</td>
                                    <td class="text-left">{{ $comissao->tipo }}</td>
                                    <td class="text-center">{{ $comissao->origem_id }}</td>
                                    <td class="text-center">{{ $comissao->origem_created_at != null ? \Carbon\Carbon::parse($comissao->origem_created_at)->format('d/m/Y') : '' }}</td>
                                    <td class="text-left">{{ $comissao->origem_nome }}</td>
                                    <td class="text-left">{{ $comissao->origem_servprod }}</td>
                                    <td class="text-right">{{ number_format($comissao->origem_valor, 2, ',', '.') }}</td>
                                    <td class="text-right">{{ number_format($comissao->percentual * 100, 2, ',', '.') }} %</td>
                                    <td class="text-right">{{ number_format($comissao->valor, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        @can('###############')
                                        <a href="{{ route('fin.comissoes.pagas', $comissao->id) }}" class="text-muted" data-bs-tooltip="tooltip" data-bs-title="Ver" data-original-title="Ver"><i class="fa-solid fa-search"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">{{ $comissoes_pagas->count() }}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-right">{{ number_format($comissoes_pagas->sum('valor'), 2, ',', '.') }}</th>
                                    <th></th>
                                    <th></th>
                                </tr>    
                            </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                asas
            </div>
        </div>
    </div>
</div>
        
