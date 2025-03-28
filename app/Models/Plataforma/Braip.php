<?php

namespace App\Models\Plataforma;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Braip extends Model
{
  use SoftDeletes;

  protected $primaryKey = 'chave';
  protected $table      = 'ptf_braip';
  protected $fillable   = [
    'chave',
    'produtor',
    'produto',
    'plano',
    'comprador',
    'e_mail',
    'telefone',
    'cep',
    'endereco',
    'numero',
    'complemento',
    'bairro',
    'cidade',
    'estado',
    'documento',
    'parcelamento',
    'pagamento',
    'status',
    'valor',
    'valor_pago',
    'sua_comissao',
    'data_venda',
    'data_pagamento',
    'afiliado',
    'e_mail_afiliado',
    'comissao_do_afiliado',
    'televendas',
    'src',
    'utm_source',
    'utm_campaign',
    'utm_medium',
    'meta',
    'tipo_do_frete',
    'valor_do_frete'
  ];
  // protected $appends = [];

// RELACIONAMENTOS  ===========================================================================================
// MUTATORS         ===========================================================================================
}
