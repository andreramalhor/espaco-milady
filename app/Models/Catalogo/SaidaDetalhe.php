<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata)
use Carbon\Carbon;                                    //Se for usar tempo, timestamp, fuso-horário, função NOW

use App\Models\Atendimento\Pessoa;
use App\Models\Catalogo\ServicoProduto;
use App\Models\Catalogo\ContaInterna;

class SaidaDetalhe extends Model
{
  use Notifiable;                                     //Se for usar Notifiable (ainda nao sei do q se trata)

  public $timestamps    = true; // or true
  protected $table      = 'est_saidas_detalhes';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'id_saida',
    'id_servprod',
    'qtd',
    'vlr_saida',
    'vlr_negociado',
    'vlr_dsc_acr',
    'vlr_final',
    'status',
  ];

    // ================================================================================================================= RELACIONAMENTOS
    public function aldkekciajsgqwp()
    {
        return $this->belongsTo(Saida::class, 'id_saida', 'id' );
    }

    public function odkqoweiwoeiowj()
    {
        return $this->belongsTo(Produto::class, 'id_servprod', 'id' )->withTrashed();
    }

    public function CatalogoProfissionaisSaidasDetalhes()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id' );
    }

    public function pqwnldkwjfencsb()
    {
        // dd($this->hasOne(ContaInterna::class, 'id_origem', 'id'));
        // return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('fonte_origem', with(new static)->getTable());
        // dd($this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('fonte_origem', with(new static)->getTable()));
        return $this->hasOne(ContaInterna::class, 'id_origem', 'id' );
        // return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('tipo', 'Comissão');
    }


    // public function setVlrSaidaAttribute($value)
    // {
    //     $this->attributes['vlr_saida'] = $value / 100;
    // }

    // public function setVlrNegociadoAttribute($value)
    // {
    //     $this->attributes['vlr_negociado'] = $value / 100;
    // }

    // public function setVlrDscAcrAttribute($value)
    // {
    //     $this->attributes['vlr_dsc_acr'] = $value / 100;
    // }

    // public function setVlrFinalAttribute($value)
    // {
    //     $this->attributes['vlr_final'] = $value / 100;
    // }

//   public static function boot()
//   {
//     parent::boot();
//     self::deleting(function($saida_detalhe)
//     {
//       $saida_detalhe->pqwnldkwjfencsb()->each(function($conta_interna)
//       {
//         $conta_interna->delete();
//       });
//     });
//   }
    // AUXILIARES       ===========================================================================================
    public static function procurar($pesquisa)
    {
      return empty($pesquisa)
      ? static::query()
      : static::query()->where('nome', 'LIKE', '%'.$pesquisa.'%')
                       ->orWhere('id', 'LIKE', '%'.$pesquisa.'%');
    }

}
