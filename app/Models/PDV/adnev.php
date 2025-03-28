<?php

namespace App\Models\PDV;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;              //Se for usar Notifiable (ainda nao sei do q se trata) 

use App\Models\Atendimento\Pessoa;
use App\Models\PDV\Caixa;
use App\Models\PDV\ComandaDetalhe;
use App\Models\PDV\ComandaPagamento;
use App\Models\Financeiro\ContaInterna;
use App\Models\Financeiro\RecebimentoCartao;
use App\Models\Configuracao\FormaPagamento;

class adnev extends Model
{
  use Notifiable;                                 		//Se for usar Notifiable (ainda nao sei do q se trata) 
 
  public $timestamps    = true;
  protected $table      = 'pdv_vendas';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'id_caixa', 
    'id_usuario', 
    'id_cliente', 
    'qtd_produtos', 
    'vlr_prod_serv', 
    'vlr_negociado', 
    'vlr_dsc_acr', 
    'vlr_final', 
    'status',
  ];

  // ================================================================================================================= RELACIONAMENTOS
  public function lufqzahwwexkxli()
  {
    return $this->belongsTo(Pessoa::class, 'id_cliente', 'id')->withTrashed();
  }
  
  public function opadsiwmeqwiiwe()
  {
    return $this->belongsTo(Caixa::class, 'id_caixa', 'id');    
  }

  public function dfyejmfcrkolqjh()
  {
    return $this->hasMany(ComandaDetalhe::class, 'id_venda', 'id');
  }

  public function xzxfrjmgwpgsnta()
  {
    return $this->hasMany(ComandaPagamento::class, 'id_venda', 'id');    
  }

  public function kdebvgdwqkqnwqk()
  {
    return $this->hasManyThrough(
      ContaInterna::class,          // Model Alvo
      ComandaDetalhe::class,          // Model Através
      'id_venda',
      'id_origem',
      'id',
      'id')->where('fonte_origem', '=', 'pdv_vendas_detalhes');
  }

  // public function fewoigwndqwodsn()  // IGUAL AO DE CIMA, PORÉM NÃO TEM O WHERE VERIFICAR SE VAI DAR ERRO CASO USE SOMENTE 1
  // {
  //   return $this->hasManyThrough(
  //     ContaInterna::class,
  //     ComandaDetalhe::class,
  //     'id_venda',
  //     'id_origem',
  //     'id',
  //     'id');
  // }

  public function afewfefuwoenoei()
  {
    return $this->hasManyThrough(
      FormaPagamento::class,       // Model Alvo
      ComandaPagamento::class,        // Model Através
      'id_venda',
      'id',
      'id',
      'id_forma_pagamento');
  }

  public function snfbexhswnenrks()
  {
    return $this->hasManyThrough(
      ContaInterna::class,
      ComandaPagamento::class,
      'id_venda',
      'id_origem',
      'id',
      'id')->where('fonte_origem', '=', 'pdv_vendas_pagamentos');
  }
  
  public function skjasklruwrkwej()
  {
    return $this->hasManyThrough(
      RecebimentoCartao::class,
      ComandaPagamento::class,
      'id_venda',
      'id_pagamento',
      'id',
      'id');
  }

  public function askldalskdjaskl()
  {
    return $this->xzxfrjmgwpgsnta()->sum('valor');
  }

  // ================================================================================================================= MUTATORS
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
      
      default:
        return '#212529';
        break;
    }
  }
  

// ================================================================================================================= MÉTODOS

public static function boot()
{
  parent::boot();

  self::deleting(function($comanda)
  {
    // before delete() method call this
    $comanda->kdebvgdwqkqnwqk()->each(function($conta_interna_comissao)
    {
      $conta_interna_comissao->delete();
    });
    
    $comanda->snfbexhswnenrks()->each(function($conta_interna_pagamento)
    {
      $conta_interna_pagamento->delete();
    });
    
    $comanda->skjasklruwrkwej()->each(function($recebimento_futuro)
    {
      $recebimento_futuro->delete();
    });

    // CRIAR CONEXAO DE AGENDAMENTO COM COMANDA... SE OS AGENDAMENTOS FOREM NESSA COMANDA, REVERTER QUANDO EXCLUI-LA. VERIFICAR SE A OPÇÃO DE CONECTAR O AGENDAMENTO AO DETALHE É MELHOR
    // $comanda->sdsovjpiwqensak()->each(function($agendamento)
    // {
    //   dd(111);
    //   $agendamento->delete();
    // });
    
    $comanda->dfyejmfcrkolqjh()->each(function($detalhe)
    {
      $detalhe->delete();
    });

    $comanda->xzxfrjmgwpgsnta()->each(function($pagamento)
    {
      $pagamento->delete();
    });
  });
}
// ================================================================================================================= ATRIBUTOS (Nomes)

}
