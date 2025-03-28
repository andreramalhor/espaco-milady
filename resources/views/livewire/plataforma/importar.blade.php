<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Importar</h3>
            </div>
            <div class="card-body p-0">
                <div class="row p-2">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Braip</label>
                            <form wire:submit.prevent="importar_braip" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    @csrf
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('file') is-invalid @enderror" wire:model="file">
                                        <label class="custom-file-label">Selecione o arquivo</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="input-group-text" wire:target="upar">Enviar</button>
                                    </div>
                                    @error('file') {{ $message }}@enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
