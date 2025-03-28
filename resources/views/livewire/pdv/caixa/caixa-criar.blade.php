<div>
    <section class='content-header'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-sm-6'>
                    <h5 class='m-0 p-0'>Abrir caixa</h5>
                </div>
                <div class='col-sm-6'>
                    <ol class='breadcrumb float-sm-right'>
                        <li class='breadcrumb-item'><a href='#'>PDV</a></li>
                        <li class='breadcrumb-item'>Caixa</li>
                        <li class='breadcrumb-item active'>Abrir</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-sm-3'>
                    <div class='card card-primary'>
                        <div class='overlay d-none' wire:loading.class.remove='d-none'>
                            <i class='fas fa-2x fa-sync-alt fa-spin'></i>
                        </div>
                        <div class='card-header'>
                            <h3 class='card-title'>Caixa</h3>
                        </div>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='form-group'>
                                        <label>Local</label>
                                        <select class='form-control form-control-sm' wire:model='id_banco' wire:change='caixa_escolhido($event.target.value)'>
                                            <option value=''>Selecione o local do caixa</option>
                                            @foreach (\App\Models\Financeiro\Banco::get() as $banco)
                                            <option value='{{ $banco->id }}' 
                                            @if($banco->existe_caixa_aberto())
                                            disabled
                                            @endif>
                                            {{ $banco->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class='col-sm-12'>
                                    <div class='form-group'>
                                        <label>Saldo atual do caixa</label>
                                        <input type='text' class='form-control form-control-sm text-right' value='R$ {{ number_format(($abertura_atual ?? 0), 2, ',', '.') }}' readonly='readonly'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <form wire:submit.prevent='store'>
                                <a href='{{  route('pdv.caixas.index') }}' class='btn btn-sm btn-default float-left'>Cancelar</a>
                                <button type='submit' class='btn btn-sm btn-primary float-right {{ !$abrir ? 'disabled' : '' }}'>Abrir</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='col-sm-3'>
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>Composição das notas e moedas</h3>
                        </div>
                        <div class='card-body p-0'>

                            <div class='row'>
                                <div class='col-sm-12'>
                                    <ul class='products-list product-list-in-card px-2'>
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/nota200.png') }}' alt='Product Image' style='width:auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 200,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->nota200 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->nota200 ?? 0) * 200, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                        
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/nota100.png') }}' alt='Product Image' style='width: auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 100,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->nota100 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->nota100 ?? 0) * 100, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                        
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/nota50.png') }}' alt='Product Image' style='width: auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 50,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->nota50 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->nota50 ?? 0) * 50, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                        
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/nota20.png') }}' alt='Product Image' style='width: auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 20,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->nota20 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->nota20 ?? 0) * 20, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>

                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/nota10.png') }}' alt='Product Image' style='width: auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 10,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->nota10 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->nota10 ?? 0) * 10, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>

                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/nota5.png') }}' alt='Product Image' style='width: auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 5,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->nota5 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->nota5 ?? 0) * 5, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                        
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/nota2.png') }}' alt='Product Image' style='width: auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 2,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->nota2 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->nota2 ?? 0) * 2, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>

                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/moeda100.png') }}' alt='Product Image' style='width: auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 1,00  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->moeda100 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->moeda100 ?? 0) * 1, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                    
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/moeda50.png') }}' alt='Product Image' style='width:auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 0,50  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->moeda50 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->moeda50 ?? 0) * 0.5, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                    
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/moeda25.png') }}' alt='Product Image' style='width:auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 0,25  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->moeda25 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->moeda25 ?? 0) * 0.25, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                    
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/moeda10.png') }}' alt='Product Image' style='width:auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 0,10  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->moeda10 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->moeda10 ?? 0) * 0.1, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                    
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/moeda5.png') }}' alt='Product Image' style='width:auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 0,05  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->moeda5 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->moeda5 ?? 0) * 0.05, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                    
                                        <li class='item p-1'>
                                            <div class='product-img w-25 p-0'>
                                                <img src='{{ asset('stg/img/pdv/caixa/moedas/moeda1.png') }}' alt='Product Image' style='width:auto; height:30px;'>
                                            </div>
                                            <div class='product-info'>
                                                <span class='product-title'>
                                                    &nbsp;<small class='text-muted'>R$ 0,01  x  </small><spam class="text-dark">{{ $ultimo_caixa_id_banco->moeda1 ?? 0 }}</spam>
                                                    <small class='h6 float-right'>R$ {{ number_format(($ultimo_caixa_id_banco->moeda1 ?? 0) * 0.01, 2, ',', '.') }}</small>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class='card-footer text-center'>
                                <div class='product-info'>
                                    <span class='product-title'>
                                        &nbsp;<spam class='h6 float-right'>
                                            <strong>
                                                    R$ {{ number_format($saldo_caixa_escolhido, 2, ',', '.') }}
                                            </strong>
                                        </spam>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!is_null($lancamentos_pendentes) && $lancamentos_pendentes->count() > 0)
                <div class='col-sm-12'>
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>Lançamentos pendentes</h3>
                        </div>
                        <div class='card-body table-responsive p-0'>
                            <table class='table table-striped table-valign-middle'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th>Tipo</th>                                           {{--   => 'D'--}}
                                        <th>
                                            Cliente<br><small>Conta</small>
                                        </th>                                        {{--   //      ' => 10256   --}}
                                        <th>informacao</th>                                        {{--   //      ' => 'Comissoes de Leila Souza (Milady), do dia 16/11/2022 à 19/11/2022'   --}}
                                        <th>vlr_final</th>                                        {{--   //      ' => '621.00'   --}}
                                        <th>parcela</th>                                        {{--   //      ' => '01/01'   --}}
                                        <th>id_forma_pagamento</th>                                        {{--   //      ' => 1   --}}
                                        <th>descricao</th>                                        {{--   //      ' => 'Dinheiro'   --}}
                                        <th>dt_pagamento</th>                                        {{--   //      ' => null   --}}
                                        <th>id_usuario_lancamento</th>                                        {{--   //      ' => 4   --}}
                                        <th>id_lancamento_origem</th>                                        {{--   //      ' => null   --}}
                                        <th>origem</th>                                        {{--   //      ' => 'fin_conta_interna'   --}}
                                        <th>status</th>                                        {{--   //      ' => 'Confirmado'   --}}
                                        <th>centro_custo</th>                                        {{--   //      ' => null   --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lancamentos_pendentes as $lancamento_pendente)
                                    <tr>
                                        <td>{{ $lancamento_pendente->tipo }}</td>
                                        <td>
                                            {{ $lancamento_pendente->id_cliente }}
                                            <br>
                                            <small>
                                                {{ $lancamento_pendente->id_conta ?? '(sem conta atribuída)' }}
                                            </small>
                                        </td>
                                        <td>{{ $lancamento_pendente->informacao }}</td>                                        {{--   //      ' => 'Comissoes de Leila Souza (Milady), do dia 16/11/2022 à 19/11/2022'   --}}
                                        <td>{{ $lancamento_pendente->vlr_final }}</td>                                        {{--   //      ' => '621.00'   --}}
                                        <td>{{ $lancamento_pendente->parcela }}</td>                                        {{--   //      ' => '01/01'   --}}
                                        <td>{{ $lancamento_pendente->id_forma_pagamento }}</td>                                        {{--   //      ' => 1   --}}
                                        <td>{{ $lancamento_pendente->descricao }}</td>                                        {{--   //      ' => 'Dinheiro'   --}}
                                        <td>{{ $lancamento_pendente->dt_pagamento }}</td>                                        {{--   //      ' => null   --}}
                                        <td>{{ $lancamento_pendente->id_usuario_lancamento }}</td>                                        {{--   //      ' => 4   --}}
                                        <td>{{ $lancamento_pendente->id_lancamento_origem }}</td>                                        {{--   //      ' => null   --}}
                                        <td>{{ $lancamento_pendente->origem }}</td>                                        {{--   //      ' => 'fin_conta_interna'   --}}
                                        <td>{{ $lancamento_pendente->status }}</td>                                        {{--   //      ' => 'Confirmado'   --}}
                                        <td>{{ $lancamento_pendente->centro_custo }}</td>                                        {{--   //      ' => null   --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class='card-footer'>
                        </div>
                    </div>
                </div>
                @endif

                @if(!is_null($cartoes_pendentes) && $cartoes_pendentes->count() > 0)
                <div class='col-sm-12'>
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>Recebimento de Cartões e depósitos:</h3>
                        </div>
                        <div class='card-body p-0'>
                            <table class='table table-sm table-hover no-padding table-valign-middle projects'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th width='5%' class='text-left'>#</th>
                                        <th width='5%' class='text-left'>#pgto</th>
                                        <th width='15%' class='text-left'>Forma</th>
                                        <th width='15%' class='text-left'>Tipo</th>
                                        <th width='20%' class='text-right'>Bandeira</th>
                                        <th width='10%' class='text-right'>Vlr. Real.</th>
                                        <th width='10%' class='text-right'>Média Taxa</th>
                                        <th width='10%' class='text-right'>Vlr. Final</th>
                                        <th width='10%'  class='text-center'><i class='fas fa-ellipsis-h'></i></th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                    @if(isset($cartoes_pendentes) && $cartoes_pendentes->count() > 0)
                                    @foreach($cartoes_pendentes->groupBy('dt_prevista') as $dt_prevista => $cartoes)
                                    <tr data-widget='expandable-table' aria-expanded='false' style='background-color: ghostwhite;'>
                                        <td width='5%' class='text-left'>
                                            <button type='button' class='btn btn-primary p-0'>
                                                <i class='expandable-table-caret fas fa-caret-right fa-fw'></i>
                                            </button>
                                            <!-- <i class='expandable-table-caret fas fa-caret-right fa-fw'></i> -->
                                        </td>
                                        <td width='5%' class='text-left'></td>
                                        <td width='50%' class='text-left' colspan='3'>{{ \Carbon\Carbon::parse($dt_prevista)->format('d/m/Y') }}</td>
                                        <td width='10%' class='text-right'>{{ number_format( $cartoes->sum('vlr_real'), 2, ',', '.') }}</td>
                                        <td width='10%' class='text-right'>{{ number_format( $cartoes->avg('prc_descontado'), 2, ',', '.') }}</td>
                                        <td width='10%' class='text-right'>{{ number_format( $cartoes->sum('vlr_final'), 2, ',', '.') }}</td>
                                        <td width='10%' class='text-center'></td>
                                    </tr>
                                    <tr class='expandable-body d-none'>
                                        <td colspan='9'>
                                            <div class='p-0'>
                                                <table class='table table-hover m-0' style='width: -webkit-fill-available;'>
                                                    <tbody>
                                                        @foreach($cartoes as $cartao)
                                                        <tr data-widget='expandable-table'>
                                                            <td width='5%' class='text-left'></td>
                                                            <td width='5%' class='text-left' style='border-bottom-width: 0px;'>{{ $cartao->id ?? 'aaaaa' }}</td>
                                                            <td width='15%' class='text-left' style='border-bottom-width: 0px;'>{{ $cartao->gevmgwjvzgdexwm->forma ?? $cartao->id_pagamento ?? 'aaaaa' }}</td>
                                                            <td width='15%' class='text-left' style='border-bottom-width: 0px;'>{{ $cartao->gevmgwjvzgdexwm->tipo ?? $cartao->id_pagamento ?? 'aaaaa' }}</td>
                                                            <td width='20%' class='text-left' style='border-bottom-width: 0px;'>{{ $cartao->gevmgwjvzgdexwm->bandeira ?? $cartao->id_pagamento ?? 'aaaaa' }}</td>
                                                            <td width='10%' class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $cartao->vlr_real, 2, ',', '.') }}</td>
                                                            <td width='10%' class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $cartao->prc_descontado, 2, ',', '.') }}</td>
                                                            <td width='10%' class='text-right' style='border-bottom-width: 0px;'>{{ number_format( $cartao->vlr_final, 2, ',', '.') }}</td>
                                                            <td width='10%' class='text-center'>
                                                                <a class='btn btn-xs btn-default' data-bs-tooltip='tooltip' data-bs-title='visualizar' data-original-title='visualizar'><i class='fas fa-search fa-fw'></i></a>
                                                            </td> <!-- qjslcnhfdjsftre -->
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if(isset($cartoes_pendentes) && $cartoes_pendentes->count() > 0)
                                    <tr style='background-color: ghostwhite;'>
                                        <th width='5%' class='text-left'></th>
                                        <th width='5%' class='text-left'></th>
                                        <th width='50%' class='text-left' colspan='3'></th>
                                        <th width='10%' class='text-right'>{{ number_format( $cartoes_pendentes->sum('vlr_real'), 2, ',', '.') }}</th>
                                        <th width='10%' class='text-right'>{{ number_format( $cartoes_pendentes->avg('prc_descontado'), 2, ',', '.') }}</th>
                                        <th width='10%' class='text-right'>{{ number_format( $cartoes_pendentes->sum('vlr_final'), 2, ',', '.') }}</th>
                                        <th width='10%' class='text-center'></th>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                        <div class='card-footer'>
                        </div>
                    </div>
                </div>
                @endif

                @if(!is_null($this->user_possui_caixa_aberto))
                <div class='modal fade show' style='display: block;' aria-modal='true' role='dialog'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header py-2'>
                                <h4 class='modal-title'>Você possui caixa aberto!</h4>
                            </div>
                            <div class='modal-body'>
                                <p>
                                    O caixa <strong>{{ $user_possui_caixa_aberto->id }}</strong> está aberto!
                                    Por favor, feche-o antes de abrir outro.
                                </p>
                            </div>
                            <div class='modal-footer p-1'>
                                <a href='{{ route('pdv.caixas.index') }}' class='btn btn-primary float-end'>Voltar para lista de caixas</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal-backdrop fade show'></div>
                @endif
            </div>
        </div>
    </section>       
</div>
    