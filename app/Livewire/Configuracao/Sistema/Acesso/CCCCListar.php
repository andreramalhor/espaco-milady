<?php

namespace App\Livewire\Configuracao\Sistema\Acesso;

use App\Models\ACL\Funcao as DBFuncao;
use Livewire\Component;
use Livewire\WithPagination;

class CCCCListar extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_nome;
  public $p_email;
  public $p_endereco;
  public $p_telefone;
    
  public $funcao = [];
  public $funcaoId;

  protected $listeners = ['chamarMetodo' => 'remove'];
  
  public function listar()
  {
    $funcoes = DBFuncao::
                      pesquisar($this->p_pesquisar)->
                      when($this->p_nome, function ($query1)
                      {
                        $query1->where('nome', 'LIKE', '%'.$this->p_nome.'%' )->orWhere('apelido', 'LIKE', '%'.$this->p_nome.'%' );
                      })->
                      when($this->p_email, function ($query2)
                      {
                        $query2->where('email', 'LIKE', '%'.$this->p_email.'%' );
                      })->
                      orderBy('nome', 'asc')->
                      get();
                      
    return $funcoes;
  }
  
  public function render()
  {
    $funcoes = $this->listar();
    
    return view('livewire/configuracao/sistema/acesso/acesso/funcao-listar', [
      'funcoes' => $funcoes,
    ])->layout('layouts/bootstrap');
  }
}
