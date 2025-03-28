<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Models\ACL\Funcao;
use App\Models\Atendimento\Pessoa;

class FuncaoPessoa extends Pivot
{
	public $timestamps = false;
	
  protected $table      = 'acl_funcoes_pessoas';
  protected $fillable   = [
    'id_pessoa',
		'id_funcao',
  ];

// RELACIONAMENTOS  ===========================================================================================
  public function lkfjdslkfjeldmf()
  {
    return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
  }
  
  public function woiejiowefdeijd()
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
