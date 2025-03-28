<?php

namespace App\Models\PDV;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata) 
use Carbon\Carbon;                                    //Se for usar tempo, timestamp, fuso-horário, função NOW

use App\Models\Atendimento\Pessoa;
use App\Models\Atendimento\Agendamento;
use App\Models\Catalogo\ServicoProduto;
use App\Models\Catalogo\Servico;
use App\Models\Catalogo\Produto;
use App\Models\Financeiro\ContaInterna;

class adnevDetalhe extends Model
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
  protected $appends = [
    'tiposervprod',
  ];
    
// ================================================================================================================= RELACIONAMENTOS
  public function sbbgaqleesuzlus()
  {
    return $this->belongsTo(Venda::class, 'id_venda', 'id' );
  }

  public function kcvkongmlqeklsl()
  {
    return $this->belongsTo(ServicoProduto::class, 'id_servprod', 'id' )->withTrashed();
  }

  public function vekwjqowidskjsd()
  {
    return $this->hasOneThrough(
      Pessoa::class,            // Model Alvo
      Venda::class,             // Model intermediaria
      'id',                     // Chave da tabela intermediaria que liga com a que eu estou ...
      'id',                     // Chave da tabela alvo que liga na tabela intermediaria...
      'id_venda',               // Chave local da tabela que estou...
      'id_cliente')->withTrashed();            // Chave da tabela intermediaria que liga com a tabela alvo ...
  }
  
  public function csoiwjeirwifjed()
  {
    return $this->hasOneThrough(
      Caixa::class,             // Model Alvo
      Venda::class,             // Model intermediaria
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
  
  public function hgihnjekboyabez()
  {
    return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('fonte_origem', with(new static)->getTable());
    // return $this->hasOne(ContaInterna::class, 'id_origem', 'id');
    // return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('fonte_origem', with(new static)->getTable()));
    // return $this->hasOne(ContaInterna::class, 'id_origem', 'id')->where('tipo', 'Comissão');
  }
  
  // MUTATORS         ===========================================================================================
  public function getTiposervprod()
  {
    return $this->kcvkongmlqeklsl->tipo;
  }


  // BOOT         ===========================================================================================
  public static function boot()
  {
    parent::boot();
    
    self::deleting(function($venda_detalhe)
    {
      $venda_detalhe->hgihnjekboyabez()->each(function($conta_interna)
      {
        $conta_interna->delete();
      });
      
      $venda_detalhe->aklfgdfkofedsad()->each(function($agendamento)
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
