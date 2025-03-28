<?php

namespace App\Livewire\Catalogo\Produto;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoListar extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_nome;
  public $p_marca;
  public $p_categoria;

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

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['produtoDeleted' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }

    
    public function listar()
    {
      $produtos = DBServicoProduto::
            pesquisar($this->p_pesquisar)->
            when($this->p_nome, function ($query1)
            {
              $query1->where('nome', 'LIKE', '%'.$this->p_nome.'%' )->orWhere('descricao', 'LIKE', '%'.$this->p_nome.'%' );
            })->
            when($this->p_marca, function ($query2)
            {
              $query2->where('marca', 'LIKE', '%'.$this->p_marca.'%' );
            })->
            when($this->p_categoria, function ($query3)
            {
              $query3->where('categoria', 'LIKE', '%'.$this->p_categoria.'%' );
            })->
            where('tipo', '=', 'Produto')->
            orderBy('nome', 'asc')->
            paginate();

      return $produtos;
    }

    public function render()
    {
      $produtos = $this->listar();

      return view('livewire/catalogo/produto/produto-listar', [
        'produtos' => $produtos,
      ])->layout('layouts/bootstrap');
    }
}
