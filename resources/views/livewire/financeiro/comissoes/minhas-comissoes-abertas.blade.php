<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Comissões Abertas: {{ \App\Models\Atendimento\Pessoa::find($id)->apelido }}<span> - ({{ $id }})</span></h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Data da <br/>Comanda</th>
                        <th class="text-left">Cliente</th>
                        <th class="text-left">Serviço / Produto</th>
                        <th class="text-left">Valor do <br/>serviço</th>
                        <th class="text-right">% Comissão</th>
                        <th class="text-right">Valor da <br/>comissão</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comissoes_abertas->sortBy('dt_prevista')->groupBy('dt_prevista') as $dt_prevista => $gp_dt_prevista)
                    <tr>
                        <td colspan="8" class="bg-secondary">{{ \Carbon\Carbon::parse($dt_prevista)->format('d/m/Y') }}</td>
                    </tr>
                        @foreach($gp_dt_prevista as $comissao)
                        <tr>
                            <td class="text-center">{{ $comissao->id }}</td>
                            <td class="text-center">{{ $comissao->tipo }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse(optional($comissao->skfmwuorwmlpdlm)->created_at)->format('d/m/Y') }}</td>
                            <td class="text-left">{{ $comissao->origem_nome }}</td>
                            <td class="text-left">{{ $comissao->origem_servprod }}</td>
                            <td class="text-right">{{ number_format($comissao->origem_valor, 2, ',', '.') }}</td>
                            <td class="text-right">{{ number_format($comissao->percentual, 2, ',', '.') }} %</td>
                            <td class="text-right">{{ number_format($comissao->valor, 2, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Não há comissões em aberto.</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-right">0,00</th>
                        <th></th>
                        <th class="text-right">{{ number_format($comissoes_abertas->sum('valor'), 2, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{  route('dashboard') }}" class="btn btn-sm btn-default float-left">Voltar</a>
        </div>
    </div>
</div>
