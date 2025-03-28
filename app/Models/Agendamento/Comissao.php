<?php

namespace App\Models\Agendamento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use App\Models\Atendimento\Agendamento;

class Comissao extends Model
{
  use SoftDeletes;

  protected $primaryKey = 'id';
  protected $table      = 'agd_comissoes';
  protected $fillable   = [
    'id_agendamento', 
    'prc_comissao', 
    'vlr_comissao', 
    'status', 
  ];
  protected $appends = [
  ];

  // RELACIONAMENTOS  ===========================================================================================
  public function kwdlsdnasdmlwhd()
  {
    return $this->hasOne(Agendamento::class, 'id', 'id_agendamento');
  }

  // MUTATORS         ===========================================================================================
}
