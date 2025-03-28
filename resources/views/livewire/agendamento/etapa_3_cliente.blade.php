<div>
    @if($etapa == 'nome/cliente')
    
    <div class="row mb-2">
        <div class="col-sm-12 text-center">
            <h5 class="m-0"><strong>Confirme os dados</strong></h5>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <button class="btn btn-primary float-right btn-block col-sm-1" wire:click="mudar_etapa( 'data/agendamento' )"><i class="fa fa-arrow-left"></i></button>
            </div>
        </div>
        <div class="card-body row">
            
            <div class="float-end">
                <button wire:click="adicionar_mais_servicos" class="btn btn-sm btn-primary float-end col-3">Adicionar + serviço</button>
            </div>
            
            <div class="col-sm-12 col-lg-6 d-flex text-left align-items-center justify-content-center">

                <table class="table projects">
                    <tbody>
                        <tr>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="{{ $profissional->apelido }}" class="table-avatar" src="{{ $profissional->src_foto }}">
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <a>{{ $servico->nome }}</a>
                                <br>
                                <small>
                                    {{ $profissional->apelido }} 
                                </small>
                                <br>
                                <small>
                                     {{ \Carbon\Carbon::parse($dt_agendamento)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($dt_agendamento.' '.$horario)->format('H:i') }} à {{ \Carbon\Carbon::parse($dt_agendamento.' '.$horario)->addHour(1)->format('H:i') }}
                                </small>
                            </td>
                            <td>
                                <small>
                                    <span class="badge badge-warning float-right">
                                        @if($servico->mostrar_preco)
                                        R$ {{ number_format($servico->vlr_venda, 2, ',', '.') }}
                                        @else
                                        Consulte
                                        @endif
                                    </span>
                                </small>
                            </td>
                        </tr>
                        @foreach ($agendamentos as $askdmaskdasd)
                        <tr>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="{{ \App\Models\Atendimento\Pessoa::find($askdmaskdasd['id_profexec'])->apelido }}" class="table-avatar" src="{{ \App\Models\Atendimento\Pessoa::find($askdmaskdasd['id_profexec'])->src_foto }}">
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <a>{{ \App\Models\Catalogo\ServicoProduto::find($askdmaskdasd['id_servprod'])->nome ?? $askdmaskdasd['id_servprod'] }}</a>
                                <br>
                                <small>
                                    {{ \App\Models\Atendimento\Pessoa::find($askdmaskdasd['id_profexec'])->apelido }}
                                </small>
                                <br>
                                <small>
                                     {{ \Carbon\Carbon::parse($askdmaskdasd['start'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($askdmaskdasd['start'])->format('H:i') }} à {{ \Carbon\Carbon::parse($askdmaskdasd['start'])->addHour(1)->format('H:i') }}
                                    </small>
                            </td>
                            <td>
                                <small>
                                    <span class="badge badge-warning float-right">
                                        @if(\App\Models\Catalogo\ServicoProduto::find($askdmaskdasd['id_servprod'])->mostrar_preco)
                                        R$ {{ number_format($askdmaskdasd['valor'], 2, ',', '.') }}
                                        @else
                                        Consulte
                                        @endif
                                    </small>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
            
            <div class="col-sm-12 col-lg-6">
                <div class="form-group">
                    <label>Nome<strong class="text-red">*</strong></label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" wire:model="nome">
                </div>
                <div class="form-group">
                    <label>Telefone<strong class="text-red">*</strong></label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" wire:model="telefone">
                </div>
                <div class="form-group">
                    <label>E-Mail <small class="text-muted">(opcional)</small></label>
                    <input type="email" class="form-control" wire:model="email">
                </div>
                <div class="form-group">
                    <label>Deixe uma mensagem para o profissional</label>
                    <textarea class="form-control" wire:model="observacao" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <button wire:click="confirmar_agendamento" class="btn btn-primary">Agendar</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{--
    
    {{ \Carbon\Carbon::parse($askdmaskdasd['start'])->format('d/m/Y') }}
    {{ $askdmaskdasd['status'] }}
</div>
--}}
</div>
