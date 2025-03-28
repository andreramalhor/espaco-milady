<div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" wire:model.live="nome">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" class="form-control form-control-sm @error('apelido') is-invalid @enderror" wire:model="apelido">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="dt_nascimento">Data de nascimento</label>
                    <input type="date" class="form-control form-control-sm" wire:model="dt_nascimento">
                </div>
            </div>
            
            <div class="col-4">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control form-control-sm" wire:model="email">
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
            <div class="col-3">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control form-control-sm" wire:model="cpf" x-mask="999.999.999-99">>
                </div>
            </div>
        </div>
    </div>
</div>
