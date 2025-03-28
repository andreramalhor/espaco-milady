<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EmpresaScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        

        // dd(44, auth());    
        // $empresaId = auth()->user()->empresa_id; // Assumindo que você tem um relacionamento com a empresa no usuário
        // // dump(1121, $empresaId);    
        
        // $builder->where('empresa_id', $empresaId);
    }
}
