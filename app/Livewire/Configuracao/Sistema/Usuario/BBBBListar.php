<?php

namespace App\Livewire\Configuracao\Sistema\Usuario;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;
use Livewire\WithPagination;

class BBBBListar extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_nome;
  public $p_email;

  public $usuario = [];
  public $usuarioId;

  protected $listeners = ['usuarioDeleted' => 'refreshList'];
  
  public function refreshList()
  {
    $this->resetPage();
  }
  
  public function listar()
  {
    $usuarios = DBPessoa::
            pesquisar($this->p_pesquisar)->
            when($this->p_nome, function ($query1)
            {
              $query1->where('nome', 'LIKE', '%'.$this->p_nome.'%' );
            })->
            when($this->p_email, function ($query2)
            {
              $query2->where('email', 'LIKE', '%'.$this->p_email.'%' );
            })->
            orderBy('nome', 'asc')->
            get();

    return $usuarios;
  }
  
  public function render()
  {
    $usuarios = $this->listar();
    
    return view('livewire/configuracao/sistema/usuario/usuario/usuario-listar', [
      'usuarios' => $usuarios,
    ])->layout('layouts/bootstrap');
  }
}  
