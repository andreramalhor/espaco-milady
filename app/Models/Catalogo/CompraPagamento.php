<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;         //Se for usar coluna DELETED_AT no banco de dados
use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata)
use Carbon\Carbon;                                    //Se for usar tempo, timestamp, fuso-horário, função NOW

use App\Models\Catalogo\Compra;
use App\Models\Catalogo\CompraDetalhe;
use App\Models\Gerenciamento\FormaPagamento;

class CompraPagamento extends Model
{
  use SoftDeletes;                                    //Se for usar coluna DELETED_AT no banco de dados
  use Notifiable;                                     //Se for usar Notifiable (ainda nao sei do q se trata)

  public $timestamps    = true; // or true
  protected $table      = 'fin_compras_pagamentos';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'id_compra',
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
  public function CatalogoComprasComprasPagamentos()
  {
    return $this->belongsTo(Compra::class, 'id_compra', 'id' );
  }

  public function CatalogoFormasPagamentosComprasPagamentos()
  {
    return $this->belongsTo(FormaPagamento::class, 'id_forma_pagamento', 'id' );
  }

// MÉTODOS          ===========================================================================================


// ATRIBUTOS        ===========================================================================================
  // public function getFormaPagamentoAttribute($value)
  // {
  //   $nome = FormaPagamento::find($value)->forma;

  //   return $nome;
  // }
      // AUXILIARES       ===========================================================================================
      public static function procurar($pesquisa)
      {
        return empty($pesquisa)
        ? static::query()
        : static::query()->where('nome', 'LIKE', '%'.$pesquisa.'%')
                         ->orWhere('id', 'LIKE', '%'.$pesquisa.'%');
      }

}
