<?php

namespace App\Livewire\Catalogo\Servico;

use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;
use Livewire\WithPagination;

class ServicoIndex extends Component
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
  
  public $servico = [];
  public $servicoId;
  
  public function listar()
  {
    $servicos = DBServicoProduto::
                    pesquisar($this->pesquisar)->
                    where('tipo', '=', 'Serviço')->
                    paginate(10);
    
    return $servicos;
  }
  
  public function render()
  {
    $servicos = $this->listar();
    
    return view('livewire/catalogo/servico/servico-index', [
      'servicos' => $servicos,
    ])->layout('layouts/bootstrap');
  }
}
