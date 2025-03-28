<?php

namespace App\Livewire\Configuracao\Sistema\Permissao;

use App\Models\ACL\Permissao as DBPermissao;
use Livewire\Component;

class PermissaoListar extends Component
{
  public $id_pessoa = "";
  
  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['permissaoUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function update_permissao(DBPermissao $permissao, $stasah)
  {
    if($stasah)
    {
      $permissao->aewluaerqwnisdq()->attach($this->id_pessoa);
    }
    else
    {
      $permissao->aewluaerqwnisdq()->detach($this->id_pessoa);
    }
  }
  
  public function delete($id)
  {
    $permissao = DBPermissao::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $permissao->nome,
      'text'         => 'Tem certeza que quer deletar a permissão?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $permissao->id,
    ]);
  }
  
  public function remove($id)
  {
    $permissao = DBPermissao::find($id);
    
    $permissao->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Permissão deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Permissão Deletada!');
    
    // Atualiza a lista de permissaos no componente PermissaoIndex
    $this->dispatch('permissaoDeleted');
  }
  
  public function render()
  {
    $permissoes = DBPermissao::
                          orderBy('nome', 'asc')->
                          with('aewluaerqwnisdq')->
                          get();

    return view('livewire/configuracao/sistema/permissao/permissao-listar', [
      'permissoes' => $permissoes,
    ])->layout('layouts/bootstrap');
  }
}
  