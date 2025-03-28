<div>
    <div class="row">
        @if( 1 == 2 )
        <div class="col-3">
            @include('livewire.catalogo.produto.auxiliar.produto-criar-foto_perfil')
        </div>
        @endif
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    @include('livewire.catalogo.produto.auxiliar.produto-criar-sobre_produto')
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    @include('livewire.catalogo.produto.auxiliar.produto-criar-valores_precos')
                </div>
                <div class="col-9">
                    @include('livewire.catalogo.produto.auxiliar.produto-criar-valores_custos')
                </div>
            </div>
        </div>
        <div class="col-6">
            @include('livewire.catalogo.produto.auxiliar.produto-criar-pontos_fideldiade')
        </div>
        <div class="col-6">
            @include('livewire.catalogo.produto.auxiliar.produto-criar-valores_comissoes')
        </div>
        @if( 1 == 2 )
        <div class="row">
            <div class="col-12">
                @include('livewire.catalogo.produto.auxiliar.produto-criar-indicadores')
            </div>
        </div>
        @endif
    </div>


    
    <div class="card card-default">
        <div class="card-footer">
            <form wire:submit.prevent="store">
                <button type="submit" class="btn btn-sm btn-info">Cadastrar</button>
                <button type="submit" class="btn btn-sm btn-default">Cancelar</button>
            </form>
        </div>
    </div>          
</div>
