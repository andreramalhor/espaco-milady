<?php

namespace App\Livewire\PDV\Comanda;

use App\Models\PDV\Comanda as DBComanda;
use App\Models\PDV\Caixa as DBCaixa;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ComandaListar extends Component
{
  use WithPagination;
  
  public $caixa;
  protected $paginationTheme = 'bootstrap';
  
  public $p_id;
  public $p_cliente;
  public $p_vlr_min;
  public $p_vlr_max;
  public $p_status;
  
  public $modal = false;
  
  public $comanda = [];
  public $comandaId;

  protected $listeners = ['comandaUpdated' => 'refreshList'];

  public function mount()
  {
    $this->caixa = auth()->user()->abcdefghijklmno;
  }
  
  public function delete($id)
  {
    $comanda = DBComanda::find($id);

    if($this->comanda_tem_comissao_paga($comanda))
    {
      dd($comanda,'Tem comissao paga');
      $this->dispatch('swal:alert', [
        'title'         => 'Erro!',
        'text'          => $texto ?? 'Essa comanda não poderá ser excluída porque houve pagamento de comissões relacioana a ela!',
        'icon'          => 'warning',
        'iconColor'     => 'red',
      ]);
    }
    else
    {
      if($this->caixa_esta_aberto($comanda->id_caixa))
      {
        $comanda->delete();
        
        $this->dispatch('comandaUpdated');
        $this->dispatch('swal:alert', [
          'title'         => 'Deletado!',
          'text'          => $texto ?? 'Comanda deletada com sucesso!',
          'icon'          => 'success',
          'iconColor'     => 'green',
        ]);
      }
      else
      {
        $this->dispatch('swal:alert', [
          'title'         => 'Erro!',
          'text'          => $texto ?? 'Este caixa precisa estar aberto para a comanda ser deletada!',
          'icon'          => 'warning',
          'iconColor'     => 'red',
        ]);
        dd($comanda,4444,'Não tem comissao paga');
      }
    }
  }  
  
  public function remove($id)
  {
    $comanda = DBComanda::withTrashed()->find($id);
    
    $filePath = public_path("stg/img/user/{$comanda->id}.png");
    if (file_exists($filePath))
    {
      unlink($filePath);
      $texto = 'Comanda e foto deletada com sucesso!';
    }
    
    $comanda->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Comanda deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Comanda Deletada!');
    
    // Atualiza a lista de comandas no componente ComandaIndex
    $this->dispatch('comandaDeleted');
  }
  
  public function caixa_esta_aberto($id)
  {
    $caixa = DBCaixa::find($id);
    
    if ($caixa->status == 'Aberto')
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function comanda_tem_comissao_paga($comanda)
  {
    return $comanda->kdebvgdwqkqnwqk->contains('status', 'Confirmado');
  }

  public function listar()
  {
    $p_id      = $this->p_id;
    $p_cliente = $this->p_cliente;
    $p_vlr_min = $this->p_vlr_min;
    $p_vlr_max = $this->p_vlr_max;
    $p_status  = $this->p_status;
    
    $comandas = $this->caixa->
                            rtafathibgwfust()->
                            when($p_id, function ($query) use ($p_id)
                            {
                              $query->where('id', 'LIKE', '%'.$p_id.'%');
                            })->
                            when($p_cliente, function ($query) use ($p_cliente)
                            {
                              $query->whereHas('lufqzahwwexkxli', function (Builder $query) use ($p_cliente)
                              {
                                $query->where('nome', 'LIKE', '%'.$p_cliente.'%' )->orWhere('apelido', 'LIKE', '%'.$p_cliente.'%' );
                              });
                            })->
                            when($p_vlr_min || $p_vlr_max, function ($query) use ($p_vlr_min, $p_vlr_max)
                            {
                              if ($p_vlr_min)
                              {
                                $query->where('vlr_final', '>=', $p_vlr_min);
                              }
                              
                              if ($p_vlr_max)
                              {
                                $query->where('vlr_final', '<=', $p_vlr_max);
                              }
                            })->
                            when($p_status, function ($query) use ($p_status)
                            {
                              $query->where('status', 'LIKE', '%'.$p_status.'%' );
                            })->
                            orderBy('created_at', 'desc')->
                            paginate();

    return $comandas;
  }
  
  public function render()
  {
    $comandas = $this->listar();
    
    return view('livewire/pdv/comanda/comanda-listar', [
      'comandas' => $comandas,
    ])->layout('layouts/bootstrap');
  }
}
  