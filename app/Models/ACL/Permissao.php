<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;
use \Cache;

use App\Models\Atendimento\Pessoa;
use App\Models\ACL\Funcao;

class Permissao extends Model
{
  public $timestamps = false;

  protected $primaryKey = 'id';
  protected $table      = 'acl_permissoes';
  protected $fillable   = [
    'nome',
    'nivel',
    'ordem',
    'grupo',
    'menu',
    'descricao',
  ];
  protected $appends = [
  ];

  // RELACIONAMENTOS  ===========================================================================================
  public function dzjvxinawjwtnfa()
  {
    return $this->belongsToMany(Funcao::class, 'acl_permissoes_funcoes', 'id_permissao', 'id_funcao' );
  }

  public function aewluaerqwnisdq()
  {
    return $this->belongsToMany(Pessoa::class, 'acl_permissoes_pessoas', 'id_permissao', 'id_pessoa' );
  }

  // MOTOR  ===========================================================================================
  public function getPermission(string $permissao): Permission
  {
    $p = self::getAllFromCache()->where('permission', $permissao)->first();

    if(!$p)
    {
      $p = Permissao::query()->create(['permission', $permission]);
    }

    return $p;
  }

  public static function getAllFromCache()
  {
    $permissoes = Cache::rememberForever('permissions', function ()
    {
      return self::all();
    });

    return $permissoes;
  }

  public static function existsOnCache(string $permissao): bool
  {
    return self::getAllFromCache()->where('permission', $permissao)->isNotEmpty();
  }
}
