<?php

namespace App\Livewire\Atendimento\Pessoa;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;
use Livewire\WithPagination;

class PessoaListar extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_nome;
  public $p_email;
  public $p_endereco;
  public $p_telefone;

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

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['pessoaUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function delete($id)
  {
    $pessoa = DBPessoa::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $pessoa->nome,
      'text'         => 'Tem certeza que quer deletar a pessoa?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $pessoa->id,
    ]);
  }
  
  public function remove($id)
  {
    $pessoa = DBPessoa::withTrashed()->find($id);
    
    $filePath = public_path("stg/img/user/{$pessoa->id}.png");
    if (file_exists($filePath))
    {
      unlink($filePath);
      $texto = 'Pessoa e foto deletada com sucesso!';
    }
    
    $pessoa->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Pessoa deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Pessoa Deletada!');
    
    // Atualiza a lista de pessoas no componente PessoaIndex
    $this->dispatch('pessoaDeleted');
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
            paginate();

    return $pessoas;
  }
  
  public function render()
  {
    $pessoas = $this->listar();
    
    return view('livewire/atendimento/pessoa/pessoa-listar', [
      'pessoas' => $pessoas,
    ])->layout('layouts/bootstrap');
  }
}
  