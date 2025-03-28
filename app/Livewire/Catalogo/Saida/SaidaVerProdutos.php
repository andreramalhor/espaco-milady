<?php

namespace App\Livewire\Catalogo\Saida;

use App\Models\Catalogo\Saida as DBSaida;
use Livewire\Component;

class SaidaVerProdutos extends Component
{
  public $saida;
  public $produtos;

  public function mount($id)
  {
    $this->saida = DBSaida::find($id);
    $this->produtos = $this->saida->lkerwiucqwbnlks->sortBy('id_produto');
  }

  public function render()
  {
    return view('livewire/catalogo/saida/auxiliar/saida-criar-ver-produtos')->layout('layouts/bootstrap');
  }
}
  