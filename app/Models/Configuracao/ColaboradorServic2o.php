<?php

namespace App\Models\Configuracao;

use Illuminate\Database\Eloquent\Model;
use App\Models\Atendimento\Pessoa;
use App\Models\Cadastro\ServicoProduto;

class ColaboradorServic2o extends Model
{
  public $timestamps   = false;
  
  protected $primaryKey = 'id';
  // protected $primaryKey = ['id_profexec', 'id_servprod'];
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