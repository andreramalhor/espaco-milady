<div class="row">
	<div class="col-sm-12">
		<div class="card card-danger">
			<div class="overlay d-none" wire:loading.class.remove="d-none">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>
			<div class="card-header">
				<h3 class="card-title">Lançar DESPESA</h3>
				<div class="card-tools">
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

					<div class="col-sm-5">
						<div class="form-group">
							<label>Descrição</label>
							<input type="text" class="form-control form-control-sm" wire:model="informacao" placeholder="Descrição">
						</div>
					</div>
					
					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Conta Contábil <small><b>(Categoria)</b></small></label>
							<select class="form-control form-control-sm" wire:model.live="id_conta">
							{{--
								<select class="form-control form-control-sm select2" x-init="$($el).on('change', function () { $wire.set('id_conta', $el.value ); });" wire:model.live="id_conta">
							--}}
							<option value="">Selecione a conta</option>
							@php
								function construitSelectOption($conta, $level = 0)
								{
									$options = [];

									if ($conta->sasjiqelrhwkejs->isEmpty())
									{
										$options[] = '<option value="' . $conta->id . '">' . str_repeat('-', $level) . ' ' . $conta->titulo . '</option>';
									}
									else
									{
										$options[] = '<optgroup label="' . $conta->titulo . '">';
										foreach ($conta->sasjiqelrhwkejs as $child)
										{
											$options[] = construitSelectOption($child, $level + 1);
										}
										$options[] = '</optgroup>';
									}

									return implode('', $options);
								}
							@endphp

							{!! construitSelectOption($contaRaiz, 0) !!} 
						</select>
						</div>
					</div>
					
					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Banco/Local</label>
							<select class="form-control form-control-sm {{ isset($id_caixa) ? '' : 'select2 ' }}" x-init="$($el).on('change', function () { $wire.set('id_banco', $el.value ); });" wire:model.live="id_banco" {{ isset($id_caixa) ? 'readonly="readonly"' : '' }}>
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


					<div class="col-sm-3" wire:ignore>
						<div class="form-group">
							<label>Pessoa</label>
							<select class="form-control form-control-sm select2" x-init="$($el).on('change', function () { $wire.set('id_pessoa', $el.value ); });" wire:model.live="id_pessoa">
								<option value="">Selecione a pessoa</option>
								@foreach(\App\Models\Atendimento\Pessoa::orderBy('nome')->get() as $ciclo )
								<option value="{{ $ciclo->id }}">{{ $ciclo->nome }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<input type="hidden" wire:model.live="parcela" value="01/01">

					<div class="col-sm-2">
						<div class="form-group">
							<label>Data de vencimento</label>
							<input type="date" class="form-control form-control-sm" wire:model="dt_vencimento">
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="form-group">
							<label>Data de pagamento</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<input type="checkbox" wire:model.live="dt_quitacao_controle" wire:click="controle">
									</span>
								</div>
								<input type="date" class="form-control form-control-sm" wire:model="dt_quitacao" {{ $dt_quitacao_controle ? '' : 'readonly' }}>
							</div>
						</div>
					</div>

					<div class="col-sm-1">
						<div class="form-group">
							<label>Valor</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model.live="vlr_final" x-mask:dynamic="$money($input, ',', '.', 2)">
						</div>
					</div>

					<div class="col-sm-1">
						<div class="form-group">
							<label>Status</label>
							<select class="form-control form-control-sm" wire:model.live="status" readonly="readonly">
								<option value="Em aberto">Em aberto</option>
								<option value="Concluído">Concluído</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="reset" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn btn-info float-right {{ isset($valor) ? 'disabled' : '' }}" wire:click="criar">Lançar</button>
			</div>
		</div>
	</div>
</div>
