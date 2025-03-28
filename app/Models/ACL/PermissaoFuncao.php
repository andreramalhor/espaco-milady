<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\ACL\Permissao;
use App\Models\ACL\Funcao;

class PermissaoFuncao extends Pivot
{
	public $timestamps = false;
	
  protected $table      = 'acl_permissoes_funcoes';
  protected $fillable   = [
		'id_permissao',
    'id_funcao',
  ];

  // RELACIONAMENTOS  ===========================================================================================
  public function poqwoiwoeieussq()
  {
    return $this->belongsTo(Permissao::class, 'id_permissao', 'id');
  }

  public function wqoeifjqwisaudd()
  {
    return $this->belongsTo(Funcao::class, 'id_funcao', 'id');
  }

  public static function boot()
  {
    parent::boot();

    static::created(function ($item)
    {
      dd(121212);
    });

    static::deleted(function ($item)
    {
      dd(5555);
    });
  }
}
