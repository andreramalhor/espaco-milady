<?php

namespace App\Models\ACL;

use Illuminate\Database\Eloquent\Model;

use App\Models\Atendimento\Pessoa;
use App\Models\ACL\Permissao;
use App\Models\pivots\PermissaoFuncao;
use App\Models\pivots\FuncoesPessoas;

class Funcao extends Model
{
  public $timestamps = false;

  protected $primaryKey = 'id';
  protected $table      = 'acl_funcoes';
  protected $fillable   = [
    'nome',
    'slug',
    'descricao',
    'categoria',
  ];
  protected $appends = [
  ];

  // RELACIONAMENTOS  ===========================================================================================
  public function znufwevbqgruklz()
  {
    return $this->belongsToMany(Pessoa::class, 'acl_funcoes_pessoas', 'id_funcao', 'id_pessoa');
  }

  public function yxwbgtooplyjjaz()
  {
    return $this->belongsToMany(Permissao::class, 'acl_permissoes_funcoes', 'id_funcao', 'id_permissao');
  }

  public function getColorAttribute()
  {
    switch ($this->nome)
    {
      case 'Administrador do Sistema':
        return 'primary';
      case 'Sócio':
        return 'secondary';
      case 'Colaborador':
        return 'info';
      case 'Gerente Administrativo':
        return 'success';
      case 'Coordenador':
        return 'warning';
      case 'Parceiro':
        return 'danger';
      case 'Cliente':
        return 'indigo';
      case 'Supervisor':
        return 'lightblue';
      case 'Cliente Marketing':
        return 'navy';
      case 'Cliente CallCenter':
        return 'purple';
      case 'Vendedor':
        return 'orange';
      case 'Auxiliar Administrativo':
        return 'pink';
      case 'Secretária':
        return 'maroon';
      case 'Fornecedor':
        return 'fuchsia';
      case 'Administrador':
        return 'lime';
      case 'Administrador':
        return 'teal';
      case 'Administrador':
        return 'olive';
        break;
    }
  }

  // AUXILIARES              ===========================================================================================
  public static function pesquisar($pesquisa)
  {
    return empty($pesquisa)
                  ? static::query()
                  : static::query()->where('nome', 'LIKE', '%'.$pesquisa.'%')
                  ->orWhere('id', 'LIKE', '%'.$pesquisa.'%');
  }
}
