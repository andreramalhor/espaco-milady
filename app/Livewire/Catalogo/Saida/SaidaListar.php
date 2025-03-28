<?php

namespace App\Livewire\Catalogo\Saida;

use App\Models\Catalogo\Saida as DBSaida;
use Livewire\Component;
use Livewire\WithPagination;

class SaidaListar extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_nome;
  public $p_email;
  public $p_endereco;
  public $p_telefone;

  public $tipo;
  public $id_caixa;
  public $id_usuario;
  public $id_fornecedor;
  public $qtd_produtos;
  public $vlr_prod_serv;
  public $vlr_negociados;
  public $vlr_dsc_acr;
  public $vlr_final;
  public $status;

  public $saida = [];
  public $saidaId;

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['saidaUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function delete($id)
  {
    $saida = DBSaida::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $saida->nome,
      'text'         => 'Tem certeza que quer deletar a saida?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $saida->id,
    ]);
  }
  
  public function finalizar($id)
  {
    $saida = DBSaida::withTrashed()->find($id);

    $saida->update(['status' => 'Finalizado']);
  }
  
  public function remove($id)
  {
    $saida = DBSaida::withTrashed()->find($id);
    
    $saida->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Saida deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Saida Deletada!');
    
    // Atualiza a lista de saidas no componente SaidaIndex
    $this->dispatch('saidaDeleted');
  }
  
  public function listar()
  {
    $saidas = DBSaida::
                        pesquisar($this->p_pesquisar)->
                        paginate();

    return $saidas;
  }
  
  public function render()
  {
    $saidas = $this->listar();
    
    return view('livewire/catalogo/saida/saida-listar', [
      'saidas' => $saidas,
    ])->layout('layouts/bootstrap');
  }
}
  