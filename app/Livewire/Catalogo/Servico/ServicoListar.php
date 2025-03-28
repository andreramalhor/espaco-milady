<?php

namespace App\Livewire\Catalogo\Servico;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;
use Livewire\WithPagination;

class ServicoListar extends Component
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
  
  public $servico = [];
  public $servicoId;

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['servicoDeleted' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }

    
  public function delete($id)
  {
    $servico = DBServicoProduto::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $servico->nome,
      'text'         => 'Tem certeza que quer deletar a serviço?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $servico->id,
    ]);
  }
  
  public function remove($id)
  {
    $servico = DBServicoProduto::withTrashed()->find($id);
    
    $filePath = public_path("stg/img/prod/{$servico->id}.png");
    if (file_exists($filePath))
    {
      unlink($filePath);
      $texto = 'Serviço e foto deletado com sucesso!';
    }
    
    $servico->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Serviço deletado com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Serviço Deletado!');
    
    // Atualiza a lista de servicos no componente ServicoIndex
    $this->dispatch('servicoDeleted');
  }

    public function listar()
    {
      $servicos = DBServicoProduto::
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
            orderBy('nome', 'asc')->
            where('tipo', '=', 'Serviço')->
            paginate();

      return $servicos;
    }

    public function render()
    {
      $servicos = $this->listar();

      return view('livewire/catalogo/servico/servico-listar', [
        'servicos' => $servicos,
      ])->layout('layouts/bootstrap');
    }
}
