<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="overlay d-none" wire:loading.class.remove="d-none">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>
			<div class="card-header">
				<h3 class="card-title">Informações da venda</h3>
				<div class="card-tools">
					<div class="btn-group btn-group-toggle" data-bs-toggle="buttons">
						<button type="button" class="btn btn-xs btn-secondary {{ !$detalhado ? 'active' : '' }}" wire:click="formulario_detalhado( true )">Simplificado</button>
						<button type="button" class="btn btn-xs btn-secondary {{ $detalhado ? 'active' : '' }}" wire:click="formulario_detalhado( false )">Detalhado</button>
					</div>
					
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<h5>
						INFORMAÇÕES DO LANÇAMENTO
					</h5>
					{{--
					<x-atendimento.pessoa.pessoas-select col="3" name="id_pessoa" selecionado="" label="Pessoa" />
					--}}

					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Pessoa</label>{{-- select2 --}}
							<select class="form-control form-control-sm select2" x-init="$($el).on('change', function () { $wire.set('id_pessoa', $el.value ); });" wire:model.live="id_pessoa">
								<option value="">Selecione a pessoa</option>
								@foreach(\App\Models\Atendimento\Pessoa::orderBy('nome')->get() as $ciclo )
								<option value="{{ $ciclo->id }}">{{ $ciclo->nome }}</option>
								@endforeach
							</select>
						</div>
					</div>

					{{--
					<div class="col-sm-2">
						<div class="form-group">
							<label>Tipo</label>
							<select class="form-control form-control-sm" x-init="$($el).on('change', function () { $wire.set('tipo', $el.value ); });" wire:model.live="tipo">
							<select class="form-control form-control-sm" wire:model="tipo">
								<option value="R">Receita</option>
								<option value="D">Despesa</option>
								<!-- <option value="T" disabled>Transferência</option> -->
							</select>
						</div>
					</div>
					--}}
					
					{{--
					<div class="col-sm-2">
						<div class="form-group">
							<label>Data de competência</label>
							<input type="date" class="form-control form-control-sm" wire:model="dt_competencia">
						</div>
					</div>
					--}}
					
					<div class="col-sm-2">
						<div class="form-group">
							<label>Data de vencimento</label>
							<input type="date" class="form-control form-control-sm" wire:model="dt_vencimento">
						</div>
					</div>

					@if($detalhado)
					<div class="col-sm-1">
						<div class="form-group">
							<label>Núm. Doc.</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model="num_documento" placeholder="Núm. Documento">
						</div>
					</div>
					@endif

					<div class="col-sm-5">
						<div class="form-group">
							<label>Descrição</label>
							<input type="text" class="form-control form-control-sm" wire:model.live="informacao" placeholder="Descrição">
						</div>
					</div>

					<div class="col-sm-1">
						<div class="form-group">
							<label>Valor</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_bruto" placeholder="0,00">
						</div>
					</div>

					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Banco/Local</label>{{-- select2 --}}
							<select class="form-control form-control-sm {{ isset($caixa) ? '' : 'select2 ' }}" x-init="$($el).on('change', function () { $wire.set('id_banco', $el.value ); });" wire:model.live="id_banco" {{ isset($caixa) ? 'readonly="readonly"' : '' }}>
								<option value="">Selecione o Banco/Local</option>
								@foreach(\App\Models\Financeiro\Banco::orderBy('nome')->get() as $ciclo )
								<option value="{{ $ciclo->id }}">{{ $ciclo->id }} - {{ $ciclo->nome }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-sm-1">
						<div class="form-group">
							<label>Caixa</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model="id_caixa" readonly="readonly">
						</div>
					</div>

					{{--
						<x-contabilidade.planoconta.planocontas-select col="3" name="id_conta" selecionado="" label="Conta Contábil" />
					--}}
					
					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Conta Contábil</label>{{-- select2 --}}
							<select class="form-control form-control-sm select2" x-init="$($el).on('change', function () { $wire.set('id_conta', $el.value ); });" wire:model.live="id_conta">
								<option value="">Selecione a conta</option>
								@foreach(\App\Models\Contabilidade\ContaContabil::orderBy('id')->get() as $ciclo )
								<option value="{{ $ciclo->id }}">{{ $ciclo->titulo }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Centro de custo</label>{{-- select2 --}}
							<select class="form-control form-control-sm select2" x-init="$($el).on('change', function () { $wire.set('centro_custo', $el.value ); });" wire:model.live="centro_custo">
								<option value="">Geral</option>
								<option>Centro de custo 1</option>
								<option>Centro de custo 2</option>
								<option>Centro de custo 3</option>
							</select>
						</div>
					</div>





					<hr>
					<br>
					<br>
					<br>

					
					<h5>
						CONDIÇÃO DE PAGAMENTO 
					</h5>


					<div class="col-sm-1">
						<div class="form-group">
						<label>Pago</label>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="foi_pago" wire:model.live="foi_pago" wire:change="foiPago( event.target.checked )">
							</div>
						</div>
					</div>

					<div class="col-sm-1">
						<div class="form-group">
							<label>Qtd Parcelas</label>
							<input type="number" class="form-control form-control-sm" min="1" wire:model.live="total_parcelas">
						</div>
					</div>
					{{--
					<x-financeiro.banco.bancos-select col="3" name="id_banco" selecionado="" label="Banco/Local" />
					--}}

					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Banco/Local</label>{{-- select2 --}}
							<select class="form-control form-control-sm select2 {{ isset($caixa) ? $caixa->id_banco : '' }}" x-init="$($el).on('change', function () { $wire.set('id_banco', $el.value ); });" wire:model.live="id_banco">
								<option value="">Selecione o Banco/Local</option>
								@foreach(\App\Models\Financeiro\Banco::orderBy('nome')->get() as $ciclo )
								<option value="{{ $ciclo->id }}">{{ $ciclo->nome }}</option>
								@endforeach
							</select>
						</div>
					</div>



					<div class="col-sm-2">
						<div class="form-group">
							<label>Data de recebimento</label>
							<input type="date" class="form-control form-control-sm" wire:model="dt_recebimento">
						</div>
					</div>

					<div class="col-sm-2">
						<div class="form-group">
							<label>Data de confirmação</label>
							<input type="date" class="form-control form-control-sm" wire:model="dt_confirmacao">
						</div>
					</div>

					<div class="col-sm-2">
						<div class="form-group">
							<label>Data de pagamento</label>
							<input type="date" class="form-control form-control-sm" wire:model="dt_pagamento">
						</div>
					</div>






					<div class="col-sm-1">
						<div class="form-group">
							<label>Desc./Acrésc.</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_dsc_acr" placeholder="0,00">
						</div>
					</div>

					<div class="col-sm-1">
						<div class="form-group">
							<label>Valor Pago</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_final" placeholder="0,00">
						</div>
					</div>


					{{-- <x-gerenciamento.formapagamento.formas-select col="3" name="id_forma_pagamento" selecionado="" label="Forma de pagamento" /> --}}
					<x-financeiro.banco.formas-select class="select2" col="3" name="id_forma_pagamento" selecionado="" label="Forma de pagamento" x-init="$($el).on('change', function () { $wire.set('id_forma_pagamento', $el.value ); });" />

					<div class="col-sm-1">
						<div class="form-group">
							<label>Parcela</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model="parcela">
						</div>
					</div>

					<div class="col-sm-2">
						<div class="form-group">
							<label>Status</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model="status" placeholder="status">
						</div>
					</div>



					<hr>
					<div class="row">
					<div class="px-1" style="width: 20%;">
						<label clas="mb-0">Forma de Pagamento</label>
					</div>
					<div class="px-1" style="width: 15%;">
						<label clas="mb-0">Bandeira</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label clas="mb-0">Parcela</label>
					</div>
					<div class="px-1" style="width: 15%;">
						<label clas="mb-0">Data prevista</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label clas="mb-0">Valor</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label clas="mb-0">Taxa</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label clas="mb-0">Vlr. Recebido</label>
					</div>
					<div class="px-1" style="width: 4.5%;">
						<label clas="mb-0">&nbsp;</label>
					</div>
				</div>
				@php($i = 0)
				@for ($total_parcelas; $i < $total_parcelas; $i++)
				<div class="row pb-1">
					<div class="px-1" style="width: 20%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $total_parcelas ?? 'id_formma_pagamento' }}" readonly="readonly">
					</div>

					<div class="px-1" style="width: 15%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $total_parcelas ?? '$total_parcelas' }}" readonly="readonly">
					</div>

					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ $i + 1 }}/{{ $total_parcelas }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 15%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{-- \Carbon\Carbon::parse($total_parcelas ?? null)->format('d/m/Y') --}}" readonly="readonly">
					</div>

					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($total_parcelas ?? 0, 2, ',', '.') }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($total_parcelas ?? 0, 2, ',', '.') }}%" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($total_parcelas, 2, ',', '.') }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 4%;">
						<button type="button" class="btn btn-block btn-danger btn-sm text-center" wire:click="deletar_pagamento('{{ $total_parcelas }}', '{{ $total_parcelas }}')"><i class="fa-solid fa-trash-can"></i></button>
					</div>
				</div>
				@endfor
				</div>
			</div>
		</div>
	</div>
</div>
