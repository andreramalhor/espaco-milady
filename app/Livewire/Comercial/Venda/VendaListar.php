<?php

namespace App\Livewire\Comercial\Venda;

use App\Models\Comercial\Venda as DBComanda;
use Livewire\Component;

class VendaListar extends Component
{
  public $id_pessoa = "";
  public $ano;
  public $mes;
  public $filtro_meses;

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['vendaUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function mount()
  {
    $this->ano = \Carbon\Carbon::now()->year;
    $this->mes = \Carbon\Carbon::now()->month;
  }

  public function filtrar_data($ano, $mes)
  {
    if($ano == 'change')
    {
      if($mes == '-1')
      {
        $data = \Carbon\Carbon::create($this->ano, $this->mes)->subMonth();
      }
      else if($mes == '+1')
      {
        $data = \Carbon\Carbon::create($this->ano, $this->mes)->addMonth();
      }
  
      $this->ano = $data->year;
      $this->mes = $data->month;
    }
    else
    {
      $this->ano = $ano;
      $this->mes = $mes;
    }
  }

  public function update_venda(DBComanda $venda, $stasah)
  {
    if($stasah)
    {
      $venda->aewluaerqwnisdq()->attach($this->id_pessoa);
    }
    else
    {
      $venda->aewluaerqwnisdq()->detach($this->id_pessoa);
    }
  }
  
  public function delete($id)
  {
    $venda = DBComanda::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $venda->nome,
      'text'         => 'Tem certeza que quer deletar a permissão?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $venda->id,
    ]);
  }
  
  public function remove($id)
  {
    $venda = DBComanda::find($id);
    
    $venda->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Permissão deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Permissão Deletada!');
    
    // Atualiza a lista de vendas no componente VendaIndex
    $this->dispatch('vendaDeleted');
  }
  
  public function render()
  {
    $this->filtro_meses = DBComanda::orderBy('created_at', 'asc')->select('created_at')->distinct('created_at')->get();

    $start = \Carbon\Carbon::create($this->ano, $this->mes)->startOfMonth();
    $end   = \Carbon\Carbon::create($this->ano, $this->mes)->lastOfMonth();

    $vendas = DBComanda::
                      whereBetween('created_at', [$start, $end])->
                      orderBy('created_at', 'desc')->
                      orderBy('created_at', 'desc')->
                      get();

    return view('livewire/comercial/venda/venda-listar', [
      'vendas' => $vendas,
    ])->layout('layouts/bootstrap');
  }
}
  