<?php

namespace App\Livewire\Configuracao\Sistema\Acesso;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;
use Livewire\WithPagination;

class AAAAIndex extends Component
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
  
  public $pessoa = [];
  public $pessoaId;
  
  public function listar()
  {
    $pessoas = DBPessoa::
    p_nome($this->pesquisar)->
    paginate(10);
    
    return $pessoas;
  }
  
  public function render()
  {
    $pessoas = $this->listar();
    
    return view('livewire/atendimento/pessoa/index', [
      'pessoas' => $pessoas,
    ])->layout('layouts/bootstrap');
  }
}
