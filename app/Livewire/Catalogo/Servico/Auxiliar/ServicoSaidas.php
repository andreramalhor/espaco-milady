<?php

namespace App\Livewire\Catalogo\Servico\Auxiliar;

use App\Models\PDV\ComandaDetalhe as DBComandaDetalhe;
use Livewire\Component;
use Livewire\WithPagination;

class ServicoSaidas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $servico;

    public function render()
    {
        $saidas = DBComandaDetalhe::
                            where('id_servprod', '=', $this->servico->id)->
                            orderBy('created_at', 'desc')->
                            paginate(100);

        return view('livewire/catalogo/servico/auxiliar/servico-mostrar-saidas', [
            'saidas' => $saidas
        ]);
    }
}
