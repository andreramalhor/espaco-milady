<span>
    <button class="btn btn-primary btn-sm float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-filter"></i></button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width:50%;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="painel_agendamentos_label">Filtros</h5>
            <button type="button" class="btn-close" wire:click="trocar_tela" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body table-responsive p-0">
            <div class="row p-2">
                <div class="form-group">
                    <label>Aberto entre</label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" placeholder="(00) 90000-0000" wire:model="telefone">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="button" wire:click="consultar">Consultar</button>
                </div>
            </div>

            <div class="row p-2">
                <div class="form-group">
                    <label>Telefone </label>
                    <input type="text" class="form-control @error('telefone') is-invalid @enderror" placeholder="(00) 90000-0000" wire:model="telefone">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="button" wire:click="consultar">Consultar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-backdrop fade show"></div>
<span>
