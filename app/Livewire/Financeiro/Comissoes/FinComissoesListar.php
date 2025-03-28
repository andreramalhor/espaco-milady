<?php

namespace App\Livewire\Financeiro\Comissoes;

use App\Models\Financeiro\ColaboradorServico as DBColaboradorServico;
use Livewire\Component;

class FinComissoesListar extends Component
{
  public $id_pessoa = "";
  
  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['permissaoUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function ver_comissoes_pessoaos( $aslsqlewqw )
  {

    return 111;
    // dd($aslsqlewqw);
  }
  
  public function update_servprod($id_servprod, $valor, $manter)
  {
    if($manter)
    {
      $colab = DBColaboradorServico::updateOrCreate([
        'id_servprod' => $id_servprod,
        'id_profexec' => $this->id_pessoa,
      ], ['prc_comissao' => $valor / 100 ]);
    }
    else
    {
      if( $valor == 0 )
      {
        $colab = DBColaboradorServico::where('id_servprod', '=', $id_servprod)->where('id_profexec', '=', $this->id_pessoa)->first()->delete();
      }
      else
      {
        $colab = DBColaboradorServico::updateOrCreate([
          'id_servprod' => $id_servprod,
          'id_profexec' => $this->id_pessoa,
        ], ['prc_comissao' => $valor / 100 ]);
      }
    }
  }

  
  public function remove($id)
  {
    $comissoes = DBColaboradorServico::find($id);
    
    $comissoes->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Permissão deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Permissão Deletada!');
    
    // Atualiza a lista de permissaos no componente ComissoesIndex
    $this->dispatch('permissaoDeleted');
  }
  
  public function render()
  {
    return view('livewire/financeiro/comissoes/comissoes-listar')->layout('layouts/bootstrap');
  }
}
