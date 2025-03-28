<?php

namespace App\Livewire\Configuracao\Sistema\Usuario;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;
use Livewire\WithPagination;

class BBBBListar2 extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar = '';
  public $p_nome = '';
  public $p_email = '';
  public $p_endereco = '';
  public $p_telefone = '';

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
  
  public $pessoa = [];
  public $pessoaId;

  // protected $listeners = ['pessoaDeleted' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  public function render()
  {
    $pessoas = $this->listar();

    return view('livewire/atendimento/pessoa/index', [
      'pessoas' => $pessoas,
    ])->layout('layouts/bootstrap');
  }
  
  public function listar()
  {
    $pessoas = DBPessoa::
                      pesquisar($this->p_pesquisar)->
                      when($this->p_nome, function ($query1)
                      {
                        $query1->where('nome', 'LIKE', '%'.$this->p_nome.'%' )->orWhere('apelido', 'LIKE', '%'.$this->p_nome.'%' );
                      })->
                      when($this->p_email, function ($query2)
                      {
                        $query2->where('email', 'LIKE', '%'.$this->p_email.'%' );
                      })->
                      when($this->p_endereco, function ($query3)
                      {
                        $query3->where('logradouro', 'LIKE', '%'.$this->p_endereco.'%' )
                              ->orWhere('bairro', 'LIKE', '%'.$this->p_endereco.'%' )
                              ->orWhere('cidade', 'LIKE', '%'.$this->p_endereco.'%' )
                              ->orWhere('complemento', 'LIKE', '%'.$this->p_endereco.'%' )
                              ->orWhere('uf', 'LIKE', '%'.$this->p_endereco.'%' );
                      })->
                      when($this->p_telefone, function ($query4)
                      {
                        $query4->orWhere('telefone1', 'LIKE', '%'.$this->p_telefone.'%' )
                                ->orWhere('telefone2', 'LIKE', '%'.$this->p_telefone.'%' );
                      })->
                      orderBy('nome', 'asc')->
                      paginate(100);

    return $pessoas;
  }
}
