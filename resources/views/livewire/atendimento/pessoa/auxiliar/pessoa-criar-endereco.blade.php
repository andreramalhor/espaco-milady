<div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control form-control-sm" wire:model.lazy="cep" wire:focusout="buscaCEP()" id="cep" x-mask="99.999-999">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control form-control-sm" wire:model.lazy="logradouro" id="logradouro">
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control form-control-sm" wire:model="numero">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control form-control-sm" wire:model="complemento">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control form-control-sm" wire:model.lazy="bairro" id="bairro">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control form-control-sm" wire:model.lazy="cidade" id="cidade">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="uf">UF</label>
                    <select class="form-control form-control-sm" wire:model.lazy="uf" id="uf">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondonia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>                            
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('set_endereco', (event) => {
                    document.getElementById('cep').value = event[0].cep;
                    document.getElementById('logradouro').value = event[0].logradouro;
                    document.getElementById('bairro').value = event[0].bairro;
                    document.getElementById('cidade').value = event[0].cidade;
                    document.getElementById('uf').value = event[0].uf;
                });
            });
        </script>    
    </div>
</div>
