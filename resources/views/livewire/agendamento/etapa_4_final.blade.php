<div>
    @if($etapa == 'concluido')
    
    <div class="row mb-2">
        <div class="col-sm-12 text-center">
            <h5 class="m-0"><strong>Conclusão de agendamento</strong></h5>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body justify-content-center text-center">
            <div class="row">
                <div class="col-12">
                    <i class="fa fa-check text-success mb-5" style="font-size: 45px;"></i>
                    <br/>
                    <h3>Agendado com sucesso</h3>
                </div>
            </div>
            <br/>
            <div class="row">
                <table class="table projects">
                    <tbody>
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
                                <br/>
                                <small>
                                    {{ \App\Models\Atendimento\Pessoa::find($askdmaskdasd['id_profexec'])->apelido }}
                                </small>
                                <br/>
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
        </div>
        <br/>
        <div class="card-footer">
            <div class="col-12 text-center">
                <h5 class="fw-bolder text-gray-800 mb-3">Milady Espaço de Beleza Ltda</h5>
                <div class="fw-bold text-gray-400 mb-6">33-99983-4822</div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a class="btn btn-app" href="https://wa.me/5533999834822/?text=Oi,%20poderia%20me%20ajudar?" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    <a class="btn btn-app" href="https://www.instagram.com/miladyespaco" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                    <a class="btn btn-app" href="tel:33999834822"><i class="fas fa-phone-volume"></i> Telefone</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
