<div>
    <div class="row">
        <div class="col-12">
            @include('livewire.catalogo.produto.auxiliar.produto-editar-sobre_produto')
        </div>
    </div>
]    
]
    <div class="card card-default">
        <div class="card-footer">
            <form wire:submit.prevent="edit">
                <button type="submit" class="btn btn-sm btn-info">Editar</button>
                <button type="submit" class="btn btn-sm btn-default">Cancelar</button>
            </form>
        </div>
    </div>          
</div>