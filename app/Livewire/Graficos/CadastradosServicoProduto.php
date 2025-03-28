<?php

namespace App\Livewire\Graficos;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class CadastradosServicoProduto extends Component
{
  public $servicos;
  public $produtos;

  public function mount()
  {
    $this->servicos = DBServicoProduto::where('tipo', '=', 'Serviço')->count();
    $this->produtos = DBServicoProduto::where('tipo', '=', 'Produto')->count();
  }

  public function render()
  {
    return view('livewire/graficos/servico-produto-cadastrados');
  }
}
