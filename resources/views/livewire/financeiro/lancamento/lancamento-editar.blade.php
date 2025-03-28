<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="edit">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
			<div class="card-header">
				<h3 class="card-title">Informações da venda: {{ $comanda->id }}</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<div class="row">
							<div class="px-1" style="width: 10%;">
								<div class="form-group">
									<label for="col-form-label p-1">#</label>
									<input type="text" class="form-control form-control-sm" value="{{ $comanda->id_cliente ?? '' }}" readonly="readonly">
								</div>
							</div>
							<div class="px-1" style="width: 55%;">
								<div class="form-group">
									<label for="col-form-label p-1">Nome do Cliente</label>
									<select class="form-control form-control-sm" wire:model.live="id_cliente" wire:change="cliente_selecionado( $event.target.value )">
										<option value="0">( Cliente sem cadastro )</option>
										@foreach(\App\Models\Atendimento\Pessoa::orderBy('nome', 'asc')->get() as $cliente)
										<option {{ $comanda->id_cliente == $cliente->id ? 'selected' : '' }} value="{{ $cliente->id }}">{{ $cliente->nomes }}</option>
										@endforeach
									</select>
									<span class="pl-1 px-0 small">{{ $feedback_cliente ?? '' }}</span>
								</div>
							</div>
							<div class="px-1" style="width: 18%;">
								<div class="form-group">
									<label for="col-form-label p-1 text-center">CPF</label>
									<input type="text" class="form-control form-control-sm text-center" value="{{ $comanda->lufqzahwwexkxli->cpf ?? '' }}" readonly="readonly">
								</div>
							</div>
							<div class="px-1" style="width: 15%;">
								@if($agendamentos->count() > 0)
								<div class="form-group">
									<label clas="mb-0">&nbsp;</label>
									<a class="btn btn-block btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-lg"><small>Agendamentos</small></a>
								</div>
								@endif
							</div>
						</div>
					</div>
					<div class="col-3">
					</div>
					<div class="col-3">
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label for="col-form-label p-1">Valor Itens</label>
									<input type="text" class="form-control form-control-sm text-right" value="{{ $cmd_valor_total }}" readonly="readonly">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="col-form-label p-1">Pagamentos</label>
									<input type="text" class="form-control form-control-sm text-right" value="{{ $cmd_valor_pago }}" readonly="readonly">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="col-form-label p-1">Restante</label>
									<input type="text" class="form-control form-control-sm text-right" value="{{ $cmd_valor_restante }}" readonly="readonly">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h3 class="modal-title">Agendamentos</h3>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<table class="table table-sm">
										<thead>
											<tr>
												<th>#</th>
												<th>Data</th>
												<th>Horário</th>
												<th>Profissional</th>
												<th>Serviço</th>
												<th>Obs</th>
												<th>Status</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											@forelse($agendamentos as $agendamento)
											<tr>
												<td>{{ $agendamento->id }}</td>
												<td>{{ \Carbon\Carbon::parse($agendamento->start)->format('d/m/Y') }}</td>
												<td>{{ \Carbon\Carbon::parse($agendamento->start)->format('h:i') }} às {{ \Carbon\Carbon::parse($agendamento->end)->format('h:i') }}</td>
												<td>{{ $agendamento->hhmaqpijffgfhmj->apelido ?? $agendamento->id_profexec }}</td>
												<td>{{ $agendamento->zlpekczgsltqgwg->nome ?? $agendamento->id_servprod }}</td>
												<td>{{ $agendamento->obs }}</td>
												<td>
													@if(!$adicionando[$agendamento->id])
													<span class="badge bg-{{ $agendamento->badge }}">{{ $agendamento->status }}</span>
													@else
													<span class="badge bg-primary">Adicionando</span>
													@endif
												</td>
												<td>
													@if(in_array(true, $this->adicionando) && $adicionando[$agendamento->id])
													<button type="button" class="btn btn-block btn-warning btn-sm" data-bs-dismiss="modal" wire:click="cancelar_agendamento({{ $agendamento->id }})"><i class="fa-solid fa-xmark"></i></button>
													@endif
													@if(!in_array(true, $this->adicionando) && !$adicionando[$agendamento->id])
													@if($agendamento->status == 'Agendado' || $agendamento->status == 'Confirmado')
													<button type="button" class="btn btn-block btn-primary btn-sm text-center" data-bs-dismiss="modal" wire:click="lancar_agendamento({{ $agendamento->id }})"><i class="fa-solid fa-circle-plus"></i></button></td>
													@endif
													@endif
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="8" class="text-center">Não há agendamentos na data de hoje.</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-bs-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="card-footer text-center">
				<a href="javascript:">View All Users</a>
			</div>	 -->
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="edit">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
			<div class="card-header">
				<h3 class="card-title">Itens da comanda</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="px-1" style="width: 25%;">
						<label clas="mb-0">Serviço</label>
					</div>
					<div class="px-1" style="width: 4.5%;">
						<label clas="mb-0">Qtd</label>
					</div>
					<div class="px-1" style="width: 6%;">
						<label clas="mb-0">Valor Und.</label>
					</div>
					<div class="px-1" style="width: 6%;">
						<label clas="mb-0">Desc./Acrs.</label>
					</div>
					<div class="px-1" style="width: 6%;">
						<label clas="mb-0">Valor final</label>
					</div>
					<div class="px-1" style="width: 20%;">
						<label clas="mb-0">Profissional</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label clas="mb-0">Tipo de Comissão</label>
					</div>
					<div class="px-1" style="width: 4.5%;">
						<label clas="mb-0">%</label>
					</div>
					<div class="px-1" style="width: 6%;">
						<label clas="mb-0">Comissão</label>
					</div>
					<div class="px-1" style="width: 4.5%;">
						<label clas="mb-0">&nbsp;</label>
					</div>
				</div>

				<form>
					<div class="row pb-1">
						<div class="px-1" style="width: 25%;">
							<select class="form-control form-control-sm" wire:model.live="id_servprod" wire:change="servico_selecionado( $event.target.value )">
								<option value="">Selecione o serviço . . .</option>
								@foreach(\App\Models\Catalogo\ServicoProduto::orderBy('nome', 'asc')->get() as $servico)
								<option {{ $id_servprod == $servico->id ? 'selected' : '' }} value="{{ $servico->id }}">{{ $servico->nome }}</option>
								@endforeach
							</select>
						</div>

						<div class="px-1" style="width: 4.5%;">
							<input type="number" class="form-control form-control-sm text-center" min="1" wire:model="quantidade" wire:change="atualizar_valor_final">
						</div>

						<div class="px-1" style="width: 6%;">
							<input type="text" class="form-control form-control-sm text-right" wire:change="atualizar_valor_final" 
							@if($tipo_preco == 'Preço variável')
							wire:model="vlr_negociado" 
							@elseif($tipo_preco == 'Preço Fixo')
							wire:model="vlr_venda" readonly="readonly"
							@else
							wire:model="vlr_negociado" readonly="readonly"
							@endif
							>
						</div>

						<div class="px-1" style="width: 6%;">
							<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_dsc_acr" wire:change="atualizar_valor_final">
						</div>

						<div class="px-1" style="width: 6%;">
							<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_final" readonly="readonly">
						</div>

						<div class="px-1" style="width: 20%;">
							<select class="form-control form-control-sm" wire:model.live="id_pessoa" wire:change="profissional_selecionado( $event.target.value , false )">
								@if($id_servprod == null)
								<option value="NULL">Selecione serviço / produto . . .</option>
								@endif
								@if($profissionals != null)
								<option value="NULL">Selecione . . .</option>
								@foreach($profissionals as $profissional)
								<option {{ $id_pessoa == $profissional->id_profexec ? 'selected' : '' }} value="{{ $profissional->id_profexec }}">{{ $profissional->dwsdjqwqwekowqe->apelido }} | ({{ $profissional->prc_comissao * 100 }} %)</option>
								@endforeach
								@endif
							</select>
						</div>

						<div class="px-1" style="width: 10%;">
							<a class="btn btn-block btn-secondary btn-sm" wire:click="atualizar_comissao('{{ $tipo_comissao }}')"><small>{{ str_replace('Comissão ', '', $tipo_comissao) }}</small></a>
						</div>

						<div class="px-1" style="width: 4.5%;">
							<input type="text" class="form-control form-control-sm text-center" wire:model.live="percentual" 
							@if($tipo_comissao != 'Comissão Manual')
							readonly="readonly"
							@endif
							>
						</div>

						<div class="px-1" style="width: 6%;">
							<input type="text" class="form-control form-control-sm text-right" wire:model.live="valor" 
							@if($tipo_comissao != 'Comissão Manual')
							readonly="readonly"
							@endif
							>
						</div>

						<div class="px-1" style="width: 4%;">
						@if($id_servprod != null || $id_servprod != '')
						<button type="button" class="btn btn-block btn-primary btn-sm" wire:click="adicionar_servprod()"><i class="fa-solid fa-floppy-disk"></i></button>
						@endif
						</div>
					</div>

				</form>
				<hr>

				@forelse($comanda->dfyejmfcrkolqjh as $detalhe)
				<div class="row pb-1">
					<div class="px-1" style="width: 25%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $detalhe->kcvkongmlqeklsl->nome ?? $detalhe->id_servprod }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 4.5%;">
						<input type="number" class="form-control form-control-sm text-center" value="{{ $detalhe->quantidade }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 6%;">
						<input type="text" class="form-control form-control-sm text-right" value="{{ number_format($detalhe->vlr_negociado, 2, ',', '.') }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 6%;">
						<input type="text" class="form-control form-control-sm text-right" value="{{ number_format($detalhe->vlr_dsc_acr, 2, ',', '.') }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 6%;">
						<input type="text" class="form-control form-control-sm text-right" value="{{ number_format($detalhe->vlr_final, 2, ',', '.') }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 20%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $detalhe->flielwjewjdasld->apelido ?? $detalhe->hgihnjekboyabez->id_pessoa ?? 'Sem profissioanl cadastrado' }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center text-xs" value="{{ str_replace('Comissão ', '', $detalhe->hgihnjekboyabez->tipo ?? '-' ) }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 4.5%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($detalhe->hgihnjekboyabez->percentual ?? 0, 1, ',', '.') }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 6%;">
						@if( !empty($detalhe->hgihnjekboyabez) && $detalhe->hgihnjekboyabez->status == 'Em aberto' )
						<input type="text" class="form-control form-control-sm text-right border border-warning" value="{{ number_format($detalhe->hgihnjekboyabez->valor ?? 0, 2, ',', '.') }}" readonly="readonly">
						@elseif( !empty($detalhe->hgihnjekboyabez) && $detalhe->hgihnjekboyabez->status == 'Pago')
						<input type="text" class="form-control form-control-sm text-right border border-success" value="{{ number_format($detalhe->hgihnjekboyabez->valor ?? 0, 2, ',', '.') }}" readonly="readonly">
						@else
						<input type="text" class="form-control form-control-sm text-right" value="{{ number_format($detalhe->hgihnjekboyabez->valor ?? 0, 2, ',', '.') }}" readonly="readonly">
						@endif
					</div>
					@if( empty($detalhe->hgihnjekboyabez) || $detalhe->hgihnjekboyabez->status == 'Em aberto' )
					<div class="px-1" style="width: 4%;">
						<button type="button" class="btn btn-block btn-danger btn-sm text-center" wire:click="deletar_detalhe({{ $detalhe->id }})"><i class="fa-solid fa-trash-can"></i></button>
					</div>
					@endif
				</div>
				@empty
				<div class="row pb-1">
					<div class="px-1" style="width: 100%;">
						<input type="text" class="form-control form-control-sm text-center" value="Não há itens lançados nesta comanda" readonly="readonly">
					</div>
				</div>
				@endforelse
			</div>
			<!-- <div class="card-footer text-center">
				<a href="javascript:">View All Users</a>
			</div> -->
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="overlay d-none" wire:loading.class.remove="d-none" wire:target="edit">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
			<div class="card-header">
				<h3 class="card-title">Informações de pagamento</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="px-1" style="width: 20%;">
						<label clas="mb-0">Forma de Pagamento</label>
					</div>
					@if(isset($opcoes_bandeiras) && $opcoes_bandeiras->count() > 1)
					<div class="px-1" style="width: 15%;">
						<label clas="mb-0">Bandeira</label>
					</div>
					@endif
					@if($pgto_proximo == 'parcela')
					<div class="px-1" style="width: 10%;">
						<label clas="mb-0">Parcelas</label>
					</div>
					@endif
					@if($pgto_tipo == 'Prazo' || $pgto_pri_vcto > 0)
					<div class="px-1" style="width: 15%;">
						<label clas="mb-0">1º Vencimento</label>
					</div>
					@endif
					<div class="px-1" style="width: 10%;">
						<label clas="mb-0">Valor</label>
					</div>
					<div class="px-1" style="width: 4.5%;">
						<label clas="mb-0">&nbsp;</label>
					</div>
				</div>
				<div class="row">
					<div class="px-1" style="width: 20%;">
						<select class="form-control form-control-sm" wire:model="pgto_forma" wire:change="selecionar_bandeiras()">
							@if($opcoes_formas != null)
							<option value="NULL">Selecione a forma de pagamento</option>
							@foreach($opcoes_formas as $forma)
							<option {{ $pgto_forma == $forma->forma ? 'selected' : '' }} value="{{ $forma->forma }}">{{ $forma->forma }}</option>
							@endforeach
							@endif
						</select>
					</div>

					@if(isset($opcoes_bandeiras) && $opcoes_bandeiras->count() > 1)
					<div class="px-1" style="width: 15%;">
						<select class="form-control form-control-sm" wire:model="pgto_bandeira" wire:change="selecionar_parcelas()">
							@if($opcoes_bandeiras == null)
							<option value="NULL">Selecione a forma de pagamento . . .</option>
							@endif
							@if($opcoes_bandeiras != null)
							<option value="NULL">Selecione . . .</option>
							@foreach($opcoes_bandeiras as $bandeira)
							<option value="{{ $bandeira->bandeira }}">{{ $bandeira->bandeira }}</option>
							@endforeach
							@endif
						</select>
					</div>
					@endif

					@if($pgto_proximo == 'parcela')
					<div class="px-1" style="width: 10%;">
						<select class="form-control form-control-sm" wire:model="pgto_parcela" wire:change="selecionar_forma()">
							@if($opcoes_parcelas == null)
							<option value="NULL">Selecione parcela . . .</option>
							@endif
							@if($opcoes_parcelas != null)
							<option value="NULL">Selecione . . .</option>
							@foreach($opcoes_parcelas as $parcela)
							<option value="{{ $parcela->parcela }}">{{ $parcela->parcela }}</option>
							@endforeach
							@endif
						</select>
					</div>
					@endif
					
					@if($pgto_tipo == 'Prazo' || $pgto_pri_vcto > 0)
					<div class="px-1" style="width: 15%;">
						<input type="date" class="form-control form-control-sm text-center" wire:model="pgto_pri_vcto" 
						@if($forma_pagamento->recebimento == 'Automático')
						readonly="readonly" 
						@endif
						>
					</div>
					@endif

					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-right" wire:model="cmd_valor_restante">
					</div>

					<div class="px-1" style="width: 4%;">
						@if($cmd_valor_restante != 0)
						<button type="button" class="btn btn-block btn-primary btn-sm text-center 
						@if(!isset($forma_pagamento) || $forma_pagamento->count() == 1)
						disabled
						@endif
						" wire:click="pagamento_selecionar()"><i class="fa-solid fa-arrow-alt-circle-down"></i></button>
						@endif
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
						<label clas="mb-0">Parcelas</label>
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
				@forelse($comanda->xzxfrjmgwpgsnta->sortBy('id') as $pagamento)
				<div class="row pb-1">
					<div class="px-1" style="width: 20%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $pagamento->qmbnkthuczqdsdn->forma ?? $pagamento->id_formma_pagamento }}" readonly="readonly">
					</div>

					<div class="px-1" style="width: 15%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $pagamento->qmbnkthuczqdsdn->bandeira ?? $pagamento->descricao }}" readonly="readonly">
					</div>

					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ $pagamento->parcela }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 15%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ \Carbon\Carbon::parse($pagamento->dt_prevista)->format('d/m/Y') }}" readonly="readonly">
					</div>

					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($pagamento->valor, 2, ',', '.') }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($pagamento->qmbnkthuczqdsdn->taxa, 2, ',', '.') }}%" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($pagamento->valor - ($pagamento->qmbnkthuczqdsdn->taxa * $pagamento->valor / 100 ), 2, ',', '.') }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 4%;">
						<button type="button" class="btn btn-block btn-danger btn-sm text-center" wire:click="deletar_pagamento('{{ $pagamento->id }}', '{{ $pagamento->created_at }}')"><i class="fa-solid fa-trash-can"></i></button>
					</div>
				</div>
				@empty
				<div class="px-1" style="width: 100%;">
					<input type="text" class="form-control form-control-sm text-center" value="Não há pagamentos lançados nesta comanda" readonly="readonly">
				</div>
				@endforelse
			</div>
			<div class="card-footer text-right">
				<button type="button" class="btn btn-success" wire:click="continuar_lancando(true)">Finalizar comanda</button>
			</div>
		</div>
	</div>
	@if($comanda_finalizada)
	<div class="modal fade show" aria-hidden="true" style="display: block;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Finalizar comanda</h3>
					<button type="button" class="close" wire:click="continuar_lancando(false)" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="h6 text-center">
							Deseja finalizar a comanda?
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-warning" wire:click="continuar_lancando(false)"><strong>NÃO!</strong> Continuar lançando</button>
					<button type="button" class="btn btn-primary" wire:click="continuar_lancando(true)"><strong>SIM!</strong> Finalizar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show"></div>
	@endif
	<!-- if($aviso1) -->
	@if(1==2)
	<div class="modal fade show" aria-hidden="true" style="display: block;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">Finalizar comanda</h3>
					<button type="button" class="close" wire:click="continuar_lancando(false)" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="h6 text-center">
							Deseja finalizar a comanda?
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-warning" wire:click="continuar_lancando(false)"><strong>NÃO!</strong> Continuar lançando</button>
					<button type="button" class="btn btn-primary" wire:click="continuar_lancando(true)"><strong>SIM!</strong> Finalizar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-backdrop fade show"></div>
	@endif
</div>
