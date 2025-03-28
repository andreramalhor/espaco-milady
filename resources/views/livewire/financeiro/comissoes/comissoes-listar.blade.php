<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Comissões</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <div class="row p-2">
                <div class="offset-4 col-4">
                    <div class="form-group">
                        <label for="id_pessoa">Colaboradores</label>
                        <select class="form-control form-control-sm @error('id_pessoa') is-invalid @enderror" wire:model.live="id_pessoa">
                            <option value="">Selecione a pessoa</option>
                            @foreach(\App\Models\Atendimento\Pessoa::colaboradores()->orderBy('nome')->get() as $ciclo)
                            <option value="{{ $ciclo->id }}">{{ $ciclo->apelido }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
     
    </div>


    <!-- push('scripts') -->
        <script>
            window.addEventListener('pessoaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
