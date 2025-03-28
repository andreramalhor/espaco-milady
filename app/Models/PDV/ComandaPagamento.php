<?php

namespace App\Models\PDV;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata) 
use Carbon\Carbon;                                    //Se for usar tempo, timestamp, fuso-horário, função NOW

use App\Models\PDV\Comanda;
use App\Models\PDV\ComandaDetalhe;
// use App\Models\Gerenciamento\FormaPagamento;
use App\Models\Configuracao\FormaPagamento;
use App\Models\Financeiro\ContaInterna;
use App\Models\Financeiro\RecebimentoCartao;

class ComandaPagamento extends Model
{
  use Notifiable;                                     //Se for usar Notifiable (ainda nao sei do q se trata) 

  public $timestamps    = true; // or true
  protected $table      = 'pdv_vendas_pagamentos';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'id_venda',
    'id_forma_pagamento',
    'descricao',
    'parcela',
    'valor',
    'status',
    'dt_prevista',
    'created_at',
    'updated_at',
    'deleted_at',
  ];

// RELACIONAMENTOS  ===========================================================================================
  public function yshghlsawerrgvd()
  {
    return $this->belongsTo(Comanda::class, 'id_venda', 'id' );
  }
  
  public function qmbnkthuczqdsdn()
  {
    return $this->belongsTo(FormaPagamento::class, 'id_forma_pagamento', 'id' );
  }

  public function pqwnldkwjfencsb()
  {
    // return $this->hasOne(ContaInterna::class, 'id_origem', 'id');
    return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('fonte_origem', with(new static)->getTable());
  }

  public function fjwlfkjalpdwepf()
  {
    return $this->hasOne(RecebimentoCartao::class, 'id_pagamento', 'id');
  }

  public function kfwejkahdwqbsal()
  {
    return $this->hasManyThrough(
      Caixa::class, 
      Comanda::class, 
      'id', 
      'id', 
      'id_venda', 
      'id_caixa');
  }

// MÉTODOS          ===========================================================================================
  public static function boot()
  {
    parent::boot();
    self::deleting(function($comanda_pagamento)
    {
      // before delete() method call this
      $comanda_pagamento->fjwlfkjalpdwepf()->each(function($recebimento_futuro)
      {
        $recebimento_futuro->delete();
      });

      $comanda_pagamento->pqwnldkwjfencsb()->each(function($conta_interna)
      {
        $conta_interna->delete(); // <-- direct deletion
      });

      $comanda_pagamento->fjwlfkjalpdwepf()->each(function($conta_interna)
      {
        $conta_interna->delete(); // <-- direct deletion
      });
    });
  }
  
// ATRIBUTOS        ===========================================================================================
  // public function getFormaPagamentoAttribute($value)
  // {
  //   $nome = FormaPagamento::find($value)->forma;

  //   return $nome;
  // }
}
