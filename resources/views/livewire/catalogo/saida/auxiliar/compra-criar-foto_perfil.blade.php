<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Foto</h3>
    </div>
    <div class="card-body">
        <div class="col-12 align-self-center">
            @php($foto = $foto ?? asset('storage/app/logo.png'))
            <img src="{{ is_string($foto) ? $foto : $foto->temporaryUrl() }}" class="img-circle" style="border: solid 1px #7e7e7e; width: 320px;">
        </div>
        <br>&nbsp;

        <div wire:loading wire:target="foto">Uploading...</div>

        <div class="col-12 align-self-center"
                                    x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false"
                                    x-on:livewire-upload-cancel="uploading = false"
                                    x-on:livewire-upload-error="uploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
            <!-- File Input -->
            <input type="file" wire:model.live="foto" class="btn btn-secondary col start">
                            
            <!-- Progress Bar -->
            <div x-show="uploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>
            <span class="text-danger">@error('foto') {{ $message }} @enderror</span>
        </div>
    </div>
</div>
