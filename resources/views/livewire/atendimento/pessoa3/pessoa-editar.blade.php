<div>
<form class="form-horizontal">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Dados gerais</h3>
        </div>
        
        <div class="card-body">
            <div class="row">
                <input type="hidden" wire:model="id_criador">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nome">Nome {{ $nome }}</label>
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

    <div class="row">
        <div class="col-3">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Contatos</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ddd">DDD</label>
                                <input type="text" class="form-control form-control-sm @error('ddd') is-invalid @enderror" wire:model="ddd">
                                @error('ddd')
                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control form-control-sm @error('telefone') is-invalid @enderror" wire:model="telefone">
                                @error('telefone')
                                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Endereço</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" class="form-control form-control-sm @error('cep') is-invalid @enderror" wire:model="cep">
                                @error('cep')
                                    <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" class="form-control form-control-sm @error('logradouro') is-invalid @enderror" wire:model="logradouro">
                                @error('logradouro')
                                    <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input type="text" class="form-control form-control-sm @error('numero') is-invalid @enderror" wire:model="numero">
                                @error('numero')
                                    <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control form-control-sm @error('bairro') is-invalid @enderror" wire:model="bairro">
                                @error('bairro')
                                    <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control form-control-sm @error('cidade') is-invalid @enderror" wire:model="cidade">
                                @error('cidade')
                                    <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="uf">UF</label>
                                <select class="form-control form-control-sm @error('uf') is-invalid @enderror" wire:model="uf">
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG" selected>MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>                            
                                @error('uf')
                                    <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Observações gerais</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="observacao">Observação</label>
                        <textarea class="form-control form-control-sm @error('observacao') is-invalid @enderror" rows="3" wire:model="observacao"></textarea>
                        @error('observacao')
                            <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Foto</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="text-center">
                        @php($foto = $foto ?? asset('storage/app/logo.png'))
                        <img src="{{ is_string($foto) ? $foto : $foto->temporaryUrl() }}" class="img-circle" style="border: solid 1px #7e7e7e; width: 320px;">
                    </div>
                </div>
                <div class="col-6 align-self-center">
                    <input type="file" wire:model.live="foto" class="btn btn-secondary col start">
                    <span class="text-danger">@error('foto') {{ $message }} @enderror</span>
                </div>
            </div>
        </div>
    </div>
</form>

    <div class="card card-default">
        <div class="card-footer">
            <form wire:submit.prevent="edit">
                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                <button type="submit" class="btn btn-sm btn-default">Cancelar</button>
            </form>
        </div>
    </div>          
</div>