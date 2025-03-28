<div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nome">Nome<strong class="text-red">*</strong></label>
                    <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" wire:model.live="nome">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="apelido">Apelido<strong class="text-red">*</strong></label>
                    <input type="text" class="form-control form-control-sm @error('apelido') is-invalid @enderror" wire:model="apelido">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="dt_nascimento">Data de nascimento</label>
                    <input type="date" class="form-control form-control-sm" wire:model="dt_nascimento">
                </div>
            </div>
            
            <div class="col-2">
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="form-control form-control-sm" wire:model="sexo">
                        <option value="">Não identificado</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>                            
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control form-control-sm" wire:model="cpf" x-mask="999.999.999-99">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="telefone1">Telefone principal<strong class="text-red">*</strong></label>
                    <input type="text" class="form-control form-control-sm @error('telefone1') is-invalid @enderror" wire:model="telefone1" x-mask="(99) 9 9999-9999">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="telefone2">Telefone 2</label>
                    <input type="text" class="form-control form-control-sm" wire:model="telefone2" x-mask="(99) 9 9999-9999">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control form-control-sm" wire:model="email">
                </div>
            </div>
        </div>
    </div>
</div>
