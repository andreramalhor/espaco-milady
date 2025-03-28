<?php

namespace App\Livewire\Configuracao\DadosEmpresa;

use Livewire\Component;

use App\Models\Configuracao\DadosEmpresa as DBDadosEmpresa;

class DadosEmpresa extends Component
{
    public $id_empresa;
    public $nome_empresa;
    public $nome_responsavel;
    public $fone;
    public $fone_comercial;
    public $email;
    public $cnpj;
    public $cpf;
    public $site;
    public $saldo_sms;
    public $limite_espaco;
    
    public $cep;
    public $endereco;
    public $numero;
    public $complemento;
    public $bairro;
    public $estado;
    public $cidade;

    public $razao_social;
    public $inscricao_municipal;
    public $inscricao_estadual;
    public $regime_tributario;
    public $cnae;
    public $sequencia_nfe;
    public $serie_nfe;
    public $item_lista_servico_LC116;
    public $cod_servico_municipal;
    public $nome_servico_municipal;
    public $iss_retido_fonte;
    public $aliquota_iss;
    public $valor_cofins;
    public $valor_csll;
    public $valor_inss;
    public $valor_ir;
    public $valor_pis;
    public $arquivo_certificado;
    public $certificado_hidden;
    public $senha_certificado;
    public $data_validade;
    public $tipo_emissao;
    public $usuario_acesso_producao;
    public $senha_acesso_producao;
    public $token_producao;

    protected $listeners = ['chamarMetodo' => 'remove'];
    
    public function mount()
    {
        if(!is_null(auth()->user()->id_empresa))
        {
            $dados_empresa = DBDadosEmpresa::find(auth()->user()->id_empresa);
            $this->id_empresa               = $dados_empresa->id;
            $this->nome_empresa             = $dados_empresa->nome_empresa;
            $this->nome_responsavel         = $dados_empresa->nome_responsavel;
            $this->fone                     = $dados_empresa->fone;
            $this->fone_comercial           = $dados_empresa->fone_comercial;
            $this->email                    = $dados_empresa->email;
            $this->cnpj                     = $dados_empresa->cnpj;
            $this->cpf                      = $dados_empresa->cpf;
            $this->site                     = $dados_empresa->site;
            $this->saldo_sms                = $dados_empresa->saldo_sms;
            $this->limite_espaco            = $dados_empresa->limite_espaco;
            
            $this->cep                      = $dados_empresa->cep;
            $this->endereco                 = $dados_empresa->endereco;
            $this->numero                   = $dados_empresa->numero;
            $this->complemento              = $dados_empresa->complemento;
            $this->bairro                   = $dados_empresa->bairro;
            $this->estado                   = $dados_empresa->estado;
            $this->cidade                   = $dados_empresa->cidade;
            
            $this->razao_social             = $dados_empresa->razao_social;
            $this->inscricao_municipal      = $dados_empresa->inscricao_municipal;
            $this->inscricao_estadual       = $dados_empresa->inscricao_estadual;
            $this->regime_tributario        = $dados_empresa->regime_tributario;
            $this->cnae                     = $dados_empresa->cnae;
            $this->sequencia_nfe            = $dados_empresa->sequencia_nfe;
            $this->serie_nfe                = $dados_empresa->serie_nfe;
            $this->item_lista_servico_LC116 = $dados_empresa->item_lista_servico_LC116;
            $this->cod_servico_municipal    = $dados_empresa->cod_servico_municipal;
            $this->nome_servico_municipal   = $dados_empresa->nome_servico_municipal;
            $this->iss_retido_fonte         = $dados_empresa->iss_retido_fonte;
            $this->aliquota_iss             = $dados_empresa->aliquota_iss;
            $this->valor_cofins             = $dados_empresa->valor_cofins;
            $this->valor_csll               = $dados_empresa->valor_csll;
            $this->valor_inss               = $dados_empresa->valor_inss;
            $this->valor_ir                 = $dados_empresa->valor_ir;
            $this->valor_pis                = $dados_empresa->valor_pis;
            $this->arquivo_certificado      = $dados_empresa->arquivo_certificado;
            $this->certificado_hidden       = $dados_empresa->certificado_hidden;
            $this->senha_certificado        = $dados_empresa->senha_certificado;
            $this->data_validade            = $dados_empresa->data_validade;
            $this->tipo_emissao             = $dados_empresa->tipo_emissao;
            $this->usuario_acesso_producao  = $dados_empresa->usuario_acesso_producao;
            $this->senha_acesso_producao    = $dados_empresa->senha_acesso_producao;
            $this->token_producao           = $dados_empresa->token_producao;
        }
    }

    public function dados_empresa()
    {
        $empresa = DBDadosEmpresa::updateOrCreate([
            'id' => $this->id_empresa,
        ],       
        [
            'nome_empresa'             => $this->nome_empresa,
            'nome_responsavel'         => $this->nome_responsavel,
            'fone'                     => $this->fone,
            'fone_comercial'           => $this->fone_comercial,
            'email'                    => $this->email,
            'cnpj'                     => $this->cnpj,
            'cpf'                      => $this->cpf,
            'site'                     => $this->site,
            'saldo_sms'                => $this->saldo_sms,
            'limite_espaco'            => $this->limite_espaco,
            
            'cep'                      => $this->cep,
            'endereco'                 => $this->endereco,
            'numero'                   => $this->numero,
            'complemento'              => $this->complemento,
            'bairro'                   => $this->bairro,
            'estado'                   => $this->estado,
            'cidade'                   => $this->cidade,
            
            'razao_social'             => $this->razao_social,
            'inscricao_municipal'      => $this->inscricao_municipal,
            'inscricao_estadual'       => $this->inscricao_estadual,
            'regime_tributario'        => $this->regime_tributario,
            'cnae'                     => $this->cnae,
            'sequencia_nfe'            => $this->sequencia_nfe,
            'serie_nfe'                => $this->serie_nfe,
            'item_lista_servico_LC116' => $this->item_lista_servico_LC116,
            'cod_servico_municipal'    => $this->cod_servico_municipal,
            'nome_servico_municipal'   => $this->nome_servico_municipal,
            'iss_retido_fonte'         => $this->iss_retido_fonte,
            'aliquota_iss'             => $this->aliquota_iss,
            'valor_cofins'             => $this->valor_cofins,
            'valor_csll'               => $this->valor_csll,
            'valor_inss'               => $this->valor_inss,
            'valor_ir'                 => $this->valor_ir,
            'valor_pis'                => $this->valor_pis,
            'arquivo_certificado'      => $this->arquivo_certificado,
            'certificado_hidden'       => $this->certificado_hidden,
            'senha_certificado'        => $this->senha_certificado,
            'data_validade'            => $this->data_validade,
            'tipo_emissao'             => $this->tipo_emissao,
            'usuario_acesso_producao'  => $this->usuario_acesso_producao,
            'senha_acesso_producao'    => $this->senha_acesso_producao,
            'token_producao'           => $this->token_producao,
        ]);

        dd($empresa);
    }

    public function render()
    {
        return view('livewire/configuracao/empresa/dados_empresa')->layout('layouts/bootstrap');
    }
}
