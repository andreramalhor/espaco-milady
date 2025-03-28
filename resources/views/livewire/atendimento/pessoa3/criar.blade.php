<div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Horizontal Form</h3>
        </div>
        
        
        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <x-adminlte.form.input.text col="3" label="Nome" name="nome" placeholder="Nome" />
                    @error('nome') {{ $message }} @enderror
                    {{-- <x-adminlte.form.input.text col="2" label="Apelido" name="apelido" placeholder="Apelido" /> --}}
                    <x-adminlte.form.input.date col="2" label="Data de nascimento" name="dt_nascimento" placeholder="Apelido" />
                    <x-adminlte.form.input.text col="2" label="E-mail" name="email" placeholder="E-mail" />
                    <x-adminlte.form.input.text col="2" label="CPF" name="cpf" placeholder="CPF" />
                    <x-adminlte.form.input.select col="1" label="Sexo" name="sexo" placeholder="sexo" >
                        <option value="F">F</option>
                        <option value="M">M</option>
                    </x-adminlte.form.input.select>
                    <x-adminlte.form.input.text col="2" label="Instagram" name="instagram" placeholder="instagram" />
                    <x-adminlte.form.input.text col="12" name="observacao" placeholder="Observação" />
                </div>
                <div class="row">
                    <x-adminlte.form.input.text col="1" label="DDD" name="ddd" placeholder="DDD" />
                    <x-adminlte.form.input.text col="3" label="Telefone" name="telefone" placeholder="9 0000-0000" />
                </div>
                <div class="row">
                    <x-adminlte.form.input.text col="2" label="CEP" name="cep" placeholder="CEP" />
                    <x-adminlte.form.input.text col="3" label="Logradouro" name="logradouro" placeholder="Logradouro" />
                    <x-adminlte.form.input.text col="1" label="Núm."  name="numero" placeholder=""  />
                    <x-adminlte.form.input.text col="2" label="Bairro" name="bairro" placeholder="Bairro" />
                    <x-adminlte.form.input.text col="3" label="Cidade" name="cidade" placeholder="Cidade" />
                    <x-adminlte.form.input.select col="1" label="UF" name="uf" placeholder="UF" >
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
                    </x-adminlte.form.input.select>
                </div>
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
           

                
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                <form wire:submit.prevent="{{ $pessoaId ? 'update' : 'store' }}">
                    <button type="submit" class="btn btn-sm btn-primary">
                        {{ $pessoaId ? 'Atualizar' : 'Cadastrar' }}
                    </button>
                </form>
            </div>
          
        </form>
    </div>
</div>