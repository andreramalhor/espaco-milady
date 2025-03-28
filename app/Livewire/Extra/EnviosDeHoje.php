<?php

namespace App\Livewire\Extra;

use App\Models\Extra\Envios as DBEnvios;
use Livewire\Component;

class EnviosDeHoje extends Component
{  
  public $temp_produto;
  public $temp_kit;
  public $temp_quantidade;

  public $produto;
  public $kit_desc;
  public $qtd_kit;
  public $id_gerente;
  public $id_colaborador;

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['pessoaUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function gravar()
  {
    $envio = DBEnvios::create([
      'produto'    => $this->temp_produto,
      'kit_desc'   => $this->temp_kit,
      'qtd_kit'    => $this->temp_quantidade,
      'status'     => 'Aguardando',
      'id_gerente' => auth()->user()->id,
    ]);
    
    $this->temp_produto = "";
    $this->temp_kit = "";
    $this->temp_quantidade = "";
  }
  
  public function status($id, $status)
  {
    $envio = DBEnvios::find($id);
    $envio->update([
      'status'         => $status,
      'id_colaborador' => auth()->user()->id,
    ]);

  }

  public function excluir($id)
  {
    $envio = DBEnvios::find($id);
    $envio->delete();
    
    $this->dispatch('swal:alert', [
      'text'          => $texto ?? 'Excluído!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
  }

  
  // public function listar()
  // {
  //   $envios = DBEnvios::
  //           orderBy('id', 'asc')->
  //           paginate();

  //   return $envios;
  // }
  
  public function render()
  {
    $envios = DBEnvios::get();

    return view('livewire/extra/envios-de-hoje', [
      'envios' => $envios,
    ])->layout('layouts/bootstrap');
  }
}
  