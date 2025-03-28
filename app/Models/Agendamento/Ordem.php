<?php

namespace App\Models\Agendamento;

use Illuminate\Database\Eloquent\Model;

use App\Models\Atendimento\Pessoa;

class Ordem extends Model
{
  public $timestamps = false;  

  protected $primaryKey = 'id';
  protected $table      = 'agd_ordem';
  protected $fillable   = [
    'auth_user',
    'nome_ordem',
    'ordem',
    'area',
    'id_pessoa',
  ];
  protected $appends = [
  ];
  
  // RELACIONAMENTOS  ===========================================================================================
  public function asirmghaksasjsh()
  {
    return $this->hasOne(Pessoa::class, 'id', 'auth_user');
  }

  public function oewoekdwjzsdlkd()
  {
    return $this->hasOne(Pessoa::class, 'id', 'id_pessoa');
  }
}
