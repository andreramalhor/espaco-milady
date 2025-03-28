<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletes;         //Se for usar coluna DELETED_AT no banco de dados
use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata) 
use Carbon\Carbon;                                    //Se for usar tempo, timestamp, fuso-horário, função NOW

use App\Models\PDV\Comanda;
use App\Models\PDV\ComandaPagamento;
use App\Models\Configuracao\FormaPagamento;
use App\Models\Financeiro\Banco;

class RecebimentoCartao extends Model
{
  // use SoftDeletes;
  use Notifiable;                                 		//Se for usar Notifiable (ainda nao sei do q se trata) 

  public $timestamps = true;


  protected $table      = 'fin_recebimentos_cartoes';
  protected $primaryKey = 'id';
  protected $fillable = [
    'id_pagamento',
    'id_forma_pagamento',
    'vlr_real',
    'prc_descontado',
    'vlr_final',
    'vlr_taxa_antecipado',
    'vlr_antecipado',
    'dt_prevista',
    'dt_quitacao',
    'status',
    'id_banco',
    'id_lancamento',
    'origem_lancamento',
    'id_caixa',
  ];

  // REGRAS  ===========================================================================================
  public function setStatusAttribute($value)
  {
    $allowedStatuses = ['Aguardando', 'Antecipado', 'Confirmado', 'Erro'];
    
    if (in_array($value, $allowedStatuses))
    {
      $this->attributes['status'] = $value;
    }
    else
    {
      // Você pode lançar uma exceção, registrar um erro ou simplesmente ignorar o valor inválido.
      throw new \Exception("Status inválido: " . $value);
    }
  }
  
  // RELACIONAMENTOS  ===========================================================================================
  public function hthgoawwqzbxhdh()
  {
    return $this->belongsTo(ComandaPagamento::class, 'id_pagamento', 'id');
  }

  public function qjslcnhfdjsftre()
  {
    return $this->hasOneThrough(
      Venda::class,             // Model Alvo
      ComandaPagamento::class,    // Model intermediaria
      'id',                     // Chave da tabela intermediaria que liga com a que eu estou ...
      'id',                     // Chave da tabela alvo que liga na tabela intermediaria...
      'id_pagamento',           // Chave local da tabela que estou...
      'id_venda');              // Chave da tabela intermediaria que liga com a tabela alvo ...
  }

  public function gevmgwjvzgdexwm()
  {
    return $this->belongsTo(FormaPagamento::class, 'id_forma_pagamento', 'id' );
  }

  public function eriuwhfiwhcasod()
  {
    return $this->belongsTo(Banco::class, 'id_banco', 'id' );
  }
  
  // MUTATORS         ===========================================================================================
  public function getColorAttribute()
  {
    switch ($this->status)
    {
      case 'Aguardando':
        return 'warning';
        break;
      case 'Antecipado':
        return 'primary';
        break;
      case 'Confirmado':
        return 'success';
        break;
      case 'Erro':
        return 'danger';
        break;
        
      default:
        return 'dafault';
        break;
    }
  }

  // MÉTODOS          ===========================================================================================
}
