<?php

namespace App\Livewire\Catalogo\Produto\Auxiliar;

use Livewire\Component;

class ProdutoPainel extends Component
{
    public $produto;
    public $estoque_perc;

    public function mount($produto)
    {
        $this->produto = $produto;

        $this->estoque_perc = ( ( ( $produto->estoque_atual - $produto->estoque_min) / ($produto->estoque_max - $produto->estoque_min) ) * 100 ) ;
    }
    
    public function render()
    {
        return view('livewire/catalogo/produto/auxiliar/produto-mostrar-painel');
    }
}
