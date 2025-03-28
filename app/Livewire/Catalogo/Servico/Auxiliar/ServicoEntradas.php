<?php

namespace App\Livewire\Catalogo\Servico\Auxiliar;

use App\Models\Catalogo\CompraDetalhe as DBCompraDetalhe;
use Livewire\Component;
use Livewire\WithPagination;

class ServicoEntradas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $servico;

    public function mount($servico)
    {
        $this->servico = $servico;
    }
    
    public function render()
    {
        $entradas = DBCompraDetalhe::
                            where('id_servprod', '=', $this->servico->id)->
                            paginate();

        return view('livewire/catalogo/servico/auxiliar/servico-mostrar-entradas', [
            'entradas' => $entradas
        ]);
    }
}
