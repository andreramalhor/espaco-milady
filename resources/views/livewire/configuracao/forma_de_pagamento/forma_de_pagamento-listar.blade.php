<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formas de pagamentos</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <span class="">
                    <a class="btn btn-app @if('Dinheiro' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Dinheiro')">
                        <i class="fas fa-money-bill-wave"></i>
                        Dinheiro
                    </a>
                    
                    <a class="btn btn-app @if('Cartão de Débito' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Cartão de Débito')">
                        <i class="fas fa-credit-card"></i>
                        Cartão de Débito
                    </a>
                    
                    <a class="btn btn-app @if('Cartão de Crédito' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Cartão de Crédito')">
                        <i class="far fa-credit-card"></i>
                        Cartão de Crédito
                    </a>
                    
                    <a class="btn btn-app @if('Cheque' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Cheque')">
                        <i class="fas fa-money-check-dollar"></i>
                        Cheque
                    </a>
                    
                    <a class="btn btn-app @if('Depósito' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Depósito')">
                        <i class="fas fa-cash-register"></i>
                        Depósito
                    </a>
                    
                    <a class="btn btn-app @if('Fiado' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Fiado')">
                        <i class="fas fa-vault"></i>
                        Fiado
                    </a>
                    
                    <a class="btn btn-app @if('Crédito Interno' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Crédito Interno')">
                        <i class="fas fa-file-invoice"></i>
                        Crédito Interno
                    </a>
                    
                    <a class="btn btn-app @if('Pix' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Pix')">
                        <i class="fas fa-comment-dollar"></i>
                        Pix
                    </a>
                    
                    <a class="btn btn-app @if('Boleto' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Boleto')">
                        <i class="fas fa-money-check"></i>
                        Boleto
                    </a>
                    
                    <a class="btn btn-app @if('Descontado de outra forma' == $forma_selecionada) bg-primary @endif" wire:click="selecionar_forma('Descontado de outra forma')">
                        <i class="fas fa-cash-register"></i>
                        Descontado de outra forma
                    </a>

                    <a class="btn btn-app" wire:click="criar()">
                        modal_criar
                    </a>
                </span>
            </div>
            @switch($forma_selecionada)
                @case('Dinheiro')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p>Dinheiro é uma forma de pagamento imutável</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @break
                
                @case('Cartão de Débito')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card" wire:click="criar('Cartão de Débito')" style="pointer-events: auto !important;">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <i class="fas fa-plus fa-3x"></i>
                                    </div>
                                    <p class="text-muted text-center">Adicioanar Novo</p>                                    
                                </div>
                            </div>
                        </div>
                        @foreach($forma_de_pagamento->groupBy('bandeira') as $bandeira => $pagamentos)
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header p-2">
                                    {{ $bandeira }}
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="text-left"><small>Parcela</small></th>
                                                <th class="text-center"><small>Prazo</small></th>
                                                <th class="text-center"><small>Taxa</small></th>
                                                <th class="text-center"><small></small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pagamentos as $pagamento)
                                            <tr>
                                                <td class="text-center px-1"><small>{{ $pagamento->parcela }}</small></td>
                                                <td class="text-center px-1"><small>{{ $pagamento->prazo }} dia(s)</small></td>
                                                <td class="text-center px-1"><small>{{ number_format($pagamento->taxa, 2, ',', '.') }}%</small></td>
                                                <td class="text-center px-1"><button type="button" class="btn btn-default btn-xs" wire:click="editar('{{ $pagamento->id }}')"><i class="fas fa-edit"></i></button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @break
                
                @case('Cartão de Crédito')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card" wire:click="criar('Cartão de Crédito')" style="pointer-events: auto !important;">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <i class="fas fa-plus fa-3x"></i>
                                    </div>
                                    <p class="text-muted text-center">Adicioanar Novo</p>                                    
                                </div>
                            </div>
                        </div>
                        @foreach($forma_de_pagamento->groupBy('bandeira') as $bandeira => $pagamentos)
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header p-2">
                                    {{ $bandeira }}
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="text-left"><small>Parcela</small></th>
                                                <th class="text-center"><small>Prazo</small></th>
                                                <th class="text-center"><small>Taxa</small></th>
                                                <th class="text-center"><small></small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pagamentos as $pagamento)
                                            <tr>
                                                <td class="text-center px-1"><small>{{ $pagamento->parcela }}</small></td>
                                                <td class="text-center px-1"><small>{{ $pagamento->prazo }} dia(s)</small></td>
                                                <td class="text-center px-1"><small>{{ number_format($pagamento->taxa, 2, ',', '.') }}%</small></td>
                                                <td class="text-center px-1"><button type="button" class="btn btn-default btn-xs" wire:click="editar('{{ $pagamento->id }}')"><i class="fas fa-edit"></i></button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @break
                
                @case('Cheque')
                    <hr>

                    @dump('Cheque')
                    @dump($forma_de_pagamento->toArray())
                    @break
                
                @case('Depósito')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card" wire:click="criar" style="pointer-events: auto !important;">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <i class="fas fa-plus fa-3x"></i>
                                    </div>
                                    <p class="text-muted text-center">Adicioanar Novo</p>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    @dump('Depósito')
                    @dump($forma_de_pagamento->toArray())
                    @break
                
                @case('Fiado')
                    <hr>

                    @dump('Fiado')
                    @dump($forma_de_pagamento->toArray())
                    @break
                
                @case('Crédito Interno')
                    <hr>

                    @dump('Crédito Interno')
                    @dump($forma_de_pagamento->toArray())
                    @break
                
                @case('Pix')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card" wire:click="criar" style="pointer-events: auto !important;">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <i class="fas fa-plus fa-3x"></i>
                                    </div>
                                    <p class="text-muted text-center">Adicioanar Novo</p>                                    
                                </div>
                            </div>
                        </div>
                        @foreach($forma_de_pagamento->groupBy('bandeira') as $bandeira => $pagamentos)
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header p-2">
                                    {{ $bandeira }}
                                </div>
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="text-left"><small>Parcela</small></th>
                                                <th class="text-center"><small>Prazo</small></th>
                                                <th class="text-center"><small>Taxa</small></th>
                                                <th class="text-center"><small></small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pagamentos as $pagamento)
                                            <tr>
                                                <td class="text-center px-1"><small>{{ $pagamento->parcela }}</small></td>
                                                <td class="text-center px-1"><small>{{ $pagamento->prazo }} dia(s)</small></td>
                                                <td class="text-center px-1"><small>{{ number_format($pagamento->taxa, 2, ',', '.') }}%</small></td>
                                                <td class="text-center px-1"><button type="button" class="btn btn-default btn-xs" wire:click="editar('{{ $pagamento->id }}')"><i class="fas fa-edit"></i></button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @break
                
                @case('Boleto')
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card" wire:click="criar" style="pointer-events: auto !important;">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <i class="fas fa-plus fa-3x"></i>
                                    </div>
                                    <p class="text-muted text-center">Adicioanar Novo</p>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    @dump('Boleto')
                    @dump($forma_de_pagamento->toArray())
                    @break
                
                @case('Descontado de outra forma')
                    <hr>

                    @dump('Descontado de outra forma')
                    @dump($forma_de_pagamento->toArray())
                    @break
                
            @endswitch
        </div>    
    </div>
    
    @if($modal_criar_credito)
    <div class="modal fade show" aria-hidden="true" style="display: block;">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Criar novo pagamento de cartão de crédito</h3>
					<button type="button" class="close" wire:click="fechar_modal(false)" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
                        <div class="col-6">
                            <dl>
                                <input type="hidden" wire:model.live="forma"       value="{{ $forma_de_pagamento->first()->forma }}">
                                <input type="hidden" wire:model.live="tipo"        value="{{ $forma_de_pagamento->first()->tipo }}">
                                <input type="hidden" wire:model.live="recebimento" value="{{ $forma_de_pagamento->first()->recebimento }}">
                                <input type="hidden" wire:model.live="local"       value="{{ $forma_de_pagamento->first()->local }}">
                                <input type="hidden" wire:model.live="conferir"    value="{{ $forma_de_pagamento->first()->conferir }}">
                                <input type="hidden" wire:model.live="destino"     value="{{ $forma_de_pagamento->first()->destino }}">
                                <input type="hidden" wire:model.live="id_banco"    value="{{ $forma_de_pagamento->first()->id_banco }}">
                                
                                <dt>Bandeira</dt>
                                <dd class="mb-0">
                                    <input type="text" class="form-control form-control-sm" wire:model.live="bandeira">
                                </dd>
                            </dl>
                        </div>
                        <div class="col-6">
                            <table class="table table-bordered text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Parcela</th>
                                        <th>Taxa</th>
                                        <th>Prazo</th>
                                        <th>Primeiro<br>Vencimento</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    @foreach($mais_parcelas as $parc => $cada_parcela)
                                    <tr>
                                        <td class="text-center p-0">{{ $parc + 1 }}</td>
                                        <td class="text-center p-0">
                                            <input type="text" class="form-control form-control-sm" wire:model.live="mais_parcelas.{{ $parc }}.taxa" x-mask:dynamic="$money($input, ',', '.', 2)">
                                        </td>
                                        <td class="text-center p-0">
                                            <input type="text" class="form-control form-control-sm" wire:model.live="mais_parcelas.{{ $parc }}.prazo" x-mask="99">
                                        </td>
                                        <td class="text-center p-0">
                                            <input type="text" class="form-control form-control-sm" wire:model.live="mais_parcelas.{{ $parc }}.pri_vcto" x-mask="99">
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4">
                                            <button class="btn btn-sm btn-primary" wire:click="adicionar_parcela">
                                                Adicionar + parcela
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
             	</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-warning" wire:click="fechar_modal(false)">Cancelar</button>
					<button type="button" class="btn btn-primary" wire:click="gravar_cartao_de_credito">Gravar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show"></div>
    @endif

    
    @if($modal_criar_unico)
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
                                <input type="text" class="form-control form-control-sm" wire:model.live="titulo">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Nível</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="nivel" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Imprime</label>
                                <select class="form-control form-control-sm" wire:model.live="imprime">
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Soma</label>
                                <select class="form-control form-control-sm" wire:model.live="soma">
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
                                <input type="text" class="form-control form-control-sm" wire:model.live="forma" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Tipo</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="tipo" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Bandeira</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="bandeira" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Parcela</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="parcela" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Taxa</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="taxa">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Prazo</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="prazo" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Primeiro Vencimento</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="pri_vcto" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Recebimento</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="recebimento" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Local</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="local" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Conferir</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="conferir" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Destino</label>
                                <input type="text" class="form-control form-control-sm" wire:model.live="destino" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Banco</label>
                                <select class="form-control form-control-sm" wire:model.live="id_banco">
                                    @foreach(\App\Models\Financeiro\Banco::orderBy('nome', 'asc')->get() as $ciclo)
                                        <option value="{{ $ciclo->id }}">{{ $ciclo->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <!-- <div class="col-1">
                            <div class="form-group">
                                <label for="col-form-label pt-0">Imprime</label>
                                <select class="form-control form-control-sm" wire:model.live="imprime">
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
