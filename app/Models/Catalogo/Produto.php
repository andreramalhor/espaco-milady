<?php

namespace App\Models\Catalogo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use App\Models\Atendimento\Pessoa;
use App\Models\PDV\ComandaDetalhe;
use App\Models\Catalogo\CompraDetalhe;
use App\Models\Catalogo\Saida;
use App\Models\Catalogo\SaidaDetalhe;
use App\Models\Financeiro\ContaPessoa;
use App\Models\Catalogo\Categoria;
use App\Models\pivots\ColaboradorServico;
use App\Models\pivots\FornecedorProduto;

class Produto extends Model
{
	use SoftDeletes;

	protected $primaryKey = 'id';
	protected $table      = 'cat_produtos_servicos';
	protected $fillable   = [
    'tipo',
    'ativo',
    'nome',
    'descricao',
    'id_categoria',
    'id_fornecedor',
    'marca',
    'unidade',
    'tipo_preco',
    'duracao',
    'status',
    'cod_nota',
    'cod_barras',
    'estoque_min',
    'estoque_max',
    
    'tipo_comissao',
    'prc_comissao',
    'vlr_comissao',
    
    'vlr_venda',
		// 'vlr_mercado',        // remover, desnecessário!
    'vlr_nota',
    'vlr_frete',
    'vlr_impostos',
    'vlr_marg_contribuicao',
    'vlr_cst_adicional',
    'vlr_custo',
    'vlr_custo_estoque',
    'vlr_custo_comissao',
    
    'ncm_prod_serv',
    'ipi_prod_serv',
    'icms_prod_serv',
    'simples_prod_serv',
    
    'tempo_retorno',
    'marg_contribuicao',
    'margem_custo',
    'consumo_medio',
    'cmv_prod_serv',
    'curva_abc',
    
    'fidelidade_pontos_ganhos',
    'fidelidade_pontos_necessarios',
	];
  
	protected $appends = [
    // 'custo_estoque',
    'estoque_atual',
    // 'link_tipo',
    // 'imagem',
    // 'imagem_servprod',
    // 'mnome',
	];
  
  // AUXILIARES              ===========================================================================================
  public static function pesquisar($pesquisa)
  {
    return empty($pesquisa)
              ? static::query()
              : static::query()->where('nome', 'LIKE', '%'.$pesquisa.'%')->
                        orWhere('id', 'LIKE', '%'.$pesquisa.'%');
  }
  
  // ACL              ===========================================================================================
  
  // RELACIONAMENTOS  ===========================================================================================
  public function ecgklyqfdcoguyj()
  {
    return $this->hasOne(Categoria::class, 'id', 'id_categoria');
  }
  
  public function xcuwqubcfetnftm()
  {
    return $this->hasManyThrough(
      Pessoa::class,                // Model Final
      FornecedorProduto::class,     // Model Meio
      'id_servprod',                // Chave estrangeira na model Meio ...
      'id',                         // Chave principal na model Final ...
      'id',                         // Chave principal na model que estou ...
      'id_fornecedor'               // Chave principal na model Meio ...
    );
  }
  
  public function smenhgskqwmdjwe()
  {
    return $this->hasMany(ColaboradorServico::class, 'id_servprod', 'id');
  }
  
  public function weqlkwejqlkjlks()
  {
    return $this->belongsToMany(Pessoa::class, 'cnf_colaborador_servico', 'id_servprod', 'id_profexec')->withPivot(['executa', 'prc_comissao']);
  }
  
  public function QualPessoaForneceEsseProduto()
  {
    return $this->belongsToMany(Pessoa::class, 'cnf_fornecedor_produto', 'id_servprod', 'id_fornecedor');
  }
  
  public function ServicoOuProdutoNoDetalheDaComanda()
  {
    return $this->hasMany(ComandaDetalhe::class, 'id_servprod', 'id');
  }
  
  public function qoiwejgewfbskas()
  {
    return $this->hasMany(CompraDetalhe::class, 'id_servprod', 'id');
  }
  
  public function oasfeoauwdwbsas()
  {
    return $this->hasMany(SaidaDetalhe::class, 'id_servprod', 'id');
  }
  
  
  public function qpwendeiowqnsas()
  {
    return $this->hasManyThrough(
      Saida::class,
      SaidaDetalhe::class,
      'id_servprod',
      'id',
      'id',
      'id_saida'
    );
  }
  
  public function PivotServicoAteContaPessoaPassandoPorDetalhe()
  {
    return $this->hasManyThrough(
      ContaPessoa::class,           // Model Alvo
      ComandaDetalhe::class,          // Model Através
      'id',                         // Chave estrangeira na model Através ...
      'id_origem',                  // Chave estrangeira na model Alvo...
      'id',                         // Chave principal na model que estou...
      'id_servprod'                 // Chave principal na model Através...
    );
  }
  
  public function smenhgskqwmdjwe()
  {
    return $this->hasMany(ColaboradorServico::class, 'id_servprod', 'id');
  }
  
  public function smenhgskqwmdjwz()
  {
    // return $this->belongsTo(ColabServ::class, 'id', 'id_servprod' );
    return $this->belongsTo(ColaboradorServico::class, 'id', 'id_servprod')->withPivot(['executa', 'prc_comissao']);
  }
  
  public static function boot()
  {
    parent::boot();
    
    static::deleting(function($prod_serv)
    {
      $prod_serv->smenhgskqwmdjwe()->delete();
    });
  }
  
  // MUTATORS         ===========================================================================================
  
	public function setVlrVendaAttribute($value)
	{
    $this->attributes['vlr_venda'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
	public function setVlrMercadoAttribute($value)
	{
    $this->attributes['vlr_mercado'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
	public function setVlrNotaAttribute($value)
	{
    $this->attributes['vlr_nota'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
	public function setVlrFreteAttribute($value)
	{
    $this->attributes['vlr_frete'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
  public function setVlrImpostosAttribute($value)
	{
    $this->attributes['vlr_impostos'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
	public function setVlrComissaoAttribute($value)
	{
    $this->attributes['vlr_comissao'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
	public function setVlrMargContribuicaoAttribute($value)
	{
    $this->attributes['vlr_marg_contribuicao'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
	public function setVlrCustoAttribute($value)
	{
    $this->attributes['vlr_custo'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
	public function setVlrCustoEstoqueAttribute($value)
	{
    $this->attributes['vlr_'] = str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $value)));
	}
  
  public function getEstoqueAtualAttribute()
  {
    $entradas_inicial = $this->qoiwejgewfbskas->where('status', '=', 'Estoque Inicial')->sum('qtd');
    $entradas_confirmadas = $this->qoiwejgewfbskas->where('status', '=', 'Confirmado')->sum('qtd');
    
    $saidas_pedido = $this->oasfeoauwdwbsas->where('status', 'Pedido')->sum('qtd');

    return $entradas_inicial + $entradas_confirmadas - $saidas_pedido;
  }
  
  public function getCustoEstoqueAttribute()
  {
    $custo_estoque = $this->estoque_atual * $this->vlr_custo;

    return $custo_estoque;
  }
  
  public function getImagemAttribute()
  {
    if(file_exists(public_path('/stg/img/prod/'.$this->id.'.png')))
    {
      return asset('/stg/img/prod/'.$this->id.'.png');
    }
    else
    {
      return asset('/stg/img/prod/0.png');
    }
  }
  
  public function getImagemServProdAttribute()
  {
    if(file_exists(public_path('/stg/img/prod/'.$this->id.'.png')))
    {
      return '<img src="'.asset('/stg/img/prod/'.$this->id.'.png').'" alt="'.$this->nome.'" class="border border-secondary rounded" width="50px">';
    }
    else
    {
      return '<img src="'.asset('/stg/img/prod/0.png').'" alt="'.$this->nome.'" class="border border-secondary rounded" width="50px">';
    }
  }
  
  public function getLinkTipoAttribute()
  {
    switch ($this->tipo)
    {
      case 'Serviço':
        return 'servicos';
        break;
        
      case 'Produto':
        return 'produtos';
        break;
        
      case 'Consumo':
        return 'consumo';
        break;
    }
  }
  
  public function getMnomeAttribute()
  {
    if($this->marca == null)
    {
      return $this->marca.' | '.$this->nome;
    }
    else
    {
      return $this->marca.' | '.$this->nome;
    }
  }
  
  function getsrcFotoAttribute()
  {    
    if(file_exists(public_path('/stg/img/prod/'.$this->id.'.png')))
    {
      return asset("stg/img/prod/{$this->id}.png");
    }
    else
    {
      return asset('stg/img/prod/0.png');
    }
  }
  
  public static function temFoto($id)
  {
    $filePath = public_path("stg/img/prod/{$id}.png");
    
    return file_exists($filePath);
  }
}
