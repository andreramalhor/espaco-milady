<div class="row">
	
	<div class="col-4">
		<div class="card">
			<div class="card-body p-0">
				<div class="row">
					<div class="col-4">
						<div class="description-block border-right">
							<span class="description-text">Valor Itens</span>
							<h5 class="description-header">R$ {{ $cmd_valor_total }}</h5>
						</div>
					</div>
					
					<div class="col-4">
						<div class="description-block border-right">
							<span class="description-text">Pagamentos</span>
							<h5 class="description-header">R$ {{ $cmd_valor_pago }}</h5>
						</div>
					</div>
					
					<div class="col-4">
						<div class="description-block">
							<span class="description-text">Restante</span>
							<h5 class="description-header">R$ {{ $cmd_valor_restante }}</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-8">
		<div class="card {{ $AA_collapso == 'fase-1' ? 'card-secondary' : 'collapsed-card' }}">
			<div class="overlay d-none" wire:loading.class.remove="d-none">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>
			<div class="card-header">
				<h3 class="card-title">Informações da venda</h3>
				<div class="card-tools">
					@if(!is_null(\App\Models\Atendimento\Pessoa::find($AA_id_cliente)) && \App\Models\Atendimento\Pessoa::find($AA_id_cliente)->saldo_conta > 0)
					<button type="button" class="btn btn-success btn-sm" wire:click="modal_saldo">
						<i class="fas fa-circle-dollar-to-slot"></i>
						<span class="badge bg-default">R$ {{ number_format(\App\Models\Atendimento\Pessoa::find($AA_id_cliente)->saldo_conta, 2, ',', '.') }}</span>
					</button>
					@elseif( !is_null(\App\Models\Atendimento\Pessoa::find($AA_id_cliente)) && \App\Models\Atendimento\Pessoa::find($AA_id_cliente)->saldo_conta < 0)
					<button type="button" class="btn btn-danger btn-sm" wire:click="modal_saldo">
						<i class="fas fa-circle-dollar-to-slot"></i>
						<span class="badge bg-default">R$ {{ number_format(\App\Models\Atendimento\Pessoa::find($AA_id_cliente)->saldo_conta, 2, ',', '.') }}</span>
					</button>
					@else
					<button type="button" class="btn btn-default btn-sm disabled">
						<i class="fas fa-circle-dollar-to-slot"></i>
						<span class="badge bg-default text-dark">-</span>
					</button>
					@endif
					
					@if(!is_null($AA_tem_agendamentos) && $AA_tem_agendamentos->count() > 0)
					<button type="button" class="btn btn-warning btn-sm" wire:click="modal_agendamentos">
						<i class="far fa-calendar-alt"></i>
						<span class="badge bg-default text-dark">{{ $AA_tem_agendamentos->count() }}</span>
					</button>
					@else
					<button type="button" class="btn btn-default btn-sm disabled">
						<i class="far fa-calendar-alt"></i>
						<span class="badge bg-default text-dark">0</span>
					</button>
					@endif
					
					<button type="button" class="btn btn-tool" data-card-widget="collapse" wire:click="mudar_fase('fase-1')">{!! $AA_collapso == 'fase-1' ? '<i class="fas fa-minus"></i>' : '<i class="fas fa-plus"></i>' !!}</button>
				</div>
				<br>
				<div class="float-left">
					{{ \App\Models\Atendimento\Pessoa::find($AA_id_cliente)->apelido ?? '' }}
				</div>
			</div>
			<div class="card-body" style="display: {{ $AA_collapso == 'fase-1' ? 'block' : 'none' }};">
				<div class="row">
					<div class="col-1">
						<div class="form-group">
							<label for="col-form-label">#</label>
							<input type="text" class="form-control form-control-sm" value="{{ $AA_id_cliente ?? '' }}" readonly>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="col-form-label">Nome do Cliente</label>
							<select class="form-control form-control-sm" wire:change="cliente_selecionado( $event.target.value )" {{ $focus_input == 'ipt_id_cliente' ? 'autofocus': '' }}>
								<option value="">Selecione. . .</option>
								<option value="0">( Cliente sem cadastro )</option>
								@foreach(\App\Models\Atendimento\Pessoa::orderBy('nome', 'asc')->get() as $cliente)
								<option value="{{ $cliente->id }}">{{ $cliente->nomes }}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-default">Cancelar</button>
				@if( $AA_collapso != 'fase-1' )
				<button class="btn btn-secondary float-right" {{ $focus_input == 'btn_fase-2' ? 'autofocus': '' }} wire:click="mudar_fase( 'fase-2' )">Próximo</button>
				@endif
			</div>
			<livewire:PDV.Comanda.ComandaAgendamentos />
			<livewire:PDV.Comanda.ComandaSaldo />
		</div>
	</div>

	@if($AA_id_cliente != '')
	<div class="col-12">
		<div class="card {{ $AA_collapso == 'fase-2' ? 'card-secondary' : 'collapsed-card' }}">
			<div class="overlay d-none" wire:loading.class.remove="d-none">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>
			<div class="card-header">
				<h3 class="card-title">Itens da comanda</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" wire:click="mudar_fase('fase-2')">{!! $AA_collapso == 'fase-2' ? '<i class="fas fa-minus"></i>' : '<i class="fas fa-plus"></i>' !!}</button>
				</div>
			</div>
			<div class="card-body p-0" style="display: {{ $AA_collapso == 'fase-2' ? 'block' : 'none' }};">
				<table class="table table-sm table-striped">
					<thead class="table-dark">
						<tr>
							<th class="text-center" style="width: 4%;">#</th>
							<th class="text-left" style="width: 15%;">Serviço</th>
							<th class="text-center" style="width: 5%;">Qtd</th>
							<th class="text-right" style="width: 10%;">Valor Und.</th>
							<th class="text-right" style="width: 10%;">Desc. ou Acrs.</th>
							<th class="text-right" style="width: 10%;">Valor final</th>
							<th class="text-left" style="width: 15%;">Profissional</th>
							<th class="text-center" style="width: 5%;">%</th>
							<th class="text-right" style="width: 10%;">Comissão</th>
							<th class="text-center" style="width: 5%;"># Agnd.</th>
							<th class="" style="width: 11%;">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th class="text-center">
								<input class="form-control form-control-sm text-center" wire:model="id_chave" readonly="readonly">
							</th>
							<th class="text-left">
								<select class="form-control form-control-sm" wire:model.live="id_servprod" wire:change="servico_selecionado( $event.target.value )" {{ $focus_input == 'ipt_id_servprod' ? 'autofocus': '' }}>
									<option value="">Selecione o serviço . . .</option>
									@foreach(\App\Models\Catalogo\ServicoProduto::orderBy('nome', 'asc')->get() as $servico)
									<option value="{{ $servico->id }}">{{ $servico->nome }}</option>
									@endforeach
								</select>
							</th>
							<th class="text-center">
								<input type="number" class="form-control form-control-sm text-center" min="1" wire:model="quantidade" wire:change="atualizar_valor_final" {{ $focus_input == 'ipt_quantidade' ? 'autofocus': '' }}>
							</th>
							
							<th class="text-right">
								<input type="text" class="form-control form-control-sm text-right" wire:change="atualizar_valor_final" 
								@if($tipo_preco == 'Preço variável')
								wire:model="vlr_negociado" 
								@elseif($tipo_preco == 'Preço Fixo')
								wire:model="vlr_venda" readonly="readonly"
								@else
								wire:model="vlr_negociado" readonly="readonly"
								@endif
								>
							</th>
							<th class="text-right">
								<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_dsc_acr" wire:change="atualizar_valor_final">
							</th>
							<th class="text-right">
								<input type="text" class="form-control form-control-sm text-right" wire:model="vlr_final" readonly="readonly">
							</th>
							<th class="text-left">
								<select class="form-control form-control-sm" wire:model.live="id_pessoa" wire:change="profissional_selecionado()" {{ $profissionals != null ? '' : 'readonly="readonly"' }}>
									@if($id_servprod == null)
									<option value="NULL">Selecione serviço / produto . . .</option>
									@endif
									@if($profissionals != null)
									<option value="NULL">Selecione . . .</option>
									@foreach($profissionals as $profissional)
									<option value="{{ $profissional->id_profexec }}" {{ $profissional->id_profexec == $id_pessoa ? 'selected' : '' }}>{{ $profissional->fwpokkeoewfeojd->apelido }} | ({{ $profissional->prc_comissao * 100 }} %)</option>
									@endforeach
									@endif
								</select>
							</th>
							<th class="text-center">
								<input type="text" class="form-control form-control-sm text-center" wire:model="percentual" wire:change="atualizar_comissao('percentual')">
							</th>
							<th class="text-right">
								<input type="text" class="form-control form-control-sm text-right" wire:model="valor" wire:change="atualizar_comissao('valor')">
							</th>
							<th class="text-center">
								<input type="text" class="form-control form-control-sm text-right" wire:model="id_agendamento" readonly="readonly">
							</th>
							<th class="" style="width: 5%;">
								<button type="button" class="btn btn-block btn-primary btn-sm" wire:click="adicionar_servprod({ origem_adicao: '{{ $tipo_adicao }}', dados: null })"><i class="fa-solid fa-floppy-disk"></i></button>
							</th>
						</tr>
						
						@foreach($AA_vendas_detalhes as $key => $item)
						<tr :key="$item->id">
							<td class="text-center">{{ $item['id_chave'] }}</td>
							<td class="text-left">{{ \App\Models\Catalogo\ServicoProduto::find($item['id_servprod'])->nome }}</td>
							<td class="text-center">{{ $item['quantidade'] }}</td>
							<td class="text-right">{{ number_format($item['vlr_negociado'], 2, ',', '.') }}</td>
							<td class="text-right">{{ number_format($item['vlr_dsc_acr'], 2, ',', '.') }}</td>
							<td class="text-right">{{ number_format($item['vlr_final'], 2, ',', '.') }}</td>
							<td class="text-left">{{ \App\Models\Atendimento\Pessoa::find($item['conta_interna']['id_pessoa'])->apelido ?? 'Sem profissional cadastrado' }}</td>
							<td class="text-center">{{ number_format($item['conta_interna']['percentual'], 1, ',', '.') }}</td>
							<td class="text-right">{{ number_format($item['conta_interna']['valor'], 2, ',', '.') }}</td>
							<td class="text-center">{{ $item['id_agendamento'] }}</td>
							<td class="">
								<button type="button" class="btn btn-warning btn-sm" wire:click="editar_detalhe({{ $item['id_chave'] }})"><i class="fa-solid fa-edit"></i></button>
								<button type="button" class="btn btn-danger btn-sm" wire:click="remover_detalhe({{ $item['id_chave'] }})"><i class="fa-solid fa-xmark"></i></button>
								{{-- 
								<button type="button" class="btn btn-danger btn-sm" wire:click="deletar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-trash-can"></i></button>
								<button type="button" class="btn btn-success btn-sm" wire:click="atualizar_detalhe({{ $id_detalhe }})"><i class="fa-solid fa-floppy-disk"></i></button>
								--}}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<button class="btn btn-default">Cancelar</button>
				<button class="btn btn-secondary float-right" {{ $focus_input == 'btn_fase-2' ? 'autofocus': '' }} wire:click="mudar_fase( 'fase-3' )">Próximo</button>
			</div>
		</div>
	</div>
	@endif

	@if($AA_id_cliente != '')
	<div class="col-12">
		<div class="card {{ $AA_collapso == 'fase-3' ? 'card-secondary' : 'collapsed-card' }}">
			<div class="overlay d-none" wire:loading.class.remove="d-none">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>
			<div class="card-header">
				<h3 class="card-title">Informações de pagamento</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" wire:click="mudar_fase('fase-3')">{!! $AA_collapso == 'fase-3' ? '<i class="fas fa-minus"></i>' : '<i class="fas fa-plus"></i>' !!}</button>
				</div>
			</div>
			<div class="card-body" style="display: {{ $AA_collapso == 'fase-3' ? 'block' : 'none' }};">
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
							<option value="NULL">Selecione a forma de pagamento</option>
							@foreach($opcoes_formas as $forma)
							<option {{ $pgto_forma == $forma->forma ? 'selected' : '' }} value="{{ $forma->forma }}">{{ $forma->forma }}</option>
							@endforeach
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
							<option value="{{ $bandeira->bandeira }}" {{ $bandeira->bandeira ==  'Dinheiro' ? 'selected' : '' }}>{{ $bandeira->bandeira }}</option>
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
						<input type="text" class="form-control form-control-sm text-right" wire:model="cmd_valor_pagando" wire:change="corrigir_valor_pagando( $event.target.value )">
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
				@forelse($AA_vendas_pagamentos as $pagamento)
				<div class="row pb-1">
					{{ $pagamento['id_grupo'] }}  |  {{ $pagamento['id_chave'] }}
					<div class="px-1" style="width: 20%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $pagamento['forma'] ?? $pagamento['id_forma_pagamento'] }}" readonly="readonly">
					</div>
					<div class="px-1" style="width: 15%;">
						<input type="text" class="form-control form-control-sm text-left" value="{{ $pagamento['bandeira'] ?? $pagamento['descricao'] }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ $pagamento['parcela'] }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 15%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ \Carbon\Carbon::parse($pagamento['dt_prevista'])->format('d/m/Y') }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($pagamento['valor'], 2, ',', '.') }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($pagamento['taxa'], 2, ',', '.') }}%" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 10%;">
						<input type="text" class="form-control form-control-sm text-center" value="{{ number_format($pagamento['valor'] - ($pagamento['taxa'] * $pagamento['valor'] / 100 ), 2, ',', '.') }}" readonly="readonly">
					</div>
					
					<div class="px-1" style="width: 4%;">
						<button type="button" class="btn btn-block btn-danger btn-sm text-center" wire:click="deletar_pagamento('{{ $pagamento['id_chave'] }}', '{{ $pagamento['id_grupo'] }}')"><i class="fa-solid fa-trash-can"></i></button>
					</div>
				</div>
				@empty
				<div class="px-1" style="width: 100%;">
					<input type="text" class="form-control form-control-sm text-center" value="Não há pagamentos lançados nesta comanda" readonly="readonly">
				</div>
				@endforelse
			</div>
			<div class="card-footer text-right">
				<button type="button" class="btn btn-success {{ 1 == 2 }}" wire:click="finalizar_comanda(true)">Finalizar comanda</button>
			</div>
		</div>
	</div>
		@if($comanda_finalizada)
		<div class="modal fade show" aria-hidden="true" style="display: block;">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Finalizar comanda</h3>
						<button type="button" class="close" wire:click="finalizar_comanda(false)" aria-label="Close">
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
						<button type="button" class="btn btn-warning" wire:click="finalizar_comanda(false)"><strong>NÃO!</strong> Continuar lançando</button>
						<button type="button" class="btn btn-primary" wire:click="finalizar_comanda(true)"><strong>SIM!</strong> Finalizar</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-backdrop fade show"></div>
		@endif
	@endif
</div>
