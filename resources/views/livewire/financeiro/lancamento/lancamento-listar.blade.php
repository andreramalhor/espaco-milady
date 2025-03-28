<div>
    <livewire:Financeiro.Lancamento.Auxiliar.LancamentoTransferencia />
    <livewire:Financeiro.Lancamento.Auxiliar.LancamentoDespesaVale />

    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Lançamentos financeiros</h3>
            <div class="card-tools">
                <span title="3 New Messages" class="badge badge-primary">3</span>
                <button type="button" class="btn btn-tool" wire:click="filtros_mostrar">
                    <i class="fas fa-{{ $filtros ? 'minus' : 'plus' }}"></i>
                </button>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="row p-2">
                <div class="col-sm-6">
                    <a class="btn btn-primary btn-sm" href="{{ route('fin.lancamentos.criar') }}"><i class="fa fa-plus"></i> Novo lançamento</a>&nbsp;
                    <a class="btn btn-secondary btn-sm" wire:click="mostrar_filtro"><i class="fa fa-filter"></i></a>
                </div>
                
                <div class="col-sm-6">
                    <div class="btn-group float-end p-0 ml-1">
                        <!-- <a href="#" onclick="lancamentos_direcionar('lancar')" class="btn btn-primary">Lançar (desativado)</a> -->
                    </div>
                    <div class="btn-group float-end p-0 ml-1">
                        <a class="btn btn-warning btn-sm" wire:click="$dispatch('chamar-modal', { modal: 'transferencia' } )">Transferências</a>
                    </div>

                    <div class="btn-group float-end p-0 ml-1">
                        <a class="btn btn-success btn-sm" href="{{ route('fin.lancamentos.criar.receita') }}" >Receitas</a>
                        <!-- <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-icon" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end" role="menu" style="">
                            <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('despesa.vale')">Vale</a>
                            <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Adiantamento</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Energia</a>
                            <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Internet</a>
                            <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Celular</a>
                            <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Água</a>
                            <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Água</a>
                        </div> -->
                    </div>
                    <div class="btn-group float-end p-0 ml-1">
                        <a class="btn btn-danger btn-sm" href="{{ route('fin.lancamentos.criar.despesa') }}" >Despesas</a>
                        @if(isset(auth()->user()->abcdefghijklmno))
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle dropdown-icon" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-end btn-sm" role="menu" style="">
                            <a class="dropdown-item" wire:click="$dispatch('chamar-modal', { modal: 'despesa-vale' })">Vale / Adiantamento</a>
                            <!--
                                <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Vale</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Energia</a>
                                <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Internet</a>
                                <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Celular</a>
                                <a class="dropdown-item" href="#" onclick="lancamentos_direcionar('aksjalks')">Água</a>
                            -->
                        </div>
                        @endif
                    </div>
                </div>

            </div>

            @if($filtro)
            <div class="row">
                <div class="row">
                    <div class="col-sm-12">
                        <h6>Filtros</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Tipo</label>
                            <select class="form-control" wire:model.live="f_tipo">
                                <option>Todos</option>
                                <option>NULO</option>
                                <option value="R">Receita</option>
                                <option value="D">Despesa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Banco</label>
                            <select class="form-control" wire:model.live="f_id_banco">
                                <option>Todos</option>
                                <option>NULO</option>
                                <option value="1">Caixa (Gaveta)</option>
                                <option value="2">Sicoob Credileste</option>
                                <option value="3">Stone</option>
                                <option value="4">Cofre</option>
                                <option value="5">Paralelo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Conta contábil</label>
                            <select class="form-control" wire:model.live="f_id_conta">
                                <option>Todos</option>
                                <option>NULO</option>
                                @foreach( \App\Models\Configuracao\ContaContabil::orderBy('titulo', 'asc')->get() as $plano_de_conta )
                                <option value="{{ $plano_de_conta->id }}">{{ $plano_de_conta->titulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Pessoa</label>
                            <select class="form-control" wire:model.live="f_id_cliente">
                                <option>Todos</option>
                                <option>NULO</option>
                                @foreach( \App\Models\Atendimento\Pessoa::orderBy('nome', 'asc')->get() as $cliente )
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" wire:model.live="f_status">
                                <option>Todos</option>
                                <option>NULO</option>
                                <option>Confirmado</option>
                                <option>Pago</option>
                                <option>Aguardando Pagamento</option>
                                <option>Recebido</option>
                                <option>Aguardando Recebimento</option>
                                <option>Cancelado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label>Centro Custo</label>
                            <select class="form-control" wire:model.live="f_centro_custo">
                                <option>Todos</option>
                                <option>NULO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Período</label>
                            <div class="input-group">
                                <div class="input-group-prepend" wire:click="mes_subtratir">
                                    <span class="input-group-text"><i class="fa-solid fa-angles-left"></i></span>
                                </div>
                                <input type="text" class="form-control text-center" value="{{ $inicio->format('F/Y') }}">
                                <div class="input-group-append" wire:click="mes_adicionar">
                                    <div class="input-group-text"><i class="fas fa-angles-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Campo</label>
                            <select class="form-control" wire:model.live="c_fillable">
                                <option>Todos</option>
                                @foreach( (new \App\Models\Financeiro\Lancamento())->getFillable() as $campo )
                                <option>{{ $campo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control" wire:model.live="c_value">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label>Atualizar lote</label>
                            <button class="form-control" wire:click="atualizar_lote">Atualizar</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <div class="table-responsive p-0">
            <table class="table projects">
                <thead class="table-dark">
                    <tr style="border-left: 5px solid #212529;">
                        <th class="text-center">#</th>
                        <th class="text-center">Data</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">
                            Caixa</br>
                            <small>Banco</small>
                        </th>
                        <th class="text-left">
                            <small>Conta</small></br>
                            Num. Doc.
                        </th>
                        <th class="text-left">
                            <small>Informação</small></br>
                            Cliente
                        </th>
                        <th class="text-right text-nowrap">
                            Valor Final</br>
                            <small class="text-nowrap">
                                <div class="text-left text-nowrap float-start">Desc./Acr.</div>
                                <div class="text-right text-nowrap float-end">Vlr Bruto</div>
                            </small>
                        </th>
                        <th class="text-center">Parcela</th>
                        <th class="text-center">Forma Pgto</th>
                        <th class="text-center">
                            <small>
                                dt_vencimento
                            </small>
                        <br>    
                            <small>
                                dt_quitacao
                            </small>
                        </th>
                        <th class="text-center">
                            <small>
                                dt_confirmacao
                            </small>
                        </th>
                        <th class="text-center">
                            <small>
                                id_lancamento_origem
                            </small>
                            <br>
                            <small>
                                origem
                            </small>
                        </th>
                        <th class="text-center">centro_custo</th>
                        <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-left: 5px solid white;">
                        <td class="p-0"></td>
                        <td class="p-0"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_status"         placeholder="Status"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_id_caixa"       placeholder="Caixa"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_conta"          placeholder="Conta"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_infor_nome"     placeholder="Inform. / Nome"></td>
                        <td class="p-0 pl-1 py-1"><input class="form-control form-control-sm form-block" type="text" wire:model.live.debounce.200ms="p_valor"          placeholder="Valor"></td>
                        <td class="p-0"></td>
                        <td class="p-0"></td>
                    </tr>
                    @forelse($lancamentos as $ciclo)
                    <tr style="border-left: 5px solid {{ $ciclo->cor_status['cor'] ?? 'orange' }};">
                        <td class="p-0 text-center">
                            <input type="checkbox" wire:model="selecionados" value="{{ $ciclo->id }}">
                        </td>
                        <td class="p-0 text-center text-nowrap"><small>{{ $ciclo->dt_competencia ? \Carbon\Carbon::parse($ciclo->dt_competencia)->format('d/m/Y') : '' }}</small></td>
                        <td class="p-0 text-center text-nowrap"><small><span class="badge badge-success">{{ $ciclo->status ?? 'NULO' }}</span></small></td>
                        <td class="p-0 text-center text-nowrap">
                            <small>{{ $ciclo->id_caixa ?? 'NULO' }}</small></br>
                            {{ $ciclo->yaapdycfbplzkeg->nome ?? $ciclo->id_banco ?? 'NULO' }}
                        </td>
                        <td class="p-0 text-left text-nowrap">
                            <small>{{ $ciclo->qlwiqwuheqlefkd->titulo ?? $ciclo->id_conta ?? 'NULO' }}</small></br>
                            {{ $ciclo->num_documento ?? 'NULO' }}
                        </td>
                        <td class="p-0 text-left text-nowrap">
                        <!-- <td class="p-0 text-left text-nowrap d-inline-block text-truncate" style="max-width: 250px;"> -->
                            <small class="">{{ $ciclo->informacao ?? 'NULO' }}</small></br>
                            {{ $ciclo->qexgzmnndqxmyks->apelido ?? $ciclo->id_cliente ?? 'NULO' }}
                        </td>
                        <td class="p-0 text-right">
                            <span class=" 
                                @if($ciclo->tipo = "D")
                                text-red
                                @elseif($ciclo->tipo = "R")
                                text-green
                                @elseif($ciclo->tipo = "T")
                                text-blue
                                @endif
                                ">{{ number_format($ciclo->vlr_final * -1 ?? 0, 2, ',', '.') ?? 'NULO' }}
                            </span>
                            </br>
                            <small>
                                <div class="float-start">
                                    <span class="text-left">{{ number_format($ciclo->vlr_dsc_acr ?? 0, 2, ',', '.') ?? 'NULO' }}</span>
                                </div>
                                <div class="float-end">
                                    <span class="text-right 
                                    @if($ciclo->tipo = "D")
                                    text-red
                                    @elseif($ciclo->tipo = "R")
                                    text-green
                                    @elseif($ciclo->tipo = "T")
                                    text-blue
                                    @endif
                                    ">{{ number_format($ciclo->vlr_bruto * -1 ?? 0, 2, ',', '.') ?? 'NULO' }}</span>
                                </div>
                            </small>
                        </td>
                        <td class="p-0 text-center text-nowrap"><small>{{ $ciclo->parcela ?? 'NULO' }}</small></td>
                        <td class="p-0 text-center text-nowrap"><small>{{ $ciclo->id_forma_pagamento ?? 'NULO' }}</br>{{ $ciclo->descricao ?? 'NULO' }}</small></td>
                        <td class="p-0 text-center text-nowrap">
                            <small>
                                {{ $ciclo->dt_vencimento ? \Carbon\Carbon::parse($ciclo->dt_vencimento)->format('d/m/Y') : '.' }}
                            </small>                            
                            </br>
                            <small>
                                {{ $ciclo->dt_quitacao ? \Carbon\Carbon::parse($ciclo->dt_quitacao)->format('d/m/Y') : '.' }}
                            </small>
                        </td>
                        <td class="p-0 text-center text-nowrap">
                            <small>
                                {{ $ciclo->dt_confirmacao ? \Carbon\Carbon::parse($ciclo->dt_confirmacao)->format('d/m/Y') : '.' }}
                            </small>
                        </td>
                        <td class="p-0 text-center text-nowrap">
                            <small>
                                {{ $ciclo->id_lancamento_origem ?? 'NULO' }}
                            </small>
                            <br>
                            <small>
                                {{ $ciclo->origem ?? 'NULO' }}
                            </small>
                        </td>
                        <td class="p-0 text-center text-nowrap">{{ $ciclo->centro_custo ?? 'NULO' }}</td>
                        <td class="p-0 text-left text-nowrap">
                            @if($ciclo->svlkjakslfksljd->count() > 0)
                                <a href="{{ route('fin.lancamentos.editar', $ciclo->id) }}" class="btn btn-default btn-xs" data-bs-tooltip="tooltip" data-bs-title="Lançamentos" data-original-title="Lançamentos"><i class="fas fa-receipt fa-fw"></i></a>
                            @else
                            bbbb
                            @endif

                            <a wire:click="delete({{ $ciclo->id }})" class="btn btn-xs btn-danger" data-bs-tooltip="tooltip" data-bs-title="Excluir" data-original-title="Excluir"><i class="fas fa-trash fa-fw"></i></a>
                            {{--
                            <a wire:click="mostrar_lancamento_popup({{ $ciclo->id }})" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                            @if( $ciclo->cor_status['editar'] )
                            <a href="{{ route('fin.lancamentos.editar', $ciclo->id) }}" class="btn btn-default btn-xs" data-bs-tooltip="tooltip" data-bs-title="Editar" data-original-title="Editar"><i class="fas fa-pencil fa-fw"></i></a>
                            @endif
                            @can('###############')
                            <!-- <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modal-overlay">Launch Modal with Overlay</button> -->
                            <!-- <a href="{{ route('fin.lancamentos.mostrar', $ciclo->id) }}" class="btn btn-default btn-xs" data-bs-tooltip="tooltip" data-bs-title="Visualizar" data-original-title="Visualizar"><i class="fas fa-search fa-fw"></i></a> -->
                            @endcan
                            <a wire:click="delete({{ $ciclo->id }})" class="btn btn-xs btn-danger" data-bs-tooltip="tooltip" data-bs-title="Excluir" data-original-title="Excluir"><i class="fas fa-trash fa-fw"></i></a>
                            @can('###############')
                            <a wire:click="$dispatchTo('PDV/Lancamento/LancamentoMostrar', 'pdv-lancamento-lancamentomostrar', { postId: 1 })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar">...</a>
                            <a wire:click="mostrar_lancamento_popup({{ $ciclo->id }})" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar"><i class="fas fa-search fa-fw"></i></a>
                            <a href="{{ route('fin.lancamentos.index', $ciclo->id) }}" class="btn btn-info btn-xs" data-bs-tooltip="tooltip" data-bs-title="Gerenciar" data-original-title="Gerenciar"><i class="fas fa-gear fa-fw"></i></a>
                            <div class="btn-group">
                                @if ($ciclo->id_usuario_abertura == Auth::User()->id && $ciclo->status == 'Aberto')
                                <a href="{{ route('pdv.lancamentos.mostrar', $ciclo->id) }}" class="btn btn-info btn-xs" data-bs-tooltip="tooltip" data-bs-title="Fechar" data-original-title="Fechar"><i class="fas fa-lock fa-fw"></i></a>
                                @endif
                                @if ( $ciclo->status != 'Validado' &&
                                $ciclo->status != 'Aberto' &&
                                \Carbon\Carbon::parse($ciclo->dt_abertura)->isSameDay(\Carbon\Carbon::now()) &&
                                $ciclo->id_usuario_abertura == Auth::User()->id )
                                <a href="{{ route('pdv.lancamentos.mostrar', $ciclo->id) }}" class="btn btn-success btn-xs" data-bs-tooltip="tooltip" data-bs-title="Validar" data-original-title="Validar"><i class="fas fa-lock fa-fw"></i></a>
                                @endif
                            </div>
                            @endcan
                            --}}
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="15" class="text-center"><small>Não há lançamentos cadastradas</small></td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <div class="card-footer clearfix">
            <div class="float-right">
                {{-- $lancamentos->links() --}}
            </div>
        </div>
    </div>

    <!-- push('scripts') -->
    <script>
        window.addEventListener('lancamentoUpdated', event => {
            console.log(event)
        });    
    </script>
    <!-- endpush -->

    @if($modal)
    <div class="modal fade show" id="modal-overlay" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <div class="overlay"> -->
                    <!-- <i class="fas fa-2x fa-sync fa-spin"></i> -->
                <!-- </div> -->
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" wire:click="fechar_modal()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body…</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" wire:click="fechar_modal()">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"></div>
    @endif
</div>
