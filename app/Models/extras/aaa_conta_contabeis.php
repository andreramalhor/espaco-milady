<?php

namespace App\Models\extras;

use Illuminate\Database\Eloquent\Model;

class aaa_conta_contabeis extends Model
{
    protected $primaryKey = 'id';
    
    protected $table = 'aaa_conta_contabeis';

    protected $fillable   = [
        'id',
        'dre_superior',
        'categoria_dre',
        'categoria',
        'created_at',
        'updated_at',
        'deleted_at',
    ];  
}
