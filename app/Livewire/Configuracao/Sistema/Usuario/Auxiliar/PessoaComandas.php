<?php

namespace App\Livewire\Configuracao\Sistema\Usuario\Auxiliar;

use App\Models\PDV\Comanda as DBComanda;
use Livewire\Component;
use Livewire\WithPagination;

class PessoaComandas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $pessoa;

    public function render()
    {
        $comandas = DBComanda::
                            where('id_cliente', '=', $this->pessoa->id)->
                            paginate();

        return view('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-comandas', [
            'comandas' => $comandas
        ]);
    }
}
