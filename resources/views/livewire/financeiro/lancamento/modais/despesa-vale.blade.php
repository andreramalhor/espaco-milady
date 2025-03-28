<div>
	@if($modal_despesa_vale)
	<div class="modal fade show" aria-modal="true" role="dialog" style="display: block;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-navy">
					<h5 class="modal-title">Vale / Adiantamento</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
							<div class="form-group">
								<label>Colaborador:</label>
								<select class="form-control form-control-sm" wire:model.live="despesa_vale_colaborador">
									<option value="">Selecione o Colaborador . . .</option>
									@foreach($colaboradores as $colaborador)
									<option value="{{ $colaborador->id }}">{{ $colaborador->nome }}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
							<div class='form-group'>
								<label>Descrição</label>
								<input type='text' class='form-control form-control-sm' wire:model.live="despesa_vale_descricao">
							</div>
						</div>
						
						<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
							<label>Valor</label>
							<input type="text" class="form-control form-control-sm text-right" wire:model.live="despesa_vale_valor" placeholder="0,00" x-mask:dynamic="$money($input, ',', '.', 2)">
						</div>
					</div>					
				</div>
				
				<div class="modal-footer justify-content-between">
					<a class="btn btn-default" wire:click="toggle_modal">Cancelar</a>
					<a class="btn btn-primary 
					@if($despesa_vale_colaborador != "" && $despesa_vale_valor != '' && $despesa_vale_valor != 0)
					''
					@else
					disabled
					@endif
					" wire:click="despesa_vale_concluir">Efetivar</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show"></div>
	@endif	
</div>
