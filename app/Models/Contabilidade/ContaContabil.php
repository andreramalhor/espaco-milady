<?php

namespace App\Models\Contabilidade;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;         //Se for usar coluna DELETED_AT no banco de dados

use App\Models\Contabilidade\DRE;
use App\Models\Financeiro\Lancamento;
use App\Models\PDV\ComandaDetalhe;

class ContaContabil extends Model
{
  use SoftDeletes;                                    //Se for usar coluna DELETED_AT no banco de dados
  public $timestamps   = true;

  protected $table      = 'con_plano_contas';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'id_empresa',
    'nivel',
    'conta',
    'titulo',
    'conta_pai',
    'imprime',
    'soma',
    'tem_lancamento',
    'conta_final',
    'id_dre',
    'destino_lancamento',
  ];
  protected $appends = [
    'nova_conta',
    'novo_nivel',
    'soma_filhos',
    'saldo_conta',
    'saldo_total',
  ];
  
  // RELACIONAMENTOS  ===========================================================================================
  public function klajlksdjalkewq() // MÃE
  {
    return $this->hasOne(ContaContabil::class, 'id', 'conta_pai');
  }

  public function sasjiqelrhwkejs() // FILHOS
  {
    return $this->hasMany(ContaContabil::class, 'conta_pai', 'id');
  }
  
  public function jfsdlfeofwepokf()
  {
    return $this->hasMany(Lancamento::class, 'id_conta', 'id');
  }

  public function lancamentos_somados()
  {
    switch ($this->destino_lancamento)
    {
      case 'fin_lancamentos':
        return Lancamento::where('id_conta', '=', $this->id)->get();
        return $this->hasMany(Lancamento::class, 'id_conta', 'id');
        break;
        
      case 'pdv_vendas_detalhes':
        if( $this->id == 4 )
        {
          return ComandaDetalhe::
                                whereHas('kcvkongmlqeklsl', function ($query)
                                {
                                  $query->where('tipo', 'Serviço');
                                })->
                                get();
        }
        elseif( $this->id == 5 )
        {
          return ComandaDetalhe::
                                whereHas('kcvkongmlqeklsl', function ($query)
                                {
                                  $query->where('tipo', 'Produto');
                                })->
                                get();
        }
        elseif( $this->id == 63 )
        {
          return ComandaDetalhe::
                                whereHas('kcvkongmlqeklsl', function ($query)
                                {
                                  $query->where('tipo', '!=', 'Serviço')->where('tipo', '!=', 'Produto');
                                })->
                                get();
        }
        else
        {
          return Lancamento::where('id_conta', '=', $this->id)->get();
        }
        break;
        
      default:
        return Lancamento::where('id_conta', '=', $this->id)->get();
        break;
    }
  }

  public function feoiuroqweiopwe()
  {
    return $this->hasOne(DRE::class, 'id', 'id_dre');
  }

  // MÉTODOS          ===========================================================================================
  public function getNovaContaAttribute()
  {
    $niv_F = str_pad(optional(optional(optional(optional(optional($this->klajlksdjalkewq)->klajlksdjalkewq)->klajlksdjalkewq)->klajlksdjalkewq)->klajlksdjalkewq)->id , 3 , '0' , STR_PAD_LEFT);
    $niv_E = str_pad(optional(optional(optional(optional($this->klajlksdjalkewq)->klajlksdjalkewq)->klajlksdjalkewq)->klajlksdjalkewq)->id , 3 , '0' , STR_PAD_LEFT);
    $niv_D = str_pad(optional(optional(optional($this->klajlksdjalkewq)->klajlksdjalkewq)->klajlksdjalkewq)->id , 3 , '0' , STR_PAD_LEFT);
    $niv_C = str_pad(optional(optional($this->klajlksdjalkewq)->klajlksdjalkewq)->id , 3 , '0' , STR_PAD_LEFT);
    $niv_B = str_pad(optional($this->klajlksdjalkewq)->id , 3 , '0' , STR_PAD_LEFT);
    $niv_A = str_pad($this->id , 3 , '0' , STR_PAD_LEFT);
    
    if ($niv_A == '00')
    {
      return '';
    }
    else if ($niv_B == '00')
    {
      return $niv_A;
    }
    else if ($niv_C == '00')
    {
      return $niv_B.'.'.$niv_A;
    }
    else if ($niv_D == '00')
    {
      return $niv_C.'.'.$niv_B.'.'.$niv_A;
    }
    else if($niv_E == '00')
    {
      return $niv_D.'.'.$niv_C.'.'.$niv_B.'.'.$niv_A;
    }
    else if ($niv_F == '00')
    {
      return $niv_E.'.'.$niv_D.'.'.$niv_C.'.'.$niv_B.'.'.$niv_A;
    }
    else
    {
      return $niv_F.'.'.$niv_D.'.'.$niv_C.'.'.$niv_B.'.'.$niv_A;
    }
  }
 
  public function getNovoNivelAttribute()
  {
    return $this->gerar_demonstrativo_plano_contas($this);
  }

  public function gerar_demonstrativo_plano_contas($contas_contabeis)
  {
    $html = 1;

    foreach ($contas_contabeis as $item)
    {
      if(!empty($item->sasjiqelrhwkejs))
      {
        $html = $html + gerar_demonstrativo_plano_contas($item->sasjiqelrhwkejs);
        // $html .= gerar_demonstrativo_plano_contas($item->sasjiqelrhwkejs);
      }
    }

    return $html;
  }
 
  public function getSaldoContaAttribute()
  {
    return $this->jfsdlfeofwepokf()->sum('vlr_final');
  }

  public function saldoTotal($periodoInicial = null, $periodoFinal = null)
  {
    // Inicializa o saldo total com o valor da conta atual
    // $saldoTotal = $this->saldo_conta;
    $saldoTotal = 0;

    // Consulta para obter os lançamentos do período
    $lancamentos = $this->lancamentos_somados();

    // Aplica os filtros de data, se os períodos forem informados
    if ($periodoInicial && $periodoFinal)
    {
      $lancamentos = $lancamentos->whereBetween('created_at', [$periodoInicial, $periodoFinal]);
    }
    
    // Soma os valores dos lançamentos filtrados
    $saldoTotal += $lancamentos->sum('vlr_final');
    
    // Verifica se a conta tem filhos
    if ($this->sasjiqelrhwkejs->count() > 0)
    {
      // Percorre todos os filhos e soma os saldos totais de cada um
      foreach ($this->sasjiqelrhwkejs as $filho)
      {
        $saldoTotal += $filho->saldoTotal($periodoInicial, $periodoFinal);
      }
    }
    
    return $saldoTotal;
  }

  public function getSomaFilhosAttribute()
  {
    return $this->
                  jfsdlfeofwepokf()->
                  when($dia, function ($query) use ($dia)
                  {
                    return $query->whereDay('dt_lancamento', $dia);
                  })->
                  when($mes, function ($query) use ($mes)
                  {
                    return $query->whereMonth('dt_lancamento', $mes);
                  })->
                  when($ano, function ($query) use ($ano)
                  {
                    return $query->whereYear('dt_lancamento', $ano);
                  })->
                  sum('vlr_final');
            
  }

  public function somaFilhosRecursiva($inicio, $final)
  {
    dd($this->tem_filhos(), $this->saberSaldoConta($inicio, $final));
    $soma = $this->
                sasjiqelrhwkejs()->
                whereBetween('created_at', [$inicio, $final])->
                where('soma', 'Sim')->
                sum('valor_a_ser_somado');
    
    foreach ($this->sasjiqelrhwkejs as $filho)
    {
      $soma += $filho->somaFilhosRecursiva($inicio, $final);
    }
    
    return $soma;
  }
  
  // FUNCOES ESTATICAS        ===========================================================================================

  // ATRIBUTOS        ===========================================================================================
  public function saberSaldoContaFilho($inicio, $final)
  {
    $soma_nivel_1 = 0;
    $soma_nivel_2 = 0;
    $soma_nivel_3 = 0;
    $soma_nivel_4 = 0;
    $soma_nivel_5 = 0;
    
    if($this->nivel == 0)
    {
      foreach ($this->sasjiqelrhwkejs as $key => $value)
      {
        if($this->nivel == 1)
        {
          foreach ($this->sasjiqelrhwkejs as $key => $value)
          {
            if($this->nivel == 2)
            {
              foreach ($this->sasjiqelrhwkejs as $key => $value)
              {
                if($this->nivel == 3)
                {
                  foreach ($this->sasjiqelrhwkejs as $key => $value)
                  {
                    if($this->nivel == 4)
                    {
                      foreach ($this->sasjiqelrhwkejs as $key => $value)
                      {
                        if($this->nivel == 5)
                        {
                          foreach ($this->sasjiqelrhwkejs as $key => $value)
                          {
                            dd(9999);
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }


  public function tem_filhos()
  {
    dd($this->sasjiqelrhwkejs->sum('id'));
  }

  public function saberSaldoConta($inicio, $final)
  {
    switch($this->destino_lancamento)
    {
      case 'fin_lancamentos':
        return Lancamento::
                            whereBetween('created_at', [ $inicio, $final ])->
                            where('id_conta', '=', $this->id)->
                            sum('vlr_final');
        break;
        
      case 'pdv_vendas_detalhes':
        if( $this->id == 4 )
        {
          return ComandaDetalhe::
                                  whereBetween('created_at', [ $inicio, $final ])->
                                  whereHas('kcvkongmlqeklsl', function ($query)
                                  {
                                    $query->where('tipo', 'Serviço');
                                  })->
                                  sum('vlr_final');
        }
        elseif( $this->id == 5 )
        {
          return ComandaDetalhe::
                                  whereBetween('created_at', [ $inicio, $final ])->
                                  whereHas('kcvkongmlqeklsl', function ($query)
                                  {
                                    $query->where('tipo', 'Produto');
                                  })->
                                  sum('vlr_final');
        }
        else
        {
          return ComandaDetalhe::
                                  whereBetween('created_at', [ $inicio, $final ])->
                                  whereHas('kcvkongmlqeklsl', function ($query)
                                  {
                                    $query->where('tipo', '!=', 'Serviço')->where('tipo', '!=', 'Produto');
                                  })->
                                  sum('vlr_final');
        }
        break;
        
    //   case 1:
    //     // dd('destino receitas');
    //     break;
        
    //   case 2:
    //     // dd('destino despesas');
    //     break;
        
    //   case 3:
    //     // dd('destino transferencias');
    //     break;
        
    //   default:
    //     dd($this->conta->destino_lancamento);
    //     break;
    }  
  }

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