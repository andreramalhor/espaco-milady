<div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    @foreach(\App\Models\ACL\Funcao::all() as $ciclo)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" disabled {{ $ciclo->yxwbgtooplyjjaz->contains($this->pessoa->id) ? 'checked=""' : '' }}>
                        <label class="form-check-label">{{ $ciclo->nome }}</label>
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

