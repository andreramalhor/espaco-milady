<div>
  <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    @cannot('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA')
                        @foreach($funcoes as $ciclo)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model.live="tipo" value="{{ $ciclo->id }}" id="id_{{ $ciclo->id }}">
                            <label class="form-check-label" for="id_{{ $ciclo->id }}">{{ $ciclo->nome }} | {{ $ciclo->categoria }}</label>
                            <br>
                            <small>{{ $ciclo->descricao }}</small>
                            <br>
                        </div>
                        @endforeach                             
                    @else
                        @foreach($funcoes->where('categoria', '!=', 'Acesso Total') as $ciclo)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model.live="tipo" value="{{ $ciclo->id }}" id="id_{{ $ciclo->id }}">
                            <label class="form-check-label" for="id_{{ $ciclo->id }}">{{ $ciclo->nome }} | {{ $ciclo->categoria }}</label>
                            <br>
                            <small>{{ $ciclo->descricao }}</small>
                            <br>
                        </div>
                        @endforeach                             
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>