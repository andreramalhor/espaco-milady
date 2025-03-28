<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;         //Se for usar coluna DELETED_AT no banco de dados
use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata) 
use Carbon\Carbon;                                    //Se for usar tempo, timestamp, fuso-horário, função NOW

use App\Models\ACL\FuncaoPessoa;
use App\Models\Atendimento\Pessoa;
use App\Models\PDV\Comanda;
use App\Models\PDV\ComandaDetalhe;
use App\Models\PDV\ComandaPagamento;
use App\Models\Cadastro\ServicoProduto;
use App\Models\Financeiro\Lancamento;

class ContaInterna extends Model
{
  use SoftDeletes;
  use Notifiable;                                 		//Se for usar Notifiable (ainda nao sei do q se trata) 

  public $timestamps = true;

  protected $table      = 'fin_contas_internas';
  protected $primaryKey = 'id';
  protected $fillable = [
    'id_origem', 
    'fonte_origem', 
    'id_pessoa', 
    'tipo', 
    'percentual', 
    'valor', 
    'dt_prevista', 
    'dt_quitacao', 
    'id_destino', 
    'fonte_destino', 
    'status', 
  ];
  
  // RELACIONAMENTOS         ===========================================================================================
  public function xeypqgkmimzvknq() 
  {
    return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id' )->withTrashed();
  }

  public function lskjasdlkdflsdj()
  {
    return $this->hasOne(ComandaDetalhe::class, 'id', 'id_origem' );
  }

  public function sflfmensjwleneb()
  {
    return $this->hasOne(ComandaPagamento::class, 'id', 'id_origem' );
  }

  public function fsoljswufheuens()
  {
    return $this->belongsTo(Lancamento::class, 'id_origem', 'id' );
  }

  public function skfmwuorwmlpdlm()
  {
    return $this->hasOneThrough(
      Comanda::class,                 // Model Final
      ComandaDetalhe::class,          // Model Meio
      'id',                         // Chave estrangeira na model Meio ...
      'id',                         // Chave principal na model Final ...
      'id_origem',                  // Chave principal na model que estou ...
      'id_venda');                  // Chave principal na model Meio ...
  }

  public function aiuwlwqelejqone()
  {
    return $this->hasOneThrough(
      Comanda::class,                 // Model Final
      ComandaPagamento::class,          // Model Meio
      'id',                         // Chave estrangeira na model Meio ...
      'id',                         // Chave principal na model Final ...
      'id_origem',                  // Chave principal na model que estou ...
      'id_venda');                  // Chave principal na model Meio ...
  }

  public function ygferchrtuwewhq()
  {
    return $this->hasOneThrough(
      ServicoProduto::class,        // Model Final
      ComandaDetalhe::class,          // Model Meio
      'id',                         // Chave estrangeira na model Meio ...
      'id',                         // Chave principal na model Final ...
      'id_origem',                  // Chave principal na model que estou ...
      'id_servprod');              // Chave principal na model Meio ...
  }

  // MUTATORS         ===========================================================================================
  public function getOrigemIdAttribute()
  {
    if($this->fonte_origem == 'pdv_vendas_detalhes')
    {
      return optional($this->skfmwuorwmlpdlm)->id;
    }
    elseif($this->fonte_origem == 'pdv_vendas_pagamentos')
    {
      return optional($this->aiuwlwqelejqone)->id;
    }
    elseif($this->fonte_origem == 'fin_lancamentos')
    {
      return optional($this->fsoljswufheuens)->id;
    }
    elseif($this->fonte_origem == 'fin_conta_interna')
    {
      return optional($this->fsoljswufheuens)->id;
    }
    else
    {
      return optional($this->fsoljswufheuens)->id;
    }
  }

  public function getOrigemNomeAttribute()
  {
    if($this->fonte_origem == 'pdv_vendas_detalhes')
    {
      return optional(optional($this->skfmwuorwmlpdlm)->lufqzahwwexkxli)->apelido ?? '(Cliente sem cadastro)';
    }
    elseif($this->fonte_origem == 'pdv_vendas_pagamentos')
    {
      return optional(optional($this->aiuwlwqelejqone)->lufqzahwwexkxli)->apelido;
    }
    elseif($this->fonte_origem == 'fin_lancamentos')
    {
      return optional(optional($this->fsoljswufheuens)->qexgzmnndqxmyks)->apelido;
    }
    elseif($this->fonte_origem == 'fin_conta_interna')
    {
      return null;
    }
    else
    {
      return null;
    }
  }

  public function getOrigemValorAttribute()
  {
    if($this->fonte_origem == 'pdv_vendas_detalhes')
    {
      return optional($this->lskjasdlkdflsdj)->vlr_final;
    }
    elseif($this->fonte_origem == 'pdv_vendas_pagamentos')
    {
      return optional($this->sflfmensjwleneb)->valor;
    }
    elseif($this->fonte_origem == 'fin_lancamentos')
    {
      return optional($this->fsoljswufheuens)->vlr_final;
    }
    elseif($this->fonte_origem == 'fin_conta_interna')
    {
      return null;
    }
    else
    {
      return null;
    }
  }

  public function getOrigemServprodAttribute()
  {
    if($this->fonte_origem == 'pdv_vendas_detalhes')
    {
      return optional(optional($this->lskjasdlkdflsdj)->kcvkongmlqeklsl)->nome;
    }
    elseif($this->fonte_origem == 'pdv_vendas_pagamentos')
    {
      return 'Comanda: '.optional($this->aiuwlwqelejqone)->id;
    }
    elseif($this->fonte_origem == 'fin_lancamentos')
    {
      return optional($this->fsoljswufheuens)->informacao;
    }
    elseif($this->fonte_origem == 'fin_conta_interna')
    {
      return null;
    }
    else
    {
      return null;
    }
  }

  public function getOrigemCreatedAtAttribute()
  {
    if($this->fonte_origem == 'pdv_vendas_detalhes')
    {
      return optional($this->skfmwuorwmlpdlm)->created_at;
    }
    elseif($this->fonte_origem == 'pdv_vendas_pagamentos')
    {
      return optional($this->aiuwlwqelejqone)->created_at;
    }
    elseif($this->fonte_origem == 'fin_lancamentos')
    {
      return optional($this->fsoljswufheuens)->created_at;
    }
    elseif($this->fonte_origem == 'fin_conta_interna')
    {
      return null;
    }
    else
    {
      return null;
    }
  }


// MUTATORS         ===========================================================================================
// public function setValorAttribute($value)
// {
//   $this->attributes['valor'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
// }

// public function setPercentualAttribute($value)
// {
//   $this->attributes['percentual'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
// }

// MÉTODOS          ===========================================================================================

}