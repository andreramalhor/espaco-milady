<div>
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-calendarios-tab" data-bs-toggle="pill" href="#custom-tabs-one-calendarios" role="tab" aria-controls="custom-tabs-one-calendarios" aria-selected="true">Calendário</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-lista-tab" data-bs-toggle="pill" href="#custom-tabs-one-lista" role="tab" aria-controls="custom-tabs-one-lista" aria-selected="false">Lista</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-calendarios" role="tabpanel" aria-labelledby="custom-tabs-one-calendarios-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Calendário 2025</h1>
                                </div>
                            </div>
                            <div class="row">
                                @php
                                $dt_inicio = \Carbon\Carbon::createFromDate($ano_selecionado, 1, 1);
                                $dt_final = \Carbon\Carbon::createFromDate($ano_selecionado, 12, 31);
                                $data = $dt_inicio->copy();
                                $mes_atual = null;
                                @endphp

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="form-control" name="cliente_id" wire:change="teste($event.target.value)">
                                            <option>Selecione</option>
                                            @foreach($fixas->groupBy('id_cliente') as $id_cliente => $agendamentos_clientes)
                                            <option value="{{ $id_cliente }}">{{ optional($agendamentos_clientes->first()->xhooqvzhbgojbtg)->apelido ?? '(cliente não cadastrado)' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>Serviço</label>
                                        <select class="form-control" wire:model.live="servico">
                                            <option>Selecione</option>
                                            @if(!is_null($servicos_do_cliente))
                                            @foreach($servicos_do_cliente->groupBy('id_servprod') as $id_servico => $agendamento_servicos)
                                            <option value="{{ $id_servico }}">{{ optional($agendamento_servicos->first()->zlpekczgsltqgwg)->nome }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label>Ano</label>
                                        <select class="form-control" wire:model.live="ano_selecionado">
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                            <option>2028</option>
                                            <option>2029</option>
                                            <option>2030</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                @while($data <= $dt_final)
                                    @if($mes_atual != $data->month)
                                        @php
                                            $mes_atual = $data->month;
                                            $primeiro_dia_mes = $data->copy()->startOfMonth(); // Obtém o primeiro dia do mês
                                            $dias_em_branco = $primeiro_dia_mes->dayOfWeek; // Quantidade de dias em branco no início do mês
                                        @endphp

                                        <div class="col-md-3">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h5 class="card-title">{{ $data->format('F') }}</h5>
                                                </div>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="p-1">Dom</th>
                                                            <th class="p-1">Seg</th>
                                                            <th class="p-1">Ter</th>
                                                            <th class="p-1">Qua</th>
                                                            <th class="p-1">Qui</th>
                                                            <th class="p-1">Sex</th>
                                                            <th class="p-1">Sáb</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @for($i = 0; $i < $dias_em_branco; $i++)
                                                            <td class="p-1 bg-light"></td> 
                                                            @endfor
                                    @endif

                                                            <td class="p-1 {{ $data->isWeekend() ? 'bg-light ' : ' ' }}"
                                                                style="background-color: {{ !is_null($agendamentos_selecionado->whereBetween('start', [$data->format('Y-m-d').' 00:00:00', $data->format('Y-m-d').' 23:59:59'])->first()) ? $agendamentos_selecionado->whereBetween('start', [$data->format('Y-m-d').' 00:00:00', $data->format('Y-m-d').' 23:59:59'])->first()->color : '' }};"
                                                            >
                                                                {{ $data->day }}
                                                            </td>
                                                            
                                    @if($data->dayOfWeek == 6)
                                                        </tr>
                                    @endif
                                                        
                                    @php
                                                        $data->addDay();
                                    @endphp

                                    @if($mes_atual != $data->month || $data > $dt_final)
                                        @if ($data->dayOfWeek != 0)
                                                        </tr>
                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                @endwhile
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-lista" role="tabpanel" aria-labelledby="custom-tabs-one-lista-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Clientes fixas
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <h4>Clientes</h4>
                                    <div class="row">
                                        <div class="col-5 col-sm-3">
                                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                                @foreach($fixas->groupBy('id_cliente') as $id_cliente => $agendamentos_clientes)
                                                <a class="nav-link" id="vert-tabs-{{ $id_cliente }}-tab" 
                                                    data-bs-toggle="pill" href="#vert-tabs-{{ $id_cliente }}" role="tab" aria-controls="vert-tabs-{{ $id_cliente }}" 
                                                    aria-selected="true">{{ optional($agendamentos_clientes->first()->xhooqvzhbgojbtg)->apelido ?? '(cliente não cadastrado)' }} ( {{ $agendamentos_clientes->count() }} )</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-9">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                @foreach($fixas->groupBy('id_cliente') as $id_cliente => $agendamentos_clientes)
                                                <div class="tab-pane text-left fade" id="vert-tabs-{{ $id_cliente }}" role="tabpanel" aria-labelledby="vert-tabs-{{ $id_cliente }}-tab">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="card card-primary card-tabs">
                                                                <div class="card-header p-0 pt-1">
                                                                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                                                        <li class="pt-2 px-3"><h3 class="card-title"><b>Serviços:</b></h3></li>
                                                                        @foreach($agendamentos_clientes->groupBy('id_servprod') as $id_servico => $agendamento_servicos)
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-{{ $id_cliente }}-{{ $id_servico }}-tab" data-bs-toggle="pill" href="#custom-tabs-{{ $id_cliente }}-{{ $id_servico }}" role="tab" aria-controls="custom-tabs-{{ $id_cliente }}-{{ $id_servico }}" aria-selected="false">{{ optional($agendamento_servicos->first()->zlpekczgsltqgwg)->nome }}  ( {{ $agendamento_servicos->count() }} )</a>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="card-body p-0">
                                                                    <div class="tab-content" id="custom-tabs-two-tabContent">
                                                                        @foreach($agendamentos_clientes->groupBy('id_servprod') as $id_servico => $agendamento_servicos)
                                                                        <div class="tab-pane fade" id="custom-tabs-{{ $id_cliente }}-{{ $id_servico }}" role="tabpanel" aria-labelledby="custom-tabs-{{ $id_cliente }}-{{ $id_servico }}-tab">
                                                                            <table class="table table-bordered table-responsive table-condensed">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Dia</br>Horário</th>
                                                                                        <th>Profissional</th>
                                                                                        <th>id_comanda</th>
                                                                                        <th>valor</th>
                                                                                        <th>obs</th>
                                                                                        <th>status</th>
                                                                                        <th>id_venda_detalhe</th>
                                                                                        <th>prc_comissao</th>
                                                                                        <th>vlr_comissao</th>
                                                                                        <th>grupo</th>
                                                                                        <th>Criado em</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach($agendamento_servicos->sortBy('start') as $agendamento)
                                                                                    <tr style="border-left: 5px solid {{ $agendamento->color }};">
                                                                                        <td class="text-nowrap"><small>{{ $agendamento->id }}</small></td>
                                                                                        <td class="text-nowrap">
                                                                                            {{ \Carbon\Carbon::parse($agendamento->start)->format('d/m/Y') }}
                                                                                            </br>
                                                                                            {{ \Carbon\Carbon::parse($agendamento->start)->format('H:i') }} à {{ \Carbon\Carbon::parse($agendamento->end)->format('H:i') }}
                                                                                        </td>
                                                                                        <td class="text-nowrap">{{ optional($agendamento->hhmaqpijffgfhmj)->apelido ?? $agendamento->id_profexec }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->id_comanda }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->valor }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->obs }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->status }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->id_venda_detalhe }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->prc_comissao }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->vlr_comissao }}</td>
                                                                                        <td class="text-nowrap">{{ $agendamento->grupo }}</td>
                                                                                        <td class="text-nowrap">{{ \Carbon\Carbon::parse($agendamento->created_at)->format('d/m/Y') }}</td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
