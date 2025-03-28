<?php

namespace App\Livewire\PDV\Caixa;

use App\Models\PDV\Caixa as DBCaixa;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class CaixaListar extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_local;
  public $p_usuario;
  public $p_dt_abertura;
  public $p_dt_fechamento;
  public $p_status;
  
  public $caixa = [];

  public function listar()
  {
    $p_local         = $this->p_local;
    $p_usuario       = $this->p_usuario;
    $p_dt_abertura   = $this->p_dt_abertura;
    $p_dt_fechamento = $this->p_dt_fechamento;
    $p_status        = $this->p_status;

    $caixas = DBCaixa::
            // pesquisar($this->p_pesquisar)->
            when($p_local, function ($query) use ($p_local)
            {
              $query->whereHas('rybeyykhpcgwkgr', function (Builder $query) use ($p_local)
              {
                $query->where('nome', 'LIKE', '%'.$p_local.'%');
              });
            })->
            when($p_usuario, function ($query) use ($p_usuario)
            {
              $query->whereHas('kpakdkhqowIqzik', function (Builder $query) use ($p_usuario)
              {
                $query->where('nome', 'LIKE', '%'.$p_usuario.'%' )->orWhere('apelido', 'LIKE', '%'.$p_usuario.'%' );
              });
            })->
            when($p_dt_abertura || $p_dt_fechamento, function ($query) use ($p_dt_abertura, $p_dt_fechamento)
            {
              if ($p_dt_abertura)
              {
                $query->whereDate('dt_abertura', '>=', $p_dt_abertura);
              }
              
              if ($p_dt_fechamento)
              {
                $query->whereDate('dt_abertura', '<=', $p_dt_fechamento);
              }
            })->
            when($p_status, function ($query) use ($p_status)
            {
              $query->where('status', 'LIKE', '%'.$p_status.'%' );
            })->
            orderBy('created_at', 'desc')->
            paginate();

    return $caixas;
  }
  
  public function render()
  {
    $caixas = $this->listar();
    
    return view('livewire/pdv/caixa/caixa-listar', [
      'caixas' => $caixas,
    ])->layout('layouts/bootstrap');
  }
}
  