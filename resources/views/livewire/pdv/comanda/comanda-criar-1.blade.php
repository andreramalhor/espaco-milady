<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Informações da venda</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-1">
						<div class="form-group">
							<label for="col-form-label">#</label>
							<input type="text" class="form-control form-control-sm" value="{{ $venda->id ?? '' }}" readonly>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="col-form-label">Nome do Cliente</label>
							<select class="form-control form-control-sm" wire:change="cliente_selecionado( $event.target.value )">
								<option>Selecione. . .</option>
								<option value="0">( Cliente sem cadastro )</option>
								@foreach(\App\Models\Atendimento\Pessoa::orderBy('nome', 'asc')->get() as $cliente)
								<option value="{{ $cliente->id }}">{{ $cliente->nomes }}</option>
								@endforeach
							</select>
							<span class="pl-1 px-0 small">{{ $feedback_cliente ?? '' }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if(isset($id_cliente))
	<div class="col-12">
		<div class="card">
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
					<div class="px-1" style="width: 15%;">
						<label>Serviço</label>
					</div>
					<div class="px-1" style="width: 5%;">
						<label>Qtd</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label>Valor Und.</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label>Desc. ou Acrs.</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label>Valor final</label>
					</div>
					<div class="px-1" style="width: 15%;">
						<label>Profissional</label>
					</div>
					<div class="px-1" style="width: 5%;">
						<label>%</label>
					</div>
					<div class="px-1" style="width: 10%;">
						<label>Comissão</label>
					</div>
					<div class="px-1" style="width: 5%;">
						<label>&nbsp;</label>
					</div>
				</div>

				<form>
					<div class="row pb-1">
						<div class="px-1" style="width: 15%;">
							<select class="form-control form-control-sm" wire:model.live="id_servprod" wire:change="servico_selecionado( $event.target.value )">
								<option value="">Selecione o serviço . . .</option>
								@foreach(\App\Models\Catalogo\ServicoProduto::orderBy('nome', 'asc')->get() as $servico)
								<option value="{{ $servico->id }}">{{ $servico->nome }}</option>
								@endforeach
							</select>
						</div>

						<div class="px-1" style="width: 5%;">
							<input type="number" class="form-control form-control-sm text-center" min="1" wire:model="quantidade" wire:change="atualizar_valor_final">
						</div>

						<div class="px-1" style="width: 10%;">
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

						<div class="px-1" style="width: 10%;">
							<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_dsc_acr" wire:change="atualizar_valor_final">
						</div>

						<div class="px-1" style="width: 10%;">
							<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_final" readonly="readonly">
						</div>

						<div class="px-1" style="width: 15%;">
							<select class="form-control form-control-sm" wire:model.live="id_pessoa" wire:change="profissional_selecionado()">
								@if($id_servprod == null)
								<option value="NULL">Selecione serviço / produto . . .</option>
								@endif
								@if($profissionals != null)
								<option value="NULL">Selecione . . .</option>
								@foreach($profissionals as $profissional)
								<option value="{{ $profissional->id_profexec }}">{{ $profissional->dwsdjqwqwekowqe->apelido }} | ({{ $profissional->prc_comissao * 100 }} %)</option>
								@endforeach
								@endif
							</select>
						</div>

						<div class="px-1" style="width: 5%;">
							<input type="text" class="form-control form-control-sm text-center" wire:model="percentual">
						</div>

						<div class="px-1" style="width: 10%;">
							<input type="text" class="form-control form-control-sm text-right" wire:model="valor" readonly="readonly">
						</div>




						<div class="px-1" style="width: 5%;">
							<button type="button" class="btn btn-block btn-primary btn-sm" wire:click="adicionar_servprod()"><i class="fa-solid fa-floppy-disk"></i></button>
						</div>



					</form>


					{{-- 
					@foreach($venda_detalhes as $id_detalhe => $detalhe)
							@if(!$detalhe['edit'])
							<div class="row pb-1">
									<div class="px-1" style="width: 5%;">
											{{ $id_detalhe }}
									</div>
									<div class="px-1" style="width: 13%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['nome_servprod'] }}" readonly>
									</div>
									<div class="px-1" style="width: 5%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['quantidade'] }}" readonly>
									</div>
									<div class="px-1" style="width: 8%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_venda'] }}" readonly>
									</div>
									<div class="px-1" style="width: 8%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_negociado'] }}" readonly>
									</div>
									<div class="px-1" style="width: 8%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_dsc_acr'] }}" readonly>
									</div>
									<div class="px-1" style="width: 8%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['vlr_final'] }}" readonly>
									</div>
									<div class="px-1" style="width: 18%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['nome_pessoa'] }}" readonly>
									</div>
									<div class="px-1" style="width: 8%;">
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['percentual'] * 100 }}" readonly>
									</div>
									<div class="px-1" style="width: 5%;">
											@if( $detalhe['status'] == 'Em Aberto')
											<input type="text" class="form-control form-control-sm border border-warning" value="{{ $detalhe['valor'] }}">
											@elseif( $detalhe['status'] == 'Pago')
											<input type="text" class="form-control form-control-sm border border-success" value="{{ $detalhe['valor'] }}">
											@else
											<input type="text" class="form-control form-control-sm" value="{{ $detalhe['valor'] }}">
											@endif
									</div>
									<div class="px-1" style="width: 5%;">
									</div>
									<div class="px-1" style="width: 5%;">
									</div>
									<div class="px-1" style="width: 5%;">
											@if($detalhe['edit'] == false)
											<button type="button" class="btn btn-block btn-primary btn-sm" wire:click="editar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-pen-to-square"></i></button>
											@endif
									</div>
							</div>
							@else
							<form>
									<div class="row pb-1">
											<div class="px-1" style="width: 5%;">
													{{ $id_detalhe }}
											</div>
											<div class="px-1" style="width: 10%;">
													<input type="text" class="form-control form-control-sm" wire:model="vlr_negociado" value="{{ $detalhe['vlr_negociado'] }}">
											</div>
											<div class="px-1" style="width: 10%;">
													<input type="text" class="form-control form-control-sm" wire:model="vlr_dsc_acr" value="{{ $detalhe['vlr_dsc_acr'] }}">
											</div>
											<div class="px-1" style="width: 10%;">
													<input type="text" class="form-control form-control-sm" wire:model="vlr_final" value="{{ $detalhe['vlr_final'] }}">
											</div>
											<div class="px-1" style="width: 15%;">
													<select class="form-control form-control-sm" wire:model="id_pessoa">
															<option value="">-</option>
															@foreach(\App\Models\Atendimento\Pessoa::orderBy('nome', 'asc')->get() as $profissional)
															<option {{ $detalhe['id_pessoa'] == $profissional->id ? 'selected' : '' }} value="{{ $profissional->id }}">{{ $profissional->nome }}</option>
															@endforeach
													</select>
											</div>
											<div class="px-1" style="width: 5%;">
													<input type="text" class="form-control form-control-sm" wire:model="percentual" value="{{ $detalhe['percentual'] * 100 }}">
											</div>
											<div class="px-1" style="width: 10%;">
													@if( $detalhe['status'] == 'Em Aberto')
													<input type="text" class="form-control form-control-sm border border-warning" wire:model="valor" value="{{ $detalhe['valor'] }}">
													@elseif( $detalhe['status'] == 'Pago')
													<input type="text" class="form-control form-control-sm border border-success" wire:model="valor" value="{{ $detalhe['valor'] }}">
													@else
													<input type="text" class="form-control form-control-sm" wire:model="valor" value="{{ $detalhe['valor'] }}">
													@endif
											</div>
											<div class="px-1" style="width: 4%;">
													@if($detalhe['edit'] == true)
													<button type="button" class="btn btn-block btn-warning btn-sm" wire:click="cancelar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-xmark"></i></button>
													@endif
											</div>
											<div class="px-1" style="width: 4%;">
													@if($detalhe['edit'] == true)
													<button type="button" class="btn btn-block btn-danger btn-sm" wire:click="deletar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-trash-can"></i></button>
													@endif
											</div>
											<div class="px-1" style="width: 4%;">
													@if($detalhe['edit'] == true)
													<button type="button" class="btn btn-block btn-success btn-sm" wire:click="atualizar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-floppy-disk"></i></button>
													@endif
											</div>
									</div>
							</form>
							@endif
					@endforeach
--}}

<br>
<br>
<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>
			</div>

				<div class="row">
					<div class="col-12">
						<div class="row">							
							<div class="col-5">
								<div class="form-group">
									<label for="col-form-label pt-0">Serviço ou Produto</label>
									<select class="form-control form-control-sm" wire:change="servico_selecionado( $event.target.value )">
										<option value="NULL">Selecione . . .</option>
										@foreach(\App\Models\Catalogo\ServicoProduto::get()->groupBy('id_categoria') as $categoria => $servicos)
										<optgroup label="{{ $servicos->first()->ecgklyqfdcoguyj->nome ?? $servicos->first()->id_categoria }}">
											@foreach($servicos as $servico)
											<option value="{{ $servico->id }}">{{ $servico->nome }}</option>
											@endforeach
										</optgroup>
										@endforeach
									</select>
									<span class="pl-1 px-0 small {{ $feedback_item_comanda_status }}">{{ $feedback_item_comanda ?? '' }}</span>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="col-form-label pt-0">Profissional Parceiro</label>
									<div class="input-group">
										<select class="form-control form-control-sm" wire:change="profissional_selecionado( $event.target.value )">
											@if($servico_produto == null)
											<option value="NULL">Selecione um serviço / produto . . .</option>
											@endif
											@if($profissionais != null)
											<option value="NULL">Selecione . . .</option>
											@foreach($profissionais as $profissional)
											<option value="{{ $profissional->id }}">{{ $profissional->nome }}</option>
											@endforeach
											@endif
										</select>
										<span class="pl-1 px-0 small">{{ $feedback_profexec ?? '' }}</span>
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group row mb-1">
									<label class="col-form-label pt-0">Comissão</label>
								</div>
								<div class="form-group row mb-1">
									<div class="custom-control "> {{-- custom-control custom-radio --}}
										<div class="col-12">
											<input type="radio" id="rdo_vlr_pgo" class="" wire:model.live="tipo_comissao" value="Comissão Sob Valor Final" wire:click="atualizar_comissao()"/> {{-- custom-control-input --}}
											<label for="rdo_vlr_pgo" class="">Sob Valor Final</label> {{-- custom-control-label --}}
										</div>
									</div>
								</div>
								<div class="form-group row mb-1">
									<div class="col-12">
										<div class="custom-control "> {{-- custom-control custom-radio --}}
											<input type="radio" id="rdo_vlr_tbl" class="" wire:model.live="tipo_comissao" value="Comissão Sob Valor Tabelado" wire:click="atualizar_comissao()"/> {{-- custom-control-input --}}
											<label for="rdo_vlr_tbl" class="">Sob Valor Tabelado</label> {{-- custom-control-label --}}
										</div>
									</div>
								</div>
								<div class="form-group row mb-1">
									<div class="col-12">
										<div class="custom-control "> {{-- custom-control custom-radio --}}
											<input type="radio" id="rdo_vlr_zro" class="" wire:model.live="tipo_comissao" value="Comissão Zerada" wire:click="atualizar_comissao()"/> {{-- custom-control-input --}}
											<label for="rdo_vlr_zro" class="">Zerada</label> {{-- custom-control-label --}}
										</div>
									</div>
								</div>
								<div class="form-group row mb-1">
									<div class="col-6">
										<div class="custom-control "> {{-- custom-control custom-radio --}}
											<input type="radio" id="rdo_vlr_custom" class="" wire:model.live="tipo_comissao" value="Comissão Manual" wire:click="atualizar_comissao()"/> {{-- custom-control-input --}}
											<label for="rdo_vlr_custom" class="">Manual</label> {{-- custom-control-label --}}
										</div>
									</div>
									@if($tipo_comissao == 'Comissão Manual')
									<div class="col-6">
										<div class="input-group input-group-sm mb-3">
											<span class="input-group-text" id="tp_m_comissao" onclick="tp_m_comissao( 'trocar' )" data-tp_m_comissao="R$" style="cursor: pointer">R$</span>
											<input type="text" class="form-control dinheiro text-center" id="vlr_m_comissao" value=0 aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onchange="tp_m_comissao()">
										</div>
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-9">
						<div class="row">
							<div class="col-3">
								<div class="form-group text-center">
									<label class="col-form-label pt-0">Valor Tabelado - {{ $item_vlr_negociado }}</label>
									<input type="text" class="form-control form-control-sm dinheiro text-right" id="cmp_vlr_negociado" 
									@if($this->servico_produto['tipo_preco'] == 'Preço Fixo')
									disabled 
									
									@elseif($this->servico_produto['tipo_preco'] == 'Preço Variável')
									
									@else
									disabled 
									@endif
									wire:model.live="item_vlr_negociado"
									onchange="atualizar_valor_final( 0 )">
								</div>
							</div>
							<div class="col-2">
								<div class="form-group text-center">
									<label class="col-form-label pt-0">Qtd</label>
									<input type="number" class="form-control form-control-sm text-center" id="cmp_quantidade" value="1" min="1" onchange="atualizar_valor_final( 0 )">
								</div>
							</div>
							<div class="col-4">
								<div class="form-group text-center">
									<label class="col-form-label pt-0">Desc/Acrs</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<button type="button" onclick="atualizar_valor_final( -1 )" class="btn btn-outline-danger btn-xs" style="min-width: 35px;"><small>-1,00</small></button>
											<button type="button" onclick="atualizar_valor_final( -0.1 )" class="btn btn-outline-danger btn-xs" style="min-width: 35px;"><small>-0,10</small></button>
										</div>
										<input type="text" class="form-control form-control-sm dinheiro text-center" id="cmp_vlr_dsc_acr" onchange="atualizar_valor_final( 0 )" value=0>
										<div class="input-group-append">
											<button type="button" onclick="atualizar_valor_final( +0.1 )" class="btn btn-outline-success btn-xs" style="min-width: 35px;"><small>+0,10</small></button>
											<button type="button" onclick="atualizar_valor_final( +1 )" class="btn btn-outline-success btn-xs" style="min-width: 35px;"><small>+1,00</small></button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group text-center">
									<label class="col-form-label pt-0">Valor Final</label>
									<input type="text" class="form-control form-control-sm dinheiro text-right" id="cmp_vlr_final" disabled="true">
								</div>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">   
							<label class="col-form-label pt-0">&nbsp;</label>
							<div class="btn-group btn-block text-center">
								<button type="button" class="btn btn-info disabled" id="venda_detalhes_adicionar" onclick="venda_detalhes_adicionar()"><i class="fas fa-arrow-alt-circle-down"></i></button>
								<button type="button" class="btn btn-danger" onclick="servprod_resetar()"><i class="fas fa-minus-square"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<a href="javascript:">View All Users</a>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
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
					<div class="col-12">
						<div class="row">
							<div class="col-3">
								<div class="form-group">
									<label for="col-form-label pt-0">Forma de Pagamento</label>
									<select class="form-control form-control-sm" id="forma" onchange="formaspagamentos_preencher( $('#forma'), $('#bandeira') )">
										<option>Carregando . . .</option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<label for="col-form-label pt-0">Bandeira</label>
									<div class="input-group">
										<select class="form-control form-control-sm" id="bandeira" onchange="formaspagamentos_preencher( $('#bandeira'), $('#parcela') )" disabled="true">
											<option>Carregando . . .</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-1">
								<div class="form-group">
									<label for="col-form-label pt-0">Parcela</label>
									<div class="input-group">
										<select class="form-control form-control-sm" id="parcela" onchange="formaspagamentos_preencher( $('#parcela'), $('#pri_vcto') )">
											<option>Carregando . . .</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<label for="col-form-label pt-0">1º Vencimento</label>
									<div class="input-group">
										<input type="date" class="form-control form-control-sm" id="pri_vcto" disabled="true" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" disabled="true">
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="form-group">
									<label for="col-form-label pt-0">Valor</label>
									<div class="input-group">
										<input type="text" class="form-control form-control-sm dinheiro text-right" id="valor" disabled="true">
									</div>
									<span id="vlr_pagamento_feedback" class="pl-1 valid-feedback d-block">Total: <spam id="spam_vlr_total">-</spam> | Restante: <spam id="spam_vlr_restante">-</spam></span>
								</div>
							</div>
							<div class="col-1">
								<div class="form-group">   
									<label class="col-form-label pt-0">&nbsp;</label>
									<div class="btn-group btn-block text-center">
										<button type="button" class="btn btn-info disabled" id="venda_pagamentos_adicionar" onclick="venda_pagamentos_adicionar()"><i class="fas fa-arrow-alt-circle-down"></i></button>
										<button type="button" class="btn btn-danger" onclick="formaspagamentos_resetar()"><i class="fas fa-minus-square"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<a href="javascript:">View All Users</a>
			</div>
		</div>
	</div>
	@endif
</div>
