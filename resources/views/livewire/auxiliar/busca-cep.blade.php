<div>
    <div class="row">
        <div class="col-1">
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" class="form-control form-control-sm @error('cep') is-invalid @enderror" wire:model.lazy="cep" wire:change="buscaCEP()" id="cep">
                @error('cep')
                <div class="invalid-feedback">{{ $message ?? 'teste de mensagem de erro'}}</div>
                @enderror
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <br>{{ $logradouro }}
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <br>{{ $bairro }}
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <br>{{ $cidade }}
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="uf">UF</label>
                <br>{{ $uf }}
            </div>
        </div>
    </div>
   
</div>
