<?php

namespace App\Models\Atendimento;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

use \Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use App\Models\Agendamento\Ordem;
use App\Models\ACL\Funcao;
use App\Models\ACL\Permissao;
use App\Models\Cadastro\ServicoProduto;
use App\Models\Configuracao\ColaboradorServico;
use App\Models\Ferramenta\Tarefa;
use App\Models\Financeiro\ContaInterna;
use App\Models\Gerenciamento\Empresa;
use App\Models\PDV\Caixa;
use App\Models\PDV\Comanda;
use App\Models\PDV\ComandaDetalhe;

use App\Scopes\EmpresaScope;

class Pessoa extends Authenticatable
{
  use HasApiTokens;
  use SoftDeletes;
  
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory;
  use HasProfilePhoto;
  use HasTeams;
  use Notifiable;
  use TwoFactorAuthenticatable;
  
  protected $table = 'atd_pessoas';
  protected $primaryKey = 'id';
  protected $fillable   = [
    'id_empresa',
    'apelido',
    'nome',
    'dt_nascimento',
    'email',
    'sexo',
    'cpf',
    'instagram',
    'observacao',
    'id_criador',
    'ddd',
    'telefone1',
    'telefone2',
    'cep',
    'logradouro',
    'complemento',
    'numero',
    'bairro',
    'cidade',
    'uf',
    'username',
    'password',
    'profile_photo_url',
    'current_team_id',

    // facebook
    // remember_token
    // email_verified_at
    // id_rsschool
    // tipo_pessoa
    // estado_civil
    // profissao
    // escolaridade
    // rg_insc
    // nome_mae
    // funcao
    // origem
    // ordem
  ];
  
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
  ];
  
  protected $appends = [
    'profile_photo_url',
    // 'nomes',
    // 'whatsapp',
    // 'endereco_principal',
    // 'nascimento',
    // 'saldo_conta',
    // 'ultimo_agendamento',
    // 'cpf_cnpj',
    'src_foto',
    'primeiro_nome',
  ];

  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  // RELACIONAMENTOS  ===========================================================================================
  public function hgvqzcnfxwfqjue()
  {
    return $this->hasOne(Pessoa::class, 'id','id_criador')->withTrashed();
  }

  public function klwqejqlkwndwiqo()
  {
    return $this->hasOne(Empresa::class, 'id','id_empresa');
  }

  public function kjahdkwkbewtoip()
  {
    return $this->belongsToMany(Funcao::class, 'acl_funcoes_pessoas', 'id_pessoa', 'id_funcao');
  }

  public function qekwjlfiewhoasd()
  {    
    return $this->belongsToMany(Permissao::class, 'acl_permissoes_pessoas', 'id_pessoa', 'id_permissao');
  }
  
  public function gxtisamceedomas()
  {
    return $this->hasMany(Comanda::class, 'id_cliente', 'id');
  }

  public function aeahvtsijjoprlc()
  {
    return $this->hasMany(ColaboradorServico::class, 'id_profexec', 'id');
  }

  public function kehfywbcsqalfpw()
  {
    return $this->hasManyThrough(
      ServicoProduto::class,
      ColaboradorServico::class,
      'id_profexec',
      'id',
      'id',
      'id_servprod');
  }

  public function abcdefghijklmno( $hj = false )
  {
    if( $hj )
    {
      return $this->hasOne(Caixa::class, 'id_usuario_abertura', 'id')->where('status', '=', 'Aberto')->whereDate('dt_abertura', '=', Carbon::today());
    }
    else
    {
      return $this->hasOne(Caixa::class, 'id_usuario_abertura', 'id')->where('status', '=', 'Aberto');
    }
  }
  
  public function iemzmwadhadlask()
  {
    return $this->hasMany(Agendamento::class, 'id_cliente', 'id');
  }
  
  public function qoiwqjdasojasjs()
  {
    return $this->hasMany(Agendamento::class, 'id_profexec', 'id');
  }

  public function eidwuedoeduzdsd()
  {
    return $this->hasManyThrough(
      ComandaDetalhe::class,        // Model Alvo
      Comanda::class,               // Model Através
      'id_cliente',                 // Chave estrangeira na model Através ...
      'id_venda',                  // Chave estrangeira na model Alvo...
      'id',                         // Chave principal na model que estou...
      'id');                // Chave principal na model Através...
  }

  public function aslkdjaslkdjals()
  {
    return $this->hasMany(Caixa::class, 'id_usuario_abertura', 'id');
  }

  public function opmnhtrvansmesd()
  {
    return $this->hasMany(ContaInterna::class, 'id_pessoa', 'id');
  }

  public function fjowenfsiasdwqe()
  {
    return $this->hasMany(Tarefa::class, 'id_responsavel', 'id');
  }

  public function aslfenvkvuelkds()
  {
    return $this->hasOne(Ordem::class, 'auth_user', 'id');
  }

  public function idfwhdisjsdahds()
  {
    return $this->hasOne(Ordem::class, 'id_pessoa', 'id');
  }

  // ESTÁTICAS  ===========================================================================================
  public static function clientes()
  {
    return Pessoa::whereHas('kjahdkwkbewtoip', function(Builder $query)
    {
      $query->where('nome', '=','Cliente');
    });
  }

  public static function vendedores()
  {
    return Pessoa::whereHas('kjahdkwkbewtoip', function(Builder $query)
    {
      $query->where('nome', '=','Vendedor');
    });
  }

  public static function parceiros()
  {
    return Pessoa::whereHas('kjahdkwkbewtoip', function(Builder $query)
    {
      $query->where('nome', '=','Parceiro');
    });
  }

  public static function fornecedores()
  {
    return Pessoa::whereHas('kjahdkwkbewtoip', function(Builder $query)
    {
      $query->where('nome', '=','Fornecedor');
    });
  }

  public static function colaboradores()
  {
    return Pessoa::whereHas('kjahdkwkbewtoip', function(Builder $query)
    {
      $query->where('nome', '=','Colaborador');
    });
  }

  public static function profissionais( $funcao )
  {
    return Pessoa::whereHas('kjahdkwkbewtoip', function(Builder $query) use ($funcao)
    {
      $query->where('nome', '=', $funcao);
    });
  }

  // MUTATORS         ===========================================================================================
  public function getNameAttribute()
  {
    return $this->apelido;
  }

  public function getComissoesAbertasAttribute()
  {
    return $this->opmnhtrvansmesd()->where('status', '=', 'Em aberto')->sum('valor');
  }

  public function getEnderecoAttribute()
  {
    if($this->logradouro != null || $this->bairro != null)
    {
      return $this->logradouro.', '.$this->numero.' - Bairro: '.$this->bairro.'. '.$this->cidade.'/'.$this->uf;
    }
  }

  public function getFoneAttribute()
  {
    if($this->telefone2 == null)
    {
      return $this->telefone1;
    }
    else if($this->telefone1 == null)
    {
      return $this->telefone2;
    }
    else
    {
      return $this->telefone1.' | '.$this->telefone2;
    }
  }

  public function setNomeAttribute($value)
  {
    $this->attributes['nome'] = ucwords(strtolower($value));
  }

  public function getCpfCnpjAttribute($value)
  {
    return true;
  }

  public function setApelidoAttribute($value)
  {
    $this->attributes['apelido'] = ucwords(strtolower($value));
  }

  public function getNomesAttribute()
  {
    return "{$this->apelido} | {$this->nome}";
  }

  public function getLabelCpfCnpjAttribute()
  {
    if( $this->cpf == "" )
    {
      return 'CPF/CNPJ';
    }
    if( strlen($this->cpf) <= 11 )
    {
      return 'CPF';
    }
    else
    {
      return 'CNPJ';
    }
  }

  function mask($val, $mask)
  {
      $maskared = '';
      $k = 0;
      for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
          if ($mask[$i] == '#') {
              if (isset($val[$k])) {
                  $maskared .= $val[$k++];
              }
          } else {
              if (isset($mask[$i])) {
                  $maskared .= $mask[$i];
              }
          }
      }

      return $maskared;
  }

  public function getNascimentoAttribute()
  {
    if ( !is_null($this->dt_nascimento) AND Carbon::parse($this->dt_nascimento)->age > 99 )
    {
      return Carbon::parse($this->dt_nascimento)->format('d/m');
    }
    else if ( !is_null($this->dt_nascimento))
    {
      return Carbon::parse($this->dt_nascimento)->format('d/m/Y').' ('.Carbon::parse($this->dt_nascimento)->age.' anos)';
    }
    return null;
  }


  public function getEnderecoPrincipalAttribute()
  {
    if ( !is_null($this->uqbchiwyagnnkip->first()) )
    {
      if ($this->uqbchiwyagnnkip->first()->complemento == '')
      {
        return 'Rua '.$this->uqbchiwyagnnkip->first()->logradouro.', '.$this->uqbchiwyagnnkip->first()->numero.' - '.$this->uqbchiwyagnnkip->first()->bairro.' - '.$this->uqbchiwyagnnkip->first()->cidade.'/'.$this->uqbchiwyagnnkip->first()->uf;
      }
      return 'Rua '.$this->uqbchiwyagnnkip->first()->logradouro.', '.$this->uqbchiwyagnnkip->first()->numero.' ('.$this->uqbchiwyagnnkip->first()->complemento.') - '.$this->uqbchiwyagnnkip->first()->bairro.' - '.$this->uqbchiwyagnnkip->first()->cidade.'/'.$this->uqbchiwyagnnkip->first()->uf;
    }
    else
    {
      return 'Sem Endereços cadastrados.';
    }
  }

  public function getWhatsappAttribute()
  {
    if( !is_null($this->ginthgfwxbdhwtu->where('whatsapp', 1)->first()) )
    {
      $remove_espaco = str_replace(" ", "", $this->ginthgfwxbdhwtu->where('whatsapp', true)->first()->ddd.$this->ginthgfwxbdhwtu->where('whatsapp', true)->first()->telefone);
      $remove_traco  = str_replace("-", "", $remove_espaco);

      return $remove_traco;
    }
  }

  public function getSaldoContaAttribute()
  {
    return $this->opmnhtrvansmesd->where('status', '=', 'Em aberto')->sum('valor');
    // return $this->AtdPessoasContatos->where('principal', 1)->first()['ddd'] . $this->AtdPessoasContatos->where('principal', 1)->first()['numero'];
  }

  public function getAgendamentosHojeAttribute()
  {
    return $this->iemzmwadhadlask()->
                                  whereBetween('start', [
                                    \Carbon\Carbon::today()->startOfDay(),
                                    \Carbon\Carbon::today()->endOfDay()
                                  ])->
                                  where(function (Builder $query)
                                  {
                                    $query->
                                      where('status', '=', 'Agendado')->
                                      orWhere('status', '=', 'Fixa')->
                                      orWhere('status', '=', 'Confirmado');
                                  })->
                                  get();
  }

  public function getdiaDesdeUltimaVendaAttribute()
  {
    if ($this->gxtisamceedomas->count() > 0)
    {
      return \Carbon\Carbon::parse(optional($this->gxtisamceedomas)->sortBy('created_at')->last()->created_at)->diff(\Carbon\Carbon::today())->format('%d');
    }
    else
    {
      return null;
    }

  }

  public function getdiaDesdeUltimaVendaColorAttribute()
  {
    $dias_perc = $this->dia_desde_ultima_venda / 90 * 100;

    if ($dias_perc >= 0 && $dias_perc < 33.34)
    {
      return 'green';
    }
    elseif ($dias_perc >= 33.34 && $dias_perc < 66.667)
    {
      return 'yellow';
    }
    else
    {
      return 'red';
    }
  }

  public function getdiaDesdeUltimoAgendamentoAttribute()
  {
    if ($this->iemzmwadhadlask->count() > 0)
    {
      return \Carbon\Carbon::parse(optional($this->iemzmwadhadlask)->sortBy('start')->first()->start)->format('d/m/Y');
    }
    else
    {
      return null;
    }
  }

  public function getultimoAgendamentoAttribute()
  {
    if ($this->iemzmwadhadlask->count() > 0)
    {
      return \Carbon\Carbon::parse(optional($this->iemzmwadhadlask)->sortByDesc('start')->first()->start);
    }
  }

  public function getfrequenciaAgendamentosAttribute()
  {
    if ($this->iemzmwadhadlask->count() > 0)
    {
      $datas_agendamentos = $this->iemzmwadhadlask()
                                ->whereDate('start', '<=', Carbon::now())
                                ->selectRaw('DATE(start) as dia')
                                ->groupBy('dia')
                                ->get();

      $dados['agendamentos_group_dias'] = collect();

      foreach ($datas_agendamentos as $item)
      {
        $registros = $this->iemzmwadhadlask()
                          ->whereRaw('DATE(start) = ?', [$item->dia])
                          ->get();

        $dados['agendamentos_group_dias']->push($registros);
      }

      $dados['quantidade'] = $dados['agendamentos_group_dias']->count();

      if ($dados['quantidade'] > 1)
      {
        $dados['data_primeiro'] = $dados['agendamentos_group_dias']->first()->first()->start;
        $dados['data_ultimo']   = $dados['agendamentos_group_dias']->last()->last()->start;
        $dados['intervalos']    = $dados['agendamentos_group_dias']->count() - 1;
        $dados['tempo_entre']   = \Carbon\Carbon::parse($dados['data_primeiro'])->diffInDays($dados['data_ultimo']);
        $dados['frequencia']    = $dados['tempo_entre'] / $dados['intervalos'];
      }
      else
      {
        $dados['agendamentos_group_dias'] = 1;
        $dados['quantidade']    = 1;
        $dados['data_primeiro'] = \Carbon\Carbon::parse($this->iemzmwadhadlask->first()->start);
        $dados['data_ultimo']   = \Carbon\Carbon::today()->addDays(1);
        $dados['intervalos']    = 1;
        $dados['tempo_entre']   = \Carbon\Carbon::parse($dados['data_primeiro'])->diffInDays($dados['data_ultimo']);
        $dados['frequencia']    = $dados['tempo_entre'] / $dados['intervalos'];
        $dados['color']         = 'grey';
      }

      if ($dados['frequencia'] >= 0 && $dados['frequencia'] < 15)
      {
        $dados['color']       = 'green';
      }
      elseif ($dados['frequencia'] >= 15 && $dados['frequencia'] < 30)
      {
        $dados['color']       = 'yellow';
      }
      else
      {
        $dados['color']       = 'red';
      }
    }
    else
    {
      $dados['agendamentos_group_dias'] = 0;
      $dados['quantidade']    = 0;
      $dados['data_primeiro'] = \Carbon\Carbon::today();
      $dados['data_ultimo']   = \Carbon\Carbon::today();
      $dados['intervalos']    = 0;
      $dados['tempo_entre']   = 0;
      $dados['frequencia']    = 0;
      $dados['color']         = 'grey';
    }

    return $dados;
  }

  function getlinkIdAttribute()
  {
    return '<a class="link-dark text-decoration-underline" onclick="pessoas_mostrar('.$this->id.')" style="cursor: pointer;">'.$this->id.'</a>';
  }
  
  function getsrcFotoAttribute()
  {
    if(file_exists(public_path('/stg/img/user/'.$this->id.'.png')))
    {
      return asset('stg/img/user/'.$this->id.'.png');
    }
    else
    {
      return asset('storage/profile-photos/0.png');
    }
  }
  
  function getprimeiroNomeAttribute()
  {
    $nomeCompleto = $this->nome;
    $nomePartes   = explode(" ", $nomeCompleto);

    return $nomePartes[0];
  }
  

  // FUNÇÕES          ===========================================================================================
  public function adminlte_desc()
  {
    return '';
    // return 'That\'s a nice guy';
  }

  public function adminlte_profile_url()
  {
    return route('atd.pessoas.mostrar', $this->id);
  }


  // AUXILIARES              ===========================================================================================
  public static function pesquisar($pesquisa)
  {
    return empty($pesquisa)
    ? static::query()
    : static::query()->where('nome', 'LIKE', '%'.$pesquisa.'%')
                     ->orWhere('id', 'LIKE', '%'.$pesquisa.'%');
  }

  // ACL              ===========================================================================================

  public function temPermissao($permissao)  // O Gate verifica permissão por permissão na hora de saber se possui o daquele item que ele pretende entrar
  {
    $permissaoDoUsuario = Cache::rememberForever('permissoes::do::usuario::'.$this->id, function()
    {
      return $this->qekwjlfiewhoasd()->get();
    });
    
    return $permissaoDoUsuario->where('nome', $permissao)->isNotEmpty();
  }

  public function pesquisar_permissao_em_funcoes($permissao)
  {   
    $tem = false;
    
    foreach($this->kjahdkwkbewtoip as $funcao)  // VERIFICA SE ESTÁ EM ALGUM FUNÇÃO QUE TEM A PERMISSÃO
    {
      if($funcao->yxwbgtooplyjjaz->contains('nome', $permissao))
      {
        $tem = true;
      }
    }
    
    if($tem == false)  // SE NÃO ACHAR NENHUMA FUNÇÃO QUE TENHA A PERMISSÃO, VERIFICA SE POSSUI A PERMISSÃO DIRETAMENTE
    {
      return $this->qekwjlfiewhoasd->contains('nome', $permissao);
    }
    else
    {
      return $tem;
    }


    // if( is_array($permissao) || is_object($permissao) )
    // {
    //   return !! $permissao->intersect($this->kjahdkwkbewtoip)->count();
    // }
    // return $this->kjahdkwkbewtoip->contains('nome', $permissao);
  }

  public function pacoteFuncao($funcoes)
  {
    // dump('pacoteFuncao', $funcoes);
    if( is_array($funcoes) || is_object($funcoes) )
    {
      return !! $funcoes->intersect($this->kjahdkwkbewtoip)->count();
    }
    return $this->kjahdkwkbewtoip->contains('nome', $funcoes);
  }

  public function isAdmin()    // O Gate verifica, antes de tudo, se possui Tipo 'Administrador do Sistema'
  {
    return $this->kjahdkwkbewtoip->contains('nome', 'Administrador do Sistema');
  }
  
  public function isAdminSystem($admin)    // O Gate verifica, antes de tudo, se possui Tipo 'Administrador do Sistema'
  {
    return $this->kjahdkwkbewtoip->contains('nome', $admin);
  }

  public function temFuncao($funcao)
  {
    // dump('temFuncao', $funcao);
    return $this->kjahdkwkbewtoip->contains('nome', $funcao);
  }

  // SCOPES ===========================================================================================      
  public function scopeCLientes($query)
  {
    if(auth()->user()->kjahdkwkbewtoip->contains('nome', 'Vendedor'))
    {
        $query->whereHas('kjahdkwkbewtoip', function(Builder $query)
        {
          $query->where('nome', '=','Cliente');
        })->
        whereHas('ktykrtasd1lrfdf', function (Builder $query)
        {
            $query->where('id_pessoa', '=',auth()->user()->id);
        });
    }
    else
    {
        $query->whereHas('kjahdkwkbewtoip', function(Builder $query)
        {
          $query->where('nome', '=','Cliente');
        });
    }
  }

  public function scopeVendedores($query)
  {
    if(auth()->user()->kjahdkwkbewtoip->contains('nome', 'Vendedor'))
    {
        $query->whereHas('kjahdkwkbewtoip', function(Builder $query)
        {
          $query->where('nome', '=','Vendedor');
        })->
        whereHas('ktykrtasd1lrfdf', function (Builder $query)
        {
            $query->where('id_pessoa', '=',auth()->user()->id);
        });
    }
    else
    {
        $query->whereHas('kjahdkwkbewtoip', function(Builder $query)
        {
          $query->where('nome', '=','Vendedor');
        });
    }
  }

  public function scopeSocios($query)
  {
    $query->whereHas('kjahdkwkbewtoip', function(Builder $query)
    {
      $query->where('nome', '=','Sócios');
    });
  }

  public function scopeTipo($query)
  {
    if( \Auth::User()->kjahdkwkbewtoip->contains('nome', 'Cliente') )
    {
      $query->where('id_pessoa', '=', \Auth::User()->id);
    }
    else if( \Auth::User()->kjahdkwkbewtoip->contains('nome', 'Vendedor') )
    {
      $query->where('id_consultor', '=', \Auth::User()->id);
    }
  }

  // BOOT ===========================================================================================      
  protected static function boot()
  {
    parent::boot();
    
    // SCOPES ===========================================================================================      
    static::addGlobalScope(new EmpresaScope);
    
    // DELETANDO ===========================================================================================      
    static::deleting(function ($pessoa)
    {
      $filePath = public_path('stg/img/user/{$pessoa->id}.png');

      if (file_exists($filePath))
      {
        unlink($filePath);
      }
    });

  }

  // DEBUG ===========================================================================================      
  public function disabledDebuBar()
  {
    if($this->id != 2)  // Usuáio André Ramalho
    {
      \Debugbar::disable();
    }
    else
    {
      \Debugbar::enable();
    }
  }
}
