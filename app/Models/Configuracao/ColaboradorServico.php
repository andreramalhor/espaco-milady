<?php

namespace App\Models\Configuracao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\Atendimento\Pessoa;
use App\Models\Cadastro\ServicoProduto;

// class ColaboradorServico extends Model
class ColaboradorServico extends Pivot
{
  public $timestamps   = false;
  
  protected $primaryKey = 'id';
  public $incrementing = false;
  
  protected $table      = 'cnf_colaborador_servico';
  protected $fillable   = [
    'id_profexec',
    'id_servprod',
    'prc_comissao',
  ];

// RELACIONAMENTOS  ===========================================================================================
  public function fwpokkeoewfeojd()
  {
    return $this->hasOne(Pessoa::class, 'id', 'id_profexec')->withTrashed();
  }
  
  public function eirtuqweendaksa()
  {
    return $this->hasOne(ServicoProduto::class, 'id', 'id_servprod')->withTrashed();
  }

// MÉTODOS          ===========================================================================================


// ATRIBUTOS        ===========================================================================================
}