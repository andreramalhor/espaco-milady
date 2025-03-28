<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Foto</h3>
    </div>
    <div class="card-body">
        <div class="col-12 align-self-center">
            @php($foto = $foto ?? asset('storage/app/logo.png'))
            <img src="{{ is_string($foto) ? $foto : $foto->temporaryUrl() }}" class="img-circle" style="border: solid 1px #7e7e7e; width: 320px;">
        </div>
        <br>&nbsp;
        <div class="col-12 align-self-center">
            <input type="file" wire:model.live="foto" class="btn btn-secondary col start">
            <span class="text-danger">@error('foto') {{ $message }} @enderror</span>
        </div>
    </div>
</div>