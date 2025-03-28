<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formas de pagamentos</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover">
                <tbody>
                    @foreach($forma_de_pagamento->groupBy('forma') as $forma => $formas)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td colspan="11">
                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                            &nbsp;
                            @if( $forma == "Dinheiro")
                            <i class="fas fa-money-bill-wave"></i>
                            @endif
                            
                            @if( $forma == "Cartão de Débito")
                            <i class="fas fa-credit-card"></i>
                            @endif
                            
                            @if( $forma == "Cartão de Crédito")
                            <i class="far fa-credit-card"></i>
                            @endif
                            
                            @if( $forma == "Cheque")
                            <i class="fas fa-money-check-dollar"></i>
                            @endif
                            
                            @if( $forma == "Depósito")
                            <i class="fas fa-cash-register"></i>
                            @endif
                            
                            @if( $forma == "Fiado")
                            <i class="fas fa-vault"></i>
                            @endif
                            
                            @if( $forma == "Crédito Interno")
                            <i class="fas fa-file-invoice"></i>
                            @endif
                            
                            @if( $forma == "Pix")
                            <i class="fas fa-comment-dollar"></i>
                            @endif
                            
                            @if( $forma == "Boleto")
                            <i class="fas fa-money-check"></i>
                            @endif
                            
                            @if( $forma == "Descontado de outra forma")
                            <i class="fas fa-cash-register"></i>
                            @endif
                            
                            {{ $forma }}
                        </td>
                    </tr>
                    <tr class="expandable-body d-none">
                        <td colspan="11">
                            <div class="p-0">
                                <table class="table table-hover m-0" style="width: 100%;">
                                    <tbody>
                                        @foreach($formas->groupBy('bandeira') as $bandeira => $pagamentos)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                {{ $bandeira }}
                                            </td>
                                        </tr>
                                        <tr class="expandable-body d-none">
                                            <td>
                                                <div class="p-0">
                                                    <table class="table table-bordered table-hover table-sm m-0" style="width: 100%;">
                                                        <thead class="table-dark">
                                                            <tr>
                                                                <th width="10%" class="text-center">Parcela</th>
                                                                <th width="10%" class="text-center">tipo</th>
                                                                <th width="10%" class="text-center">prazo</th>
                                                                <th width="10%" class="text-center">pri_vcto</th>
                                                                <th width="10%" class="text-center">recebimento</th>
                                                                <th width="10%" class="text-center">local</th>
                                                                <th width="10%" class="text-center">conferir</th>
                                                                <th width="10%" class="text-center">destino</th>
                                                                <th width="10%" class="text-right">Taxa</th>
                                                                <th width="10%" class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($pagamentos as $pagamento)
                                                            <tr>
                                                                <td width="10%" class="text-center">{{ $pagamento->parcela }}</td>
                                                                <td width="10%" class="text-center">{{ $pagamento->tipo }}</td>
                                                                <td width="10%" class="text-center">{{ $pagamento->prazo }}</td>
                                                                <td width="10%" class="text-center">{{ $pagamento->pri_vcto }}</td>
                                                                <td width="10%" class="text-center">{{ $pagamento->recebimento }}</td>
                                                                <td width="10%" class="text-center">{{ $pagamento->local }}</td>
                                                                <td width="10%" class="text-center">{{ $pagamento->conferir }}</td>
                                                                <td width="10%" class="text-center">{{ $pagamento->destino }}</td>
                                                                <td width="10%" class="text-right">{{ number_format($pagamento->taxa, 2, ',', '.') }}</td>
                                                                <td width="10%" class="text-right">
                                                                    <button type="button" class="btn btn-default btn-xs" wire:click='editar("{{ $pagamento->id }}")'><i class="fa-solid fa-edit"></i></button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            <tr class="expandable-head">
                                                                <td colspan="11">
                                                                    <button type="button" class="btn btn-primary btn-xs" wire:click='criar("{{ $forma }}", "{{ $bandeira }}")'><i class="fa-solid fa-plus"></i> Incluir nova PARCELA</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr class="expandable-head">
                                            <td colspan="11">
                                                <button type="button" class="btn btn-primary btn-xs" wire:click='criar("{{ $forma }}", "{{ $bandeira }}")'><i class="fa-solid fa-plus"></i> Incluir nova BANDEIRA</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    
    </div>
    


    {{--
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formas de Pagamento</h3>
        </div>
        <div class="card-body p-2">
            <div class="row">
                <div class="px-1" style="width: 15%;">
                    <label clas="mb-0">Nível</label>
                </div>
                <div class="px-1 text-left" style="width:50%;">
                    <label clas="mb-0">Título</label>
                </div>
                <div class="px-1 text-left" style="width:10%;">
                    <label clas="mb-0">Conta</label>
                </div>
            </div>
            @foreach($forma_de_pagamento->where('nivel', '=', 0) as $nivel_0)
            <div class="row pb-1">
                <div class="px-1 text-left" style="width: 15%;">
                    <input class="form-control form-control-sm form-block" style="background-color: #007bff; color: white;" type="text" value="{{ $nivel_0->nivel ?? 'nivel' }}" readonly="readonly">
                </div>
                <div class="px-1 text-left" style="width: 50%;">
                    <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_0->titulo ?? 'titulo' }}" readonly="readonly">
                </div>
                <div class="px-1 text-left" style="width: 10%;">
                    <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_0->nova_conta ?? 'conta' }}" readonly="readonly">
                </div>
                <div class="px-1" style="width: 3%;">
                    <button type="button" class="btn btn-block btn-success btn-sm" wire:click='criar({{ $nivel_0->id }})"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
                @foreach($nivel_0->sasjiqelrhwkejs as $nivel_1)
                <div class="row pb-1">
                    <div class="px-1 text-left" style="width: 3%;">
                        &nbsp;
                    </div>
                    <div class="px-1 text-left" style="width: 12%;">
                        <input class="form-control form-control-sm form-block" style="background-color: #3295ff; color: white;" type="text" value="{{ $nivel_1->nivel ?? 'nivel' }}" readonly="readonly">
                    </div>
                    <div class="px-1 text-left" style="width: 50%;">
                        <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_1->titulo ?? 'titulo' }}" readonly="readonly">
                    </div>
                    <div class="px-1 text-left" style="width: 10%;">
                        <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_1->nova_conta ?? 'conta' }}" readonly="readonly">
                    </div>
                    <div class="px-1" style="width: 3%;">
                        <button type="button" class="btn btn-block btn-success btn-sm" wire:click='criar({{ $nivel_1->id }})"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="px-1" style="width: 3%;">
                        @if($nivel_1->sasjiqelrhwkejs->count() == 0)
                        <button type="button" class="btn btn-block btn-danger btn-sm" wire:click="delete({{ $nivel_1->id }})"><i class="fa-solid fa-trash-can"></i></button>
                        @endif
                    </div>
                </div>
                    @foreach($nivel_1->sasjiqelrhwkejs as $nivel_2)                            
                    <div class="row pb-1">
                        <div class="px-1 text-left" style="width: 6%;">
                            &nbsp;
                        </div>
                        <div class="px-1 text-left" style="width: 10%;">
                            <input class="form-control form-control-sm form-block" style="background-color: #66afff; color: white;" type="text" value="{{ $nivel_2->nivel ?? 'nivel' }}" readonly="readonly">
                        </div>
                        <div class="px-1 text-left" style="width: 50%;">
                            <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_2->titulo ?? 'titulo' }}" readonly="readonly">
                        </div>
                        <div class="px-1 text-left" style="width: 10%;">
                            <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_2->nova_conta ?? 'conta' }}" readonly="readonly">
                        </div>
                        <div class="px-1" style="width: 3%;">
                            <button type="button" class="btn btn-block btn-success btn-sm" wire:click='criar({{ $nivel_2->id }})"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="px-1" style="width: 3%;">
                            @if($nivel_2->sasjiqelrhwkejs->count() == 0)
                            <button type="button" class="btn btn-block btn-danger btn-sm" wire:click="delete({{ $nivel_2->id }})"><i class="fa-solid fa-trash-can"></i></button>
                            @endif
                        </div>
                    </div>
                        @foreach($nivel_2->sasjiqelrhwkejs as $nivel_3)
                        <div class="row pb-1">
                            <div class="px-1 text-left" style="width: 10%;">
                                &nbsp;
                            </div>
                            <div class="px-1 text-left" style="width: 6%;">
                                <input class="form-control form-control-sm form-block" style="background-color: #99caff; color: white;" type="text" value="{{ $nivel_3->nivel ?? 'nivel' }}" readonly="readonly">
                            </div>
                            <div class="px-1 text-left" style="width: 50%;">
                                <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_3->titulo ?? 'titulo' }}" readonly="readonly">
                            </div>
                            <div class="px-1 text-left" style="width: 10%;">
                                <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_3->nova_conta ?? 'conta' }}" readonly="readonly">
                            </div>
                            <div class="px-1" style="width: 3%;">
                                <button type="button" class="btn btn-block btn-success btn-sm" wire:click='criar({{ $nivel_3->id }})"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="px-1" style="width: 3%;">
                                @if($nivel_3->sasjiqelrhwkejs->count() == 0)
                                <button type="button" class="btn btn-block btn-danger btn-sm" wire:click="delete({{ $nivel_3->id }})"><i class="fa-solid fa-trash-can"></i></button>
                                @endif
                            </div>
                        </div>
                            @foreach($nivel_3->sasjiqelrhwkejs as $nivel_4)
                            <div class="row pb-1">
                                <div class="px-1 text-left" style="width: 12%;">
                                    &nbsp;
                                </div>
                                <div class="px-1 text-left" style="width: 3%;">
                                    <input class="form-control form-control-sm form-block" style="background-color: #cce4ff; color: white;" type="text" value="{{ $nivel_4->nivel ?? 'nivel' }}" readonly="readonly">
                                </div>
                                <div class="px-1 text-left" style="width: 50%;">
                                    <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_4->titulo ?? 'titulo' }}" readonly="readonly">
                                </div>
                                <div class="px-1 text-left" style="width: 10%;">
                                    <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_4->nova_conta ?? 'conta' }}" readonly="readonly">
                                </div>
                                <div class="px-1" style="width: 3%;">
                                    <button type="button" class="btn btn-block btn-success btn-sm" wire:click='criar({{ $nivel_4->id }})"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <div class="px-1" style="width: 3%;">
                                    @if($nivel_4->sasjiqelrhwkejs->count() == 0)
                                    <button type="button" class="btn btn-block btn-danger btn-sm" wire:click="delete({{ $nivel_4->id }})"><i class="fa-solid fa-trash-can"></i></button>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
                <hr>
            @endforeach
        </div>
    </div>
    --}}
    @if($modal_criar)
	<div class="modal fade show" aria-hidden="true" style="display: block;">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Criar nova conta</h3>
					<button type="button" class="close" wire:click="fechar_modal(false)" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Conta pai</label>
                                <input type="text" class="form-control form-control-sm" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Título</label>
                                <input type="text" class="form-control form-control-sm" wire:model="titulo">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Nível</label>
                                <input type="text" class="form-control form-control-sm" wire:model="nivel" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Imprime</label>
                                <select class="form-control form-control-sm" wire:model="imprime">
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Soma</label>
                                <select class="form-control form-control-sm" wire:model="soma">
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
             	</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-warning" wire:click="fechar_modal(false)">Cancelar</button>
					<button type="button" class="btn btn-primary" wire:click="store">Gravar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show"></div>
	@endif

    @if($modal_editar)
	<div class="modal fade show" aria-hidden="true" style="display: block;">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Editar forma de pagamento</h3>
					<button type="button" class="close" wire:click="fechar_modal(false)" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Forma</label>
                                <input type="text" class="form-control form-control-sm" wire:model="forma" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Tipo</label>
                                <input type="text" class="form-control form-control-sm" wire:model="tipo" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Bandeira</label>
                                <input type="text" class="form-control form-control-sm" wire:model="bandeira" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Parcela</label>
                                <input type="text" class="form-control form-control-sm" wire:model="parcela" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Taxa</label>
                                <input type="text" class="form-control form-control-sm" wire:model="taxa">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Prazo</label>
                                <input type="text" class="form-control form-control-sm" wire:model="prazo" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Primeiro Vencimento</label>
                                <input type="text" class="form-control form-control-sm" wire:model="pri_vcto" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Recebimento</label>
                                <input type="text" class="form-control form-control-sm" wire:model="recebimento" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Local</label>
                                <input type="text" class="form-control form-control-sm" wire:model="local" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Conferir</label>
                                <input type="text" class="form-control form-control-sm" wire:model="conferir" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Destino</label>
                                <input type="text" class="form-control form-control-sm" wire:model="destino" readonly="readonly">
                            </div>
                        </div>
                        
                        <!-- <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Imprime</label>
                                <select class="form-control form-control-sm" wire:model="imprime">
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
             	</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-warning" wire:click="fechar_modal(false)">Cancelar</button>
					<button type="button" class="btn btn-primary" wire:click="store">Gravar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show"></div>
	@endif
</div>
