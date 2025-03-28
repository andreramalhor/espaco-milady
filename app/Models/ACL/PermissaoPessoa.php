<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\ACL\Permissao;
use App\Models\Atendimento\Pessoa;

class PermissaoPessoa extends Pivot
{
	public $timestamps = false;
	
  protected $table      = 'acl_permissoes_pessoas';
  protected $fillable   = [
		'id_permissao',
    'id_pessoa',
  ];

// RELACIONAMENTOS  ===========================================================================================
  public function weoifjsaiydjksd()
  {
    return $this->belongsTo(Permissao::class, 'id_permissao', 'id');
  }

  public function sqkdjwiqesaoudf()
  {
    return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
  }

// MUTATORS         ===========================================================================================
  
}
