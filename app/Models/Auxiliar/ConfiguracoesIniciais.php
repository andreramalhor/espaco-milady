<?php

namespace App\Models\Auxiliar;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ConfiguracoesIniciais extends Model
{
  protected $primaryKey = 'id';
  protected $table      = 'atd_pessoas_contatos';
  protected $fillable   = [
    'id_pessoa',
		'tipo_contato',
		'ddd',
		'telefone',
		'whatsapp',
  ];

// RELACIONAMENTOS  ===========================================================================================
public function scopeNovidades($query)
{
    return $query->where('id_empresa', '=', 1);
}
// MUTATORS         ===========================================================================================

}
