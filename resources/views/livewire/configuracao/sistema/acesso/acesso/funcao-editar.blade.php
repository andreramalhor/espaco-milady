<div>
    <div class="row">
        <div class="col-3">
            @include('livewire.atendimento.pessoa.auxiliar.foto_perfil')
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-12">
                    @include('livewire.atendimento.pessoa.auxiliar.dados_gerais')
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    @include('livewire.atendimento.pessoa.auxiliar.contato')
                </div>
                <div class="col-9">
                    @include('livewire.atendimento.pessoa.auxiliar.endereco')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                {{-- 
                    @include('livewire.atendimento.pessoa.auxiliar.tipo_pessoa')
                 --}}
            </div>
            <div class="col-6">
                @include('livewire.atendimento.pessoa.auxiliar.observacao')
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-footer">
            <form wire:submit.prevent="edit">
                <button type="submit" class="btn btn-sm btn-primary">Editar</button>
                <button type="submit" class="btn btn-sm btn-default">Cancelar</button>
            </form>
        </div>
    </div>          
</div>