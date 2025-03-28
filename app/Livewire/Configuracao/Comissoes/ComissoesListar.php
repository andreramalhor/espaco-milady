<?php

namespace App\Livewire\Configuracao\Comissoes;

use App\Models\Configuracao\ColaboradorServico as DBColaboradorServico;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;

class ComissoesListar extends Component
{
  public $id_pessoa = "";
  public $id_doador = "";

  public $copiar = false;
  
  protected $listeners = ['chamarMetodo' => 'remove'];
  
  public function copiar_de_outro()
  {
    $this->copiar = true;

    $this->resetExcept(['id_pessoa', 'copiar']);
  }
  
  public function copiar_comissoes()
  {
    $servicos = DBServicoProduto::get();
    
    foreach ($servicos as $servico)
    {
      $comissao_doador = DBColaboradorServico::
                                  where('id_profexec', '=', $this->id_doador)->
                                  where('id_servprod', '=', $servico->id)->
                                  first();

      if(!is_null($comissao_doador))
      {
        $comissao_pessoa = DBColaboradorServico::
                                                updateOrCreate(
                                                [
                                                  'id_profexec' => $this->id_pessoa,
                                                  'id_servprod' => $servico->id,
                                                ],
                                                [
                                                  'id_profexec'  => $this->id_pessoa,
                                                  'id_servprod'  => $comissao_doador->id_servprod,
                                                  'prc_comissao' => $comissao_doador->prc_comissao,
                                                ]);
                                                
      }
      else
      {
        $comissao_pessoa = DBColaboradorServico::
                                                where(
                                                [
                                                  'id_profexec' => $this->id_pessoa,
                                                  'id_servprod' => $servico->id,
                                                ])->delete();
      }

      $this->reset();
    }

    $this->dispatch('swal:alert', [
      'title'         => 'Concluído!',
      'text'          => 'As comissões foram copiadas com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
  }
  
  public function update_servprod($id_servprod, $valor, $manter): void
  {
    if( $valor == '' || $valor*1 == 0 )
    {
      $colab = DBColaboradorServico::where('id_servprod', '=', $id_servprod*1)->where('id_profexec', '=', $this->id_pessoa*1)->first()->delete();
    }
    else
    {
      $colab = DBColaboradorServico::updateOrCreate([
        'id_servprod' => $id_servprod*1,
        'id_profexec' => $this->id_pessoa*1,
      ], ['prc_comissao' => $valor*1 / 100 ]);
    }

    $this->dispatch('swal:alert', [
      'title'         => 'Concluído!',
      'text'          => 'Comissão editada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
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
        
    // Atualiza a lista de permissaos no componente ComissoesIndex
    $this->dispatch('permissaoDeleted');

    $this->resetExcept(['id_pessoa']);
  }
  
  public function render()
  {
    return view('livewire/configuracao/comissoes/comissoes-listar')->layout('layouts/bootstrap');
  }
}
