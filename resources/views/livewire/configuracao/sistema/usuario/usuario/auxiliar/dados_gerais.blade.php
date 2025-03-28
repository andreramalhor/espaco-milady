<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Dados gerais</h3>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control form-control-sm @error('nome') is-invalid @enderror" wire:model.live="nome">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="apelido">Apelido</label>
                    <input type="text" class="form-control form-control-sm @error('apelido') is-invalid @enderror" wire:model="apelido">
                    @error('apelido')
                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="dt_nascimento">Data de nascimento</label>
                    <input type="date" class="form-control form-control-sm @error('dt_nascimento') is-invalid @enderror" wire:model="dt_nascimento">
                    @error('dt_nascimento')
                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                    @enderror
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="form-control form-control-sm @error('sexo') is-invalid @enderror" wire:model="sexo">
                        <option value="">Não identificado</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>                            
                    @error('sexo')
                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                    @enderror
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control form-control-sm @error('cpf') is-invalid @enderror" wire:model="cpf">
                    @error('cpf')
                        <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>