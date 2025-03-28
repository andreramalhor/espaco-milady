<div>
    <div class="row">
        @if( 1 == 2 )
        <div class="col-3">
            @include('livewire.catalogo.servico.auxiliar.servico-criar-foto_perfil')
        </div>
        @endif
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    @include('livewire.catalogo.servico.auxiliar.servico-criar-sobre_servico')
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    @include('livewire.catalogo.servico.auxiliar.servico-criar-valores_precos')
                </div>
                <div class="col-9">
                    @include('livewire.catalogo.servico.auxiliar.servico-criar-valores_custos')
                </div>
            </div>
        </div>
        <div class="col-6">
            @include('livewire.catalogo.servico.auxiliar.servico-criar-pontos_fideldiade')
        </div>
        <div class="col-6">
            @include('livewire.catalogo.servico.auxiliar.servico-criar-valores_comissoes')
        </div>
        @if( 1 == 2 )
        <div class="row">
            <div class="col-12">
                @include('livewire.catalogo.servico.auxiliar.servico-criar-indicadores')
            </div>
        </div>
        @endif
    </div>


    
    <div class="card card-default">
        <div class="card-footer">
            <form wire:submit.prevent="store">
                <button type="submit" class="btn btn-sm btn-info 
                @if($nome == '' || $duracao == '00:00')
                disabled
                @endif
                ">Cadastrar</button>
                <button type="submit" class="btn btn-sm btn-default">Cancelar</button>
            </form>
        </div>
    </div>          
</div>
