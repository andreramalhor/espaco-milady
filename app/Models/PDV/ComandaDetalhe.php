<?php

namespace App\Models\PDV;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata) 
use Carbon\Carbon;                                    //Se for usar tempo, timestamp, fuso-horário, função NOW

use App\Models\Atendimento\Pessoa;
use App\Models\Atendimento\Agendamento;
use App\Models\Catalogo\ServicoProduto;
use App\Models\Financeiro\ContaInterna;

class ComandaDetalhe extends Model
{
  use Notifiable;                                     //Se for usar Notifiable (ainda nao sei do q se trata) 

  public $timestamps    = true; // or true
  protected $table      = 'pdv_vendas_detalhes';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'id_venda',
    'id_servprod',
    'quantidade',
    'vlr_venda',
    'vlr_negociado',
    'vlr_dsc_acr',
    'vlr_final',
    'obs',
    'status',
    'id_agendamento',
  ];

// ================================================================================================================= RELACIONAMENTOS
  public function sbbgaqleesuzlus()
  {
    return $this->belongsTo(Comanda::class, 'id_venda', 'id' );
    // return $this->belongsTo(Comanda::class, 'id_venda', 'id' )->withTrashed();
  }

  public function kcvkongmlqeklsl()
  {
    return $this->belongsTo(ServicoProduto::class, 'id_servprod', 'id' )->withTrashed();
  }


  public function vekwjqowidskjsd()
  {
    return $this->hasOneThrough(
      Pessoa::class,            // Model Alvo
      Comanda::class,             // Model intermediaria
      'id',                     // Chave da tabela intermediaria que liga com a que eu estou ...
      'id',                     // Chave da tabela alvo que liga na tabela intermediaria...
      'id_venda',               // Chave local da tabela que estou...
      'id_cliente')->withTrashed();            // Chave da tabela intermediaria que liga com a tabela alvo ...
  }
  
  public function csoiwjeirwifjed()
  {
    return $this->hasOneThrough(
      Caixa::class,             // Model Alvo
      Comanda::class,             // Model intermediaria
      'id',                     // Chave da tabela intermediaria que liga com a que eu estou ...
      'id',                     // Chave da tabela alvo que liga na tabela intermediaria...
      'id_venda',               // Chave local da tabela que estou...
      'id_caixa');              // Chave da tabela intermediaria que liga com a tabela alvo ...
  }
  
  public function flielwjewjdasld()
  {
    return $this->hasOneThrough(
      Pessoa::class,            // Model Alvo
      ContaInterna::class,      // Model intermediaria
      'id_origem',              // Chave da tabela intermediaria que liga com a que eu estou ...
      'id',                     // Chave da tabela alvo que liga na tabela intermediaria...
      'id',                     // Chave local da tabela que estou...
      'id_pessoa');             // Chave da tabela intermediaria que liga com a tabela alvo ...
  }

  public function aklfgdfkofedsad()
  {
    return $this->belongsTo(Agendamento::class, 'id_agendamento', 'id' );
  }
  
  public function PDVProfissionaisComandasDetalhes()
  {
    return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id' );
  }

  public function hgihnjekboyabez()
  {
    // return $this->hasOne(ContaInterna::class, 'id_origem', 'id');
    return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('fonte_origem', with(new static)->getTable());
    // dd($this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('fonte_origem', with(new static)->getTable()));
    // return $this->hasOne(ContaInterna::class, 'id_origem', 'id' )->where('fonte_origem', with(new static)->getTable());
    // return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('tipo', 'Comissão');
  }
  
  // MUTATORS         ===========================================================================================
  // public function setVlrComandaAttribute($value)
  // {
  //   $this->attributes['vlr_venda'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
  // }

  // public function setVlrNegociadoAttribute($value)
  // {
  //   $this->attributes['vlr_negociado'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
  // }
  
  // public function setVlrDscAcrAttribute($value)
  // {
  //   $this->attributes['vlr_dsc_acr'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
  // }

  // public function setVlrFinalAttribute($value)
  // {
  //   $this->attributes['vlr_final'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
  // }
// ================================================================================================================= MÉTODOS
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
    
    
    case 'Concluído':
      return [
        'cor'    => '#198754',
        'editar' => 'false'
      ];
      break;
      
    default:
      return '#212529';
      break;
  }
}

  // BOOT         ===========================================================================================
  public static function boot()
  {
    parent::boot();
    
    self::deleting(function($comanda_detalhe)
    {
      $comanda_detalhe->hgihnjekboyabez()->each(function($conta_interna)
      {
        $conta_interna->delete();
      });
      
      $comanda_detalhe->aklfgdfkofedsad()->each(function($agendamento)
      {
        $agendamento->update([
          'id_comanda'       => null,
          'valor'            => null,
          'status'           => 'Agendado',
          'id_venda_detalhe' => null,
          'prc_comissao'     => null,
          'vlr_comissao'     => null,
          ]);
      });
    });
  }
}
