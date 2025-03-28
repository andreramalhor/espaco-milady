<div>
    <li class="nav-item dropdown">

        <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">{{ $agendamentos->count() }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            
            <span class="dropdown-item dropdown-header">{{ $agendamentos->count() }} agendamentos não confirmados</span>
    
            <div class="dropdown-divider"></div>
    
            <ul class="products-list product-list-in-card pl-2 pr-2">
            
            @forelse($agendamentos->take(3) as $agendamento)
                
                <li class="item">
                    <div class="product-img">
                        <img src="{{ $agendamento->hhmaqpijffgfhmj->src_foto }}" alt="{{ $agendamento->hhmaqpijffgfhmj->apelido }}" class="img-circle img-size-50">
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-title">
                            <small>
                                {{ optional($agendamento->zlpekczgsltqgwg)->apelido ?? $agendamento->obs }}
                            </small>
                            <span class="badge badge-warning float-right">{{ $agendamento->vlr_venda }}</span>
                        </a>
                        <span class="product-description">
                            <small>
                                {{ \Carbon\Carbon::parse($agendamento['start'])->format('d/m/Y') }} - 
                                {{ \Carbon\Carbon::parse($agendamento['start'])->format('H:i') }} à {{ \Carbon\Carbon::parse($agendamento['end'])->format('H:i') }}
                            </small>
                        </span>
                    </div>
                </li>
        
                <div class="dropdown-divider"></div>

                @if($loop->last)
            
                    <a href="#" class="dropdown-item dropdown-footer">Ver todos</a>
            
                @endif

            @empty
            </ul>    
        
                <a href="#" class="dropdown-item">Não há agendamentos</a>

            @endforelse

        </div>
        
    </li>
    
</div>

{{--

                <table>
                    <tr>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="{{ \App\Models\Atendimento\Pessoa::find($agendamento['id_profexec'])->apelido }}" class="table-avatar" src="{{ \App\Models\Atendimento\Pessoa::find($agendamento['id_profexec'])->src_foto }}">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <a>{{ \App\Models\Catalogo\ServicoProduto::find($agendamento['id_servprod'])->nome ?? $agendamento['id_servprod'] }}</a>
                            <br/>
                            <small>
                                {{ \App\Models\Atendimento\Pessoa::find($agendamento['id_profexec'])->apelido }}
                            </small>
                            <br/>
                            <small>
                                {{ \Carbon\Carbon::parse($agendamento['start'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agendamento['start'])->format('H:i') }} à {{ \Carbon\Carbon::parse($agendamento['start'])->addHour(1)->format('H:i') }}
                            </small>
                        </td>
                        <td>
                            <small>
                                <span class="badge badge-warning float-right">
                                    @if(\App\Models\Catalogo\ServicoProduto::find($agendamento['id_servprod'])->mostrar_preco)
                                    R$ {{ number_format($agendamento['valor'], 2, ',', '.') }}
                                    @else
                                    Consulte
                                    @endif
                                </small>
                            </span>
                        </td>
                    </tr>
                </table>
            
--}}