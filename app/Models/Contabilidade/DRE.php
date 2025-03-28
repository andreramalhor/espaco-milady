<?php

namespace App\Models\Contabilidade;

use Illuminate\Database\Eloquent\Model;

use App\Models\Contabilidade\ContaContabil;
use App\Models\Financeiro\Lancamento;

class DRE extends Model
{
  public $timestamps   = false;

  protected $table      = 'ger_dre';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'grupo', 
    'ordem', 
    'nivel', 
    'titulo', 
    'tipo', 
    'ativo', 
  ];
  protected $appends = [
    
  ];

  // ativo = sim ou nao
  // tipo = (+) Receita, (-) Despesa ou (=) Totalizador
  
  // RELACIONAMENTOS  ===========================================================================================
  public function dfsflkeoerwrrgf()
  {
    return $this->hasMany(ContaContabil::class, 'id_dre', 'id');
  }

  public function ealkjerwqlejwej()
  {
    return $this->hasManyThrough(
      Lancamento::class,            // Model Alvo
      ContaContabil::class,         // Model Através
      'id_dre',                     // Chave estrangeira na model Através ...
      'id_conta',                   // Chave estrangeira na model Alvo...
      'id',                         // Chave principal na model que estou...
      'id');                        // Chave principal na model Através...
  }
  // MÉTODOS          ===========================================================================================


  // FUNCOES ESTATICAS        ===========================================================================================


  // ATRIBUTOS        ===========================================================================================


  // FUNCIOES SECUNDARIAS =======================================================================================
  public static function boot()
  {
    parent::boot();
    
    static::deleted(function ($conta)
    {
      if($conta->jfsdlfeofwepokf->count() > 0)
      {
        $conta->jfsdlfeofwepokf()->update(['id_conta' => $conta->conta_pai ?? null]);
      }
    });
  }
}