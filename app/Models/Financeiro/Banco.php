<?php

namespace App\Models\Financeiro;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;         //Se for usar coluna DELETED_AT no banco de dados
use Illuminate\Support\Facades\Cache;

// use App\Models\Financeiro\Lancamento;
use App\Models\Financeiro\RecebimentoCartao;
use App\Models\PDV\Caixa;
use App\Models\PDV\ComandaPagamento;

class Banco extends Model
{
	use SoftDeletes;                                    //Se for usar coluna DELETED_AT no banco de dados

  public $timestamps = true;

  protected $table      = 'fin_bancos';
  protected $primaryKey = 'id';
  protected $fillable = [
    'id_empresa',
    'nome',
    'num_banco',
    'num_agencia',
    'num_conta',
    'saldo_inicial',
    'cod_carteira',
    'chave_pix',
    'pix',
  ];
  protected $appends = [
    // 'saldo_atual',
  ];

  // RELACIONAMENTO              ===========================================================================================
  public function poxdnewoçdfhssa()
  {
    dd(1212);
    return $this->hasMany(RecebimentoCartao::class, 'id_banco', 'id');    
  }

  // AUXILIARES              ===========================================================================================
  public static function procurar($pesquisa, $columns = ['nome', 'num_banco', 'num_agencia', 'num_conta', 'id'])
  {
    dd(1212);
    return empty($pesquisa)
            ? static::query()
            : static::query()->where(function ($query) use ($pesquisa, $columns) {
              foreach ($columns as $column)
              {
                $query->orWhere($column, 'LIKE', '%'.$pesquisa.'%');
              }
            });
  }
  
  public static function getSaldo(Banco $banco)
  {
    dd($banco);
    $saldoInicial       = $banco->saldo_inicial;
    $lancamentos        = $this->getLancamentos($banco->id);
    $recebimentosCartao = $this->getRecebimentosCartao($banco->id);

    $despesas               = $lancamentos->sum('vlr_final');
    $receitas               = $lancamentos->sum('vlr_final');
    $transferenciasSaidas   = $lancamentos->sum('vlr_final');
    $transferenciasEntradas = $lancamentos->sum('vlr_final');
    
    return $saldoInicial - $despesas + $receitas - $transferenciasSaidas + $transferenciasEntradas + $recebimentosCartao;
  }

  public static function saldoAte($id, $dt_limite = null)
  {
    $saldoInicial = Banco::find($id)->saldo_inicial;

    $vlr_lancamentos_d = self::getVlrLancamentosDespesas($id, $dt_limite);
    $vlr_lancamentos_r = self::getVlrLancamentosReceitas($id, $dt_limite);
    $vlr_lancamentos_t = self::getVlrLancamentosTransferencias($id, $dt_limite);
    $vlr_recebimentos_c = self::getVlrRecebimentosCartao($id, $dt_limite);
    
    // $lancamentos = Cache::remember("lancamentos_{$id}_{$dt_limite}", now()->addMinutes(30), function () use ($id, $dt_limite)
    // {
    //   return Lancamento::selectRaw("
    //                           SUM(CASE WHEN tipo = 'D' THEN vlr_final ELSE 0 END) AS despesas,
    //                           SUM(CASE WHEN tipo = 'R' THEN vlr_final ELSE 0 END) AS receitas,
    //                           SUM(CASE WHEN tipo = 'T' AND vlr_final < 0 THEN vlr_final ELSE 0 END) AS transferencias_saidas,
    //                           SUM(CASE WHEN tipo = 'T' AND vlr_final >= 0 THEN vlr_final ELSE 0 END) AS transferencias_entradas
    //                         ")->
    //                         where('id_banco', '=', $id)->
    //                         where('status', '=', 'Confirmado')->
    //                         whereDate('dt_quitacao', '<=', $dt_limite)->
    //                         first();
    // });


    $pagamentosVendas = 0;
    // $pagamentosVendas = Caixa::
    //                         where('id_banco', '=', $id)->
    //                         latest()->
    //                         first()->
    //                         vlr_fechamento;

    // Calcular saldo atual
    return $saldoInicial - $vlr_lancamentos_d + $vlr_lancamentos_r + $vlr_lancamentos_t + $pagamentosVendas + $vlr_recebimentos_c;
  }

  public static function getVlrLancamentosDespesas($id, $dt_limite)
  {
    $valor = Lancamento::
                      where('id_banco', '=', $id)->
                      where('tipo', '=', 'D')->
                      // where('status', '=', 'Confirmado')->
                      whereDate('dt_quitacao', '<', $dt_limite)->
                      sum('vlr_final');

    return $valor;
  }
  
  public static function getVlrLancamentosReceitas($id, $dt_limite)
  {
    $valor = Lancamento::
                      where('id_banco', '=', $id)->
                      where('tipo', '=', 'R')->
                      // where('status', '=', 'Confirmado')->
                      whereDate('dt_quitacao', '<', $dt_limite)->
                      sum('vlr_final');
    
    return $valor;
  }

  public static function getVlrLancamentosTransferencias($id, $dt_limite)
  {
    $valor = Lancamento::
                      where('id_banco', '=', $id)->
                      where('tipo', '=', 'T')->
                      // where('status', '=', 'Confirmado')->
                      whereDate('dt_quitacao', '<', $dt_limite)->
                      sum('vlr_final');

    return $valor;
  }

  public static function getVlrRecebimentosCartao($id, $dt_limite)
  {
    $valor = RecebimentoCartao::
                      where('id_banco', '=', $id)->
                      // where('status', '=', 'Confirmado')->
                      whereDate('dt_prevista', '<', $dt_limite)->
                      // select('id', 'vlr_final', 'status', 'dt_prevista', 'dt_quitacao')->get()->toJson();
                      sum('vlr_final');

    return $valor;
  }
  
  public function existe_caixa_aberto()
  {
    return $this->iesbdkwdkadqfgh->where('status', '=', 'Aberto')->count() > 0;
    // ->where('dt_abertura', '>=', \Carbon\Carbon::today())->where('status', '=', 'Aberto')
  }
  
  public static function extrato($id, $dt_inicial, $dt_final)
  {
    $dt_inicial = !is_null($dt_inicial) ? $dt_inicial : \Carbon\Carbon::now()->startOfMonth();
    $dt_final   = !is_null($dt_final)   ? $dt_final   : \Carbon\Carbon::now();

    $lancamentos = Lancamento::
                        where('id_banco', '=', $id)->
                        where('status', '=', 'Confirmado')->
                        whereBetween('dt_quitacao', [$dt_inicial, $dt_final])->
                        // withTrashed()->
                        get();
    
    $recebimentoCartoes = RecebimentoCartao::
                        where('id_banco', '=', $id)->
                        // where('status', '=', 'Confirmado')->
                        whereBetween('dt_prevista', [$dt_inicial, $dt_final])->
                        get();
    
    return $lancamentos->merge($recebimentoCartoes);
  }

// RELACIONAMENTOS  ===========================================================================================
//   public function FinLancamentos()
//   {
//     return $this->hasMany(Lancamento::class, 'id_banco', 'id');    
//   }

  public function iesbdkwdkadqfgh()
  {
    return $this->hasMany(Caixa::class, 'id_banco', 'id');    
  }

  // MÉTODOS          ===========================================================================================
  public function setSaldoInicialAttribute($value)
  {
    dd(1212);
    $this->attributes['saldo_inicial'] = str_replace(',', '.', str_replace('.', '', $value));
  }
  
  // MUTATORS         ===========================================================================================
  public function getSaldoAtualAttribute()
  {
    $id = $this->id;
    $dt_limite = \Carbon\Carbon::today();

    $saldoInicial = $this->saldo_inicial;

    $lancamentos = Cache::remember("lancamentos_{$id}_{$dt_limite}", now()->addMinutes(30), function () use ($id, $dt_limite)
    {
      return Lancamento::selectRaw("
                              SUM(CASE WHEN tipo = 'D' THEN vlr_final ELSE 0 END) AS despesas,
                              SUM(CASE WHEN tipo = 'R' THEN vlr_final ELSE 0 END) AS receitas,
                              SUM(CASE WHEN tipo = 'T' AND vlr_final < 0 THEN vlr_final ELSE 0 END) AS transferencias_saidas,
                              SUM(CASE WHEN tipo = 'T' AND vlr_final >= 0 THEN vlr_final ELSE 0 END) AS transferencias_entradas
                            ")->
                            where('id_banco', '=', $id)->
                            where('status', '=', 'Confirmado')->
                            whereDate('dt_quitacao', '<=', $dt_limite)->
                            first();
    });

    // // Obter lançamentos
    // $despesas = Lancamento::
    //                         where('id_banco', '=', $this->id)->
    //                         where('status', '=', 'Confirmado')->
    //                         whereDate('dt_quitacao', '<=', \Carbon\Carbon::now())->
    //                         get('vlr_final');

    // // Obter despesas
    // $despesas = Lancamento::
    //                         where('id_banco', '=', $this->id)->
    //                         where('status', '=', 'Confirmado')->
    //                         whereDate('dt_quitacao', '<=', \Carbon\Carbon::now())->
    //                         where('tipo', '=', 'D')->
    //                         sum('vlr_final');

    // // Obter receitas
    // $receitas = Lancamento::
    //                         where('id_banco', '=', $this->id)->
    //                         where('status', '=', 'Confirmado')->
    //                         whereDate('dt_quitacao', '<=', \Carbon\Carbon::now())->
    //                         where('tipo', '=', 'R')->
    //                         sum('vlr_final');

    // // Obter transferências
    // $transferencias = Lancamento::
    //                         where('id_banco', '=', $this->id)->
    //                         where('status', '=', 'Confirmado')->
    //                         whereDate('dt_quitacao', '<=', \Carbon\Carbon::now())->
    //                         where('tipo', '=', 'T')->
    //                         sum('vlr_final');
                            
    // Obter pagamentos de vendas
    $pagamentosVendas = Caixa::
                            where('id_banco', '=', $this->id)->
                            latest()->
                            first();

    // Obter recebimento em cartão de crédito
    $recebimentoCartao = RecebimentoCartao::
                            where('id_banco', '=', $this->id)->
                            where('status', '=', 'Confirmado')->
                            whereDate('dt_quitacao', '<=', \Carbon\Carbon::now())->
                            sum('vlr_final');

    // Calcular saldo atual
    return $saldoInicial - $lancamentos->despesas + $lancamentos->receitas - $lancamentos->transferencias_saidas + $lancamentos->transferencias_entradas + ($pagamentosVendas ? $pagamentosVendas->saldo_atual : 0) + $recebimentoCartao;
    // return $saldoInicial - $despesas + $receitas + $transferencias + ($pagamentosVendas ? $pagamentosVendas->saldo_atual : 0) + $recebimentoCartao;
  }
}