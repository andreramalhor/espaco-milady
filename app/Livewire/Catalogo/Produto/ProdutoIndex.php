<?php

namespace App\Livewire\Catalogo\Produto;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoIndex extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $pesquisar = '';
  
  public $nome;
  public $apelido;
  public $dt_nascimento;
  public $email;
  public $sexo;
  public $cpf;
  public $instagram;
  public $observacao;
  public $ddd;
  public $telefone;
  public $cep;
  public $logradouro;
  public $numero;
  public $bairro;
  public $cidade;
  public $uf = 'MG';
  
  public $foto;
  
  public $produto = [];
  public $produtoId;
  
  public function listar()
  {
    $produtos = DBServicoProduto::
                    pesquisar($this->pesquisar)->
                    where('tipo', '=', 'Produto')->
                    paginate(10);
    
    return $produtos;
  }
  
  public function render()
  {
    $produtos = $this->listar();
    
    return view('livewire/catalogo/produto/produto-index', [
      'produtos' => $produtos,
    ])->layout('layouts/bootstrap');
  }
}
