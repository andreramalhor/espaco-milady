<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Plano de Contas</h3>
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
            @foreach($plano_de_contas->where('nivel', '=', 0) as $nivel_0)
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
                    <button type="button" class="btn btn-block btn-success btn-sm" wire:click="criar({{ $nivel_0->id }})"><i class="fa-solid fa-plus"></i></button>
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
                        <button type="button" class="btn btn-block btn-success btn-sm" wire:click="criar({{ $nivel_1->id }})"><i class="fa-solid fa-plus"></i></button>
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
                        <div class="px-1 text-left" style="width: 9%;">
                            <input class="form-control form-control-sm form-block" style="background-color: #66afff; color: white;" type="text" value="{{ $nivel_2->nivel ?? 'nivel' }}" readonly="readonly">
                        </div>
                        <div class="px-1 text-left" style="width: 50%;">
                            <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_2->titulo ?? 'titulo' }}" readonly="readonly">
                        </div>
                        <div class="px-1 text-left" style="width: 10%;">
                            <input class="form-control form-control-sm form-block" type="text" value="{{ $nivel_2->nova_conta ?? 'conta' }}" readonly="readonly">
                        </div>
                        <div class="px-1" style="width: 3%;">
                            <button type="button" class="btn btn-block btn-success btn-sm" wire:click="criar({{ $nivel_2->id }})"><i class="fa-solid fa-plus"></i></button>
                        </div>
                        <div class="px-1" style="width: 3%;">
                            @if($nivel_2->sasjiqelrhwkejs->count() == 0)
                            <button type="button" class="btn btn-block btn-danger btn-sm" wire:click="delete({{ $nivel_2->id }})"><i class="fa-solid fa-trash-can"></i></button>
                            @endif
                        </div>
                    </div>
                        @foreach($nivel_2->sasjiqelrhwkejs as $nivel_3)
                        <div class="row pb-1">
                            <div class="px-1 text-left" style="width: 9%;">
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
                                <button type="button" class="btn btn-block btn-success btn-sm" wire:click="criar({{ $nivel_3->id }})"><i class="fa-solid fa-plus"></i></button>
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
                                    <button type="button" class="btn btn-block btn-success btn-sm" wire:click="criar({{ $nivel_4->id }})"><i class="fa-solid fa-plus"></i></button>
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
                                <input type="text" class="form-control form-control-sm" value="{{ $plano_de_contas->find($conta_pai)->titulo }}" readonly="readonly">
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
</div>
