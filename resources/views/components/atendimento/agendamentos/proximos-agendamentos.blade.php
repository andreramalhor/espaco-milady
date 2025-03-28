<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-cake-candles mr-1"></i>
            Próximos agendamentos
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead class="table-dark">
                    <tr>
                        <th class="text-left p-1">Prof.</th>
                        <th class="text-center p-1">Horário</th>
                        <th class="text-center p-1">Serviço</th>
                        <th class="text-center p-1">Cliente</th>
                        <th class="text-center p-1">Status</th>
                        <th class="text-right p-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proximos_agendamentos as $proximo_agendamento)
                        @if($proximo_agendamento->zlpekczgsltqgwg->nome != "Fechado")
                        <tr>
                            <td class="text-left p-1 pl-2">
                                <small>
                                    <div class="product-img">
                                        <img src="{{ $proximo_agendamento->hhmaqpijffgfhmj->src_foto }}" alt="{{ $proximo_agendamento->hhmaqpijffgfhmj->apelido }}" class="img-circle img-size-32">
                                    </div>
                                </small>
                            </td>
                            <td class="text-center p-1"><small>{{ \Carbon\Carbon::parse($proximo_agendamento->start)->format('H:i') }} à {{ \Carbon\Carbon::parse($proximo_agendamento->end)->format('H:i') }}</small></td>
                            <td class="text-center p-1"><small>{{ $proximo_agendamento->zlpekczgsltqgwg->nome }}</small></td>
                            <td class="text-center p-1"><small>{{ optional($proximo_agendamento->xhooqvzhbgojbtg)->apelido ?? $proximo_agendamento->obs }}</small></td>
                            <td class="text-center p-1">
                                <small><span class="badge badge-warning"  style="background-color:{{ $proximo_agendamento->color }}; color: {{ $proximo_agendamento->textColor }}">{{ $proximo_agendamento->status }}</span>
                            </small></td>
                            <td class="text-right p-1 pr-2">
                                <a class="text-muted" href="{{ route('atd.agendamentos.book') }}"><i class="fa-solid fa-arrow-right"></i></a>
                            </td>
                        </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Não há agendamentos no dia de hoje.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer clearfix">
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
    </div>
</div>
