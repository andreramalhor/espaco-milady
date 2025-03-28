<?php

namespace App\Livewire\Financeiro\Lancamento;

use Livewire\Component;

use App\Models\Atendimento\Pessoa;
use App\Models\Financeiro\Lancamento;
use App\Models\Financeiro\LancamentoGeral;
use App\Models\Financeiro\Banco;
use App\Models\Contabilidade\ContaContabil;
use App\Models\Configuracao\FormaPagamento;

class LancamentoCriarDespesa extends Component
{
    public $tipo;
    public $id_banco;
    public $id_conta;
    public $num_documento;
    public $id_pessoa;
    public $informacao;
    public $vlr_bruto;
    public $vlr_dsc_acr;
    public $vlr_final;
    public $parcela;
    public $id_forma_pagamento;
    public $descricao;
    public $dt_vencimento;
    public $dt_competencia;
    public $dt_confirmacao;
    public $dt_quitacao;
    public $id_usuario_lancamento;
    public $id_usuario_confirmacao;
    public $id_caixa;
    public $id_lancamento_origem;
    public $origem;
    public $status = 'Em aberto';
    public $centro_custo;

    // variáveis de controle
    public $dt_quitacao_controle = false;

    public function mount()
    {
        $this->tipo                  = 'D';
        $this->centro_custo          = 'Espaço Milady';
        // $this->id_forma_pagamento    = 'Dinheiro';
        $this->id_forma_pagamento    = 1;
        $this->parcela               = 1;
        $this->dt_vencimento         = \Carbon\Carbon::today()->format('Y-m-d');
        $this->dt_competencia        = \Carbon\Carbon::today()->format('Y-m-d');
        $this->dt_quitacao          = \Carbon\Carbon::today()->format('Y-m-d');
        $this->dt_confirmacao        = \Carbon\Carbon::today()->format('Y-m-d');
        $this->id_usuario_lancamento = auth()->user()->id;
        
        if(!is_null(auth()->user()->abcdefghijklmno))
        {
            $this->id_banco = auth()->user()->abcdefghijklmno->id_banco;
            $this->id_caixa = auth()->user()->abcdefghijklmno->id;
        }
    }

    public function controle()
    {
        if($this->dt_quitacao_controle)
        {
            $this->status = 'Confirmado';
            $this->dt_quitacao = \Carbon\Carbon::today()->format('Y-m-d');
        }
        else
        {
            $this->status = 'Em aberto';
            $this->dt_quitacao = null;
        }
    }
    
    public function rules()
    {
        return [
            'tipo'                   => 'required',
            'id_banco'               => 'required',
            'id_conta'               => 'nullable',
            'informacao'             => 'nullable',
            'vlr_bruto'              => 'nullable',
            'vlr_dsc_acr'            => 'nullable',
            'vlr_final'              => 'required',
            'parcela'                => 'required',
            'id_forma_pagamento'     => 'required',
            'descricao'              => 'required',
            'dt_vencimento'          => 'required',
            'dt_competencia'         => 'required',
            'dt_quitacao'           => 'required',
            'dt_confirmacao'         => 'required',
            'id_usuario_lancamento'  => 'required',
            'id_usuario_confirmacao' => 'nullable',
            'id_caixa'               => 'nullable',
            'id_lancamento_origem'   => 'nullable',
            'origem'                 => 'nullable',
            'status'                 => 'nullable',
            'centro_custo'           => 'required',
        ];
    }

    public function criar() 
    {
        // $this->validate();

        $lancamento = Lancamento::create([
            'tipo'                   => $this->tipo,
            'id_banco'               => $this->id_banco,
            'id_conta'               => $this->id_conta,
            'num_documento'          => $this->num_documento,
            'id_pessoa'              => $this->id_pessoa,
            'informacao'             => $this->informacao,
            'vlr_bruto'              => str_replace(['.', ','], ['', '.'], $this->vlr_bruto ?? 0),
            'vlr_dsc_acr'            => str_replace(['.', ','], ['', '.'], $this->vlr_dsc_acr ?? 0),
            'vlr_final'              => str_replace(['.', ','], ['', '.'], $this->vlr_final ?? 0),
            'parcela'                => $this->parcela,
            'id_forma_pagamento'     => $this->id_forma_pagamento,
            'descricao'              => $this->descricao,
            'dt_vencimento'          => $this->dt_vencimento,
            'dt_competencia'         => $this->dt_competencia,
            'dt_confirmacao'         => $this->dt_confirmacao,
            'dt_quitacao'           => $this->dt_quitacao,
            'id_usuario_lancamento'  => $this->id_usuario_lancamento,
            'id_usuario_confirmacao' => $this->id_usuario_confirmacao,
            'id_caixa'               => $this->id_caixa,
            'id_lancamento_origem'   => $this->id_lancamento_origem,
            'origem'                 => $this->origem,
            'status'                 => $this->status,
            'centro_custo'           => $this->centro_custo,
        ]);

        $lancamento = LancamentoGeral::create([
            'tipo'                   => $this->tipo,
            'id_banco'               => $this->id_banco,
            'id_conta'               => $this->id_conta,
            'num_documento'          => $this->num_documento,
            'id_pessoa'              => $this->id_pessoa,
            'informacao'             => $this->informacao,
            'vlr_bruto'              => str_replace(['.', ','], ['', '.'], $this->vlr_bruto ?? 0),
            'vlr_dsc_acr'            => str_replace(['.', ','], ['', '.'], $this->vlr_dsc_acr ?? 0),
            'vlr_final'              => str_replace(['.', ','], ['', '.'], $this->vlr_final ?? 0),
            'parcela'                => $this->parcela,
            'id_forma_pagamento'     => $this->id_forma_pagamento,
            'descricao'              => $this->descricao,
            'dt_vencimento'          => $this->dt_vencimento,
            'dt_competencia'         => $this->dt_competencia,
            'dt_confirmacao'         => $this->dt_confirmacao,
            'dt_quitacao'           => $this->dt_quitacao,
            'id_usuario_lancamento'  => $this->id_usuario_lancamento,
            'id_usuario_confirmacao' => $this->id_usuario_confirmacao,
            'id_caixa'               => $this->id_caixa,
            'id_lancamento_origem'   => $this->id_lancamento_origem,
            'origem'                 => $this->origem,
            'status'                 => $this->status,
            'centro_custo'           => $this->centro_custo,
        ]);

        session()->flash('success', 'Lançamento gravado com sucesso');

        $this->dispatch('swal:alert', [
            'title'     => 'Criado!',
            'text'      => 'Lançamento cadastrado com sucesso!',
            'icon'      => 'success',
            'iconColor' => 'green',
        ]);

        redirect()->route('fin.lancamentos.index');
    }

    public function render()
    {
        $clientes              = Pessoa::pluck('nome', 'id');
        $bancos                = Banco::pluck('nome', 'id');
        $contaRaiz             = ContaContabil::find(2);
        $formas_pagamentos     = FormaPagamento::select('forma')->distinct()->get();
        
        return view('livewire/financeiro/lancamento/lancamento-criar-despesa', [
            'clientes'          => $clientes,
            'bancos'            => $bancos,
            'contaRaiz'         => $contaRaiz,
            'formas_pagamentos' => $formas_pagamentos,
        ])->layout('layouts/bootstrap');
    }
}
