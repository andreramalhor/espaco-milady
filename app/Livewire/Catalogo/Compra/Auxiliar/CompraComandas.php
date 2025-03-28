<?php

namespace App\Livewire\Catalogo\Compra\Auxiliar;

use App\Models\PDV\Comanda as DBComanda;
use Livewire\Component;
use Livewire\WithPagination;

class CompraComandas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $compra;

    public function render()
    {
        $comandas = DBComanda::
                            where('id_cliente', '=', $this->compra->id)->
                            paginate();

        return view('livewire/catalogo/compra/auxiliar/compra-mostrar-comandas', [
            'comandas' => $comandas
        ]);
    }
}
