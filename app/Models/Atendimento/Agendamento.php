<?php

namespace App\Models\Atendimento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

use App\Models\Gerenciamento\Empresa;
use App\Models\Atendimento\Pessoa;
use App\Models\Agendamento\Comissao;
use App\Models\Cadastro\ServicoProduto;

class Agendamento extends Model
{
  use SoftDeletes;

  protected $primaryKey = 'id';
  protected $table      = 'atd_agendamentos';
  protected $fillable   = [
    'id_empresa',
    'start',
    'end',
    'id_cliente',
    'id_profexec',
    'id_servprod',
    'id_comanda',
    'valor',
    'id_criador',
    'obs',
    'status',
    'id_venda_detalhe',
    'prc_comissao',
    'vlr_comissao',
    'grupo',
    'telefone',
  ];
  protected $appends = [
    'title',
    'color',
    'resourceId',
    'textColor',
    'borderColor',
  ];

// RELACIONAMENTOS  ===========================================================================================
  public function jkweviewflkjdas()
  {
    return $this->hasOne(Empresa::class, 'id', 'id_empresa');
  }

  public function xhooqvzhbgojbtg()
  {
    return $this->hasOne(Pessoa::class, 'id', 'id_cliente')->withTrashed();
  }

  public function hhmaqpijffgfhmj()
  {
    return $this->hasOne(Pessoa::class, 'id', 'id_profexec')->withTrashed();
  }

  public function zlpekczgsltqgwg()
  {
    return $this->hasOne(ServicoProduto::class, 'id', 'id_servprod')->withTrashed();
  }

  public function eiuroereuwnofiw()
  {
    return $this->hasOne(Pessoa::class, 'id', 'id_criador');
  }

  public function sadlqwdnlaskdla()
  {
    return $this->hasOne(Comissao::class, 'id_agendamento', 'id');
  }
  
  // AUXILIARES              ===========================================================================================
  public static function procurar($pesquisa)
  {
    return empty($pesquisa)
    ? static::query()
    : static::query()->where('nome', 'LIKE', '%'.$pesquisa.'%')
                     ->orWhere('id', 'LIKE', '%'.$pesquisa.'%');
  }


// MUTATORS         ===========================================================================================
  public function getTitleAttribute()
  {
    if($this->id_cliente == null || $this->id_cliente == 10942)
    {
      $titulo = $this->obs.' ('.$this->zlpekczgsltqgwg->nome.')';
    }
    else
    {
      $titulo = optional($this->xhooqvzhbgojbtg)->apelido.' ('.optional($this->zlpekczgsltqgwg)->nome.')';
    }
    
    if(!is_null($this->grupo))
    {
      return $this->grupo.' - '.$titulo;
    }
    else
    {
      return $titulo;
    }
  }

  public function getResourceIdAttribute()
  {
    return $this->id_profexec;
  }
  
  public function getColorAttribute(): string    
  {
    return $this->pegar_cor($this->status, 'agenda', 'string');
  }    

  public function pegar_cor( $status, $fonte, $retorno)
  {
    switch ($status)
    {
      case 'Agendado':
        $dados = [
          'agenda'        => '#EBE72F',
          'agenda_antiga' => '#FFFF66',
          'badge'         => 'warning', 
          'cor_hex'       => '#F1C40F',
        ];
        break;

      case 'Fixa':
        $dados = [
          'agenda'        => '#D48820',
          'agenda_antiga' => 'goldenrod',
          'badge'         => 'goldenrod', 
          'cor_hex'       => '#7B1FA2',
        ];
        break;

      case 'Atrasado':
        $dados = [
          'agenda'        => '#FF7792',
          'agenda_antiga' => 'lightsalmon',
          'badge'         => 'orange', 
          'cor_hex'       => '#D32F2F',
        ];
        break;
                  
      case 'Faltou':
        $dados = [
          'agenda'        => '#FF5F5E',
          'agenda_antiga' => 'lightcoral',
          'badge'         => 'danger', 
          'cor_hex'       => '#C2185B',
        ];
        break;

      case 'Confirmado':
        $dados = [
          'agenda'        => '#20D44A',
          'agenda_antiga' => 'lightgreen',
          'badge'         => 'success', 
          'cor_hex'       => '#FFA000',
        ];
        break;
      
      case 'Finalizado':
        $dados = [
          'agenda'        => '#24AFEF',
          'agenda_antiga' => 'lightblue',
          'badge'         => 'info', 
          'cor_hex'       => '#F57C00',
        ];
        break;
      
      case 'Fechado':
        $dados = [
          'agenda'        => '#777777',
          'agenda_antiga' => 'grey',
          'badge'         => 'lightgray', 
          'cor_hex'       => '#1976D2',
        ];
        break;
        
      case 'Agendado pela internet':
        $dados = [
          'agenda'        => '#6218DF',
          'agenda_antiga' => '#6218DF',
          'badge'         => 'indigo', 
          'cor_hex'       => '#6218DF', 
        ];

      default:
        $dados = [
          'agenda'        => '#6218DF',
          'agenda_antiga' => 'black',
          'badge'         => 'black', 
          'cor_hex'       => '#388E3C', 
        ];
        break;
    }

    if($retorno == 'string')
    {
      return $dados[$fonte];
    }
    else
    {
      return $dados;
    }

  // #F1C40F
  // amarelo
  
  // #FFA000
  // amarelo amber

  // #F57C00
  // laranha

  // #D32F2F
  // vermelho
  
  // #C2185B
  // pink
  
  // #7B1FA2
  // roxo
  
  // #1976D2
  // azul

  // #388E3C
  // verde

  // #5D4037
  // marron

  }

  public function getTextColorAttribute()
  {
    return 'black';
  }

  public function getBorderColorAttribute()
  {
    if(!is_null($this->grupo))
    {
      return 'red';
    }
    else
    {
      return 'lightgrey';
    }
  }

  public function getBadgeAttribute()
  {
    switch ( $this->status )
    {
      case 'Agendado':
        return 'warning';
        break;
      case 'Confirmado':
        return 'success';
        break;
      case 'Finalizado':
        return 'info';
        break;
      case 'Atrasado':
        return 'orange';
        break;
      case 'Faltou':
        return 'danger';
        break;
      case 'Fixa':
        return 'goldenrod';
        break;
      default:
        return 'primary';
        break;
    }
  }

  // AUXILIARES              ===========================================================================================
  public static function pesquisar($pesquisa)
  {
    return empty($pesquisa)
    ? static::query()
    : static::query()->where('status', 'LIKE', '%'.$pesquisa.'%')
                     ->orWhere('id', 'LIKE', '%'.$pesquisa.'%');
  }
}
