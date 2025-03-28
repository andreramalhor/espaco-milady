<div>
	@if($modal_transferencia)
	<div class="modal fade show" aria-modal="true" role="dialog" style="display: block;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-navy">
					<h5 class="modal-title">Realizar Transferência</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<div class="form-group">
								<label>De:</label>
								<select class="form-control form-control-sm" wire:model.live="transferencia_origem_banco">
									<option value="">Selecione a origem . . .</option>
									@foreach($bancos as $banco)
									<option value="{{ $banco->id }}">{{ $banco->nome }}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						@if(isset($transferencia_origem_banco) && isset($bancos->find($transferencia_origem_banco)->iesbdkwdkadqfgh))
						<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
							<div class="form-group">
								<label>Cx:</label>
								<select class="form-control form-control-sm" wire:model.live="transferencia_origem_caixa">
									@if($bancos->find($transferencia_origem_banco)->iesbdkwdkadqfgh()->where('status', '=', 'Aberto')->count() > 0)
										@foreach ( $bancos->find($transferencia_origem_banco)->iesbdkwdkadqfgh()->where('status', '=', 'Aberto')->get() as $caixas_origem )
											<option
											@if($bancos->find($transferencia_origem_banco)->iesbdkwdkadqfgh()->where('status', '=', 'Aberto')->first()->id == $caixas_origem->id)
												selected
											@endif
											>{{ $caixas_origem->id }}</option>
										@endforeach
									@endif
									<option value="">-</option>
								</select>
							</div>
						</div>
						@endif

						@if($transferencia_origem_banco != "")
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<div class="form-group">
								<label>Para:</label>
								<select class="form-control form-control-sm" wire:model.live="transferencia_destino_banco">
									<option value="">Selecione o destino . . .</option>
									@foreach($bancos as $banco)
									@if($banco->id != $transferencia_origem_banco)
									<option value="{{ $banco->id }}">{{ $banco->nome }}</option>
									@endif
									@endforeach
								</select>
							</div>
						</div>

							@if(isset($transferencia_destino_banco) && isset($bancos->find($transferencia_destino_banco)->iesbdkwdkadqfgh))
							<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
								<div class="form-group">
									<label>Cx:</label>
									<select class="form-control form-control-sm" wire:model.live="transferencia_destino_caixa">
										@if($bancos->find($transferencia_destino_banco)->iesbdkwdkadqfgh()->where('status', '=', 'Aberto')->count() > 0)
											@foreach ( $bancos->find($transferencia_destino_banco)->iesbdkwdkadqfgh()->where('status', '=', 'Aberto')->get() as $caixas_destino )
												<option
												@if($bancos->find($transferencia_destino_banco)->iesbdkwdkadqfgh()->where('status', '=', 'Aberto')->first()->id == $caixas_destino->id)
												selected
												@endif
												>{{ $caixas_destino->id }}</option>
											@endforeach
										@endif
										<option value="">-</option>
									</select>

								</div>
							</div>
							@endif
						
						@endif
					
					</div>

					<div class="row">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							@if( $transferencia_origem_banco != "" )
							<label for="valor">Valor a ser transferido <small>( Saldo: {{ number_format($bancos->find($transferencia_origem_banco)->saldo_atual, 2, ',', '.') }} )</small></label>
							@else
							<label for="valor">Valor a ser transferido</label>
							@endif
							<input type="text" class="form-control form-control-sm text-right" wire:model.live="transferencia_valor" placeholder="0,00" x-mask:dynamic="$money($input, ',', '.', 2)">
						</div>
					</div>
				</div>

				<div class="modal-footer justify-content-between">
					<a class="btn btn-default" wire:click="toggle_modal">Cancelar</a>
					<a class="btn btn-primary 
					@if($transferencia_origem_banco != "" && $transferencia_destino_banco != '' && $transferencia_valor != '' && $transferencia_valor != 0)
					''
					@else
					disabled
					@endif

					" wire:click="transferencia_concluir">Efetivar</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show"></div>
	@endif	
</div>
