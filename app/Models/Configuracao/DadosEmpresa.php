<?php

namespace App\Models\Configuracao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;         //Se for usar coluna DELETED_AT no banco de dados

class DadosEmpresa extends Model
{
  use SoftDeletes;                                    //Se for usar coluna DELETED_AT no banco de dados
  public $timestamps   = true;

  protected $table      = 'cfg_dados_empresa';
  protected $fillable   = [
    'mensagem',
    'id',
    'nome_empresa',
    'nome_responsavel',
    'fone',
    'fone_comercial',
    'email',
    'cnpj',
    'cpf',
    'site',
    'saldo_sms',
    'limite_espaco',
    
    'cep',
    'endereco',
    'numero',
    'complemento',
    'bairro',
    'estado',
    'cidade',
    
    'razao_social',
    'inscricao_municipal',
    'inscricao_estadual',
    'regime_tributario',
    'cnae',
    'sequencia_nfe',
    'serie_nfe',
    'item_lista_servico_LC116',
    'cod_servico_municipal',
    'nome_servico_municipal',
    'iss_retido_fonte',
    'aliquota_iss',
    'valor_cofins',
    'valor_csll',
    'valor_inss',
    'valor_ir',
    'valor_pis',
    'arquivo_certificado',
    'certificado_hidden',
    'senha_certificado',
    'data_validade',
    'tipo_emissao',
    'usuario_acesso_producao',
    'senha_acesso_producao',
    'token_producao',
  ];
  protected $appends = [
  ];

// RELACIONAMENTOS  ===========================================================================================


// MÉTODOS          ===========================================================================================


// ATRIBUTOS        ===========================================================================================
}