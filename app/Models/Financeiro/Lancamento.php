<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Financeiro\Banco;
use App\Models\Financeiro\ContaInterna as DBContaInterna;
use App\Models\Atendimento\Pessoa;
use App\Models\Configuracao\FormaPagamento;
use App\Models\Contabilidade\ContaContabil as DBContaContabil;
use App\Models\Contabilidade\DRE as DBDRE;
use App\Models\PDV\Caixa as DBCaixa;

class Lancamento extends Model
{
	use SoftDeletes;

  public $timestamps = true;

  protected $table      = 'fin_lancamentos';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'tipo',
    'id_banco',
    'id_conta',
    'num_documento',
    'id_cliente',
    'informacao',
    'vlr_bruto',
    'vlr_dsc_acr',
    'vlr_final',
    'parcela',
    'id_forma_pagamento',
    'descricao',
    'dt_vencimento',
    'dt_quitacao',
    'dt_competencia',
    'dt_confirmacao',
    'id_usuario_lancamento',
    'id_usuario_confirmacao',
    'id_caixa',
    'id_lancamento_origem',
    'origem',
    'status',
    'centro_custo',
    'dt_pagamento',
    'dt_recebimento',
  ];


  // AUXILIARES              ===========================================================================================
  public static function procurar($pesquisa)
  {
    return empty($pesquisa)
    ? static::query()
    : static::query()->where('informacao', 'LIKE', '%'.$pesquisa.'%')
                     ->orWhere('id', 'LIKE', '%'.$pesquisa.'%');
  }

// ================================================================================================================= RELACIONAMENTOS
  public function yaapdycfbplzkeg()
  {
    return $this->belongsTo(Banco::class, 'id_banco', 'id');
  }

  public function qexgzmnndqxmyks()
  {
    return $this->belongsTo(Pessoa::class, 'id_cliente', 'id')->withTrashed();
  }

  public function qlwiqwuheqlefkd()
  {
    return $this->belongsTo(DBContaContabil::class, 'id_conta', 'id')->withTrashed();
  }

  public function PDVCaixas()
  {
    return $this->belongsTo(DBCaixa::class, 'id_caixa', 'id');
  }

  public function AtdUsuariosLancador()
  {
    return $this->belongsTo(Pessoa::class, 'id_usuario_lancamento', 'id')->withTrashed();
  }

  public function AtdUsuariosConfirmador()
  {
    return $this->belongsTo(Pessoa::class, 'id_usuario_confirmacao', 'id')->withTrashed();
  }

  public function ueifnsjfwefnskd()
  {
    return $this->hasOne(FormaPagamento::class, 'id', 'id_forma_pagamento');
  }

  public function svlkjakslfksljd()
  {
    return $this->hasmany(ContaInterna::class, 'id_destino', 'id');
  }

  public function ewifjiosdnoidwm()
  {
    return $this->hasMany(ContaInterna::class, 'id_origem', 'id');
  }

  public function oerifjijdsaisau()
  {
    return $this->hasMany(Lancamento::class, 'id_lancamento_origem', 'id');
  }

  public function lkerjelwijreowg()
  {
    return $this->hasOneThrough(
      DBDRE::class,                   // Model Alvo
      DBContaContabil::class,         // Model Através
      'id_dre',                     // Chave estrangeira na model Através ...
      'id',                         // Chave estrangeira na model Alvo...
      'id_conta',                   // Chave principal na model que estou...
      'id');                        // Chave principal na model Através...
  }

// ================================================================================================================= MÉTODOS

  // ================================================================================================================= ATRIBUTOS (Nomes)
  public function getSaldoFinalAttribute()
  {
    $saldo_final =
                 - $this->where('tipo', 'S')->sum('vlr_final')
                 + $this->where('tipo', 'E')->sum('vlr_final')
                 + $this->where('tipo', 'T')->sum('vlr_final');

    return $saldo_final;
  }

  public function getColorAttribute()
  {
    switch ($this->tipo)
    {
      case 'D':
        return 'danger';
        break;
      case 'R':
        return 'success';
        break;
      case 'T':
        return 'warning';
        break;
      default:
        return 'default';
        break;
    }
  }

  
  public function getCorStatusAttribute()
  {
    switch ($this->status)
    {
      case 'Em aberto':
        return [
          'cor'    => '#ffc107',
          'editar' => 'true'
        ];
        break;
      
      case 'Finalizada':
        return [
          'cor'    => '#198754',
          'editar' => 'false'
        ];
        break;

      case 'Confirmado':
        return [
          'cor'    => 'yellowgreen',
          'editar' => 'false'
        ];
        break;

      case 'Validado':
        return [
          'cor'    => 'brown',
          'editar' => 'false'
        ];
        break;
      
      default:
        return '#212529';
        break;
    }
  }

  public function getClasseContaAttribute()
  {
    if($this->qlwiqwuheqlefkd->nivel == 2)
    {
      return $this->qlwiqwuheqlefkd->klajlksdjalkewq->klajlksdjalkewq->id;
    }
    elseif($this->qlwiqwuheqlefkd->nivel == 1)
    {
      return $this->qlwiqwuheqlefkd->klajlksdjalkewq->id;
    }
    elseif($this->qlwiqwuheqlefkd->nivel == 0)
    {
      return $this->qlwiqwuheqlefkd->id;
    }
    else
    {
      dd(222, $this->qlwiqwuheqlefkd->nivel, $this->qlwiqwuheqlefkd->klajlksdjalkewq->id);
    }
  }
  // public function getFormaPagamentoAttribute($value)
  // {
  //   $nome = FormaPagamento::find($value)->forma;

  //   return $nome;
  // }

  
  protected static function boot()
  {
    parent::boot();

    static::deleting(function ($lancamento)
    {
      switch ($lancamento->origem)
      {
        case 'fin_conta_interna':
          $lancamento->
            svlkjakslfksljd()->
            each(function ($item)
            {
              $item->update([
                              'status'        => 'Em aberto',
                              'dt_quitacao'   => null,
                              'id_destino'    => null,
                              'fonte_destino' => null,
                            ]);
            });
          break;
                
        case 'fin_lancamento':
          $lancamento->
            oerifjijdsaisau()->
            delete();
          break;
                
        case 'fin_conta_interna_vale':
          $lancamento->
            ewifjiosdnoidwm()->
            delete();
          break;
                
        default:
          // dd(32562665468);
          return '#212529';
          break;
      }
    });
  }

  // SCOPES =================================================================================================================

  public function scopeDoMeuCaixaAberto(Builder $query)
  {
    if(isset(auth()->user()->abcdefghijklmno) && auth()->user()->abcdefghijklmno)
    {
      $query->where('id_caixa', '=', auth()->user()->abcdefghijklmno->id);
    }
  }
}
  