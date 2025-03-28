<?php

namespace App\Models\pivots;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FuncoesPessoas extends Pivot
{
  protected $table = 'acl_funcoes_pessoas';
  protected $fillable = [
    'id_funcao',
    'id_pessoa',
  ];
}
