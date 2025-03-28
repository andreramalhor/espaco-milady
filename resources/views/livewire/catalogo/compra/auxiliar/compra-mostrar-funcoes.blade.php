<div>
    <div class="row">
        <div class="col-12">
            <div class="card">aaaaaaaaaaaaaaaaaaaa
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                @foreach($funcoes->where('categoria', '!=', 'Acesso Total') as $ciclo)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="id_{{ $ciclo->id }}" wire:click="toggleFuncao({{ $this->Compra->id }}, {{ $ciclo->id }})" {{ $ciclo->yxwbgtooplyjjaz->contains($this->Compra->id) ? 'checked=""' : '' }}>
                                    <label class="form-check-label" for="id_{{ $ciclo->id }}">{{ $ciclo->nome }}</label>
                                    <br>
                                    <small>{{ $ciclo->descricao }}</small>
                                    <br>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

