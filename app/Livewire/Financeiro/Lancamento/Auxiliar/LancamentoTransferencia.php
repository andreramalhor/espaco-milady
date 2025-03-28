<?php

namespace App\Livewire\Financeiro\Lancamento\Auxiliar;

use Livewire\Component;

use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\Financeiro\Banco as DBBanco;

class LancamentoTransferencia extends Component
{
    public $bancos = [];
    public $modal_transferencia = false;

    public $transferencia_origem_banco;
    public $transferencia_origem_caixa;
    public $transferencia_destino_banco;
    public $transferencia_destino_caixa;
    public $transferencia_valor;
  
    protected $listeners = [
        'abrir-modal-transferencia' => 'toggle_modal',
    ];  

    public function mount()
    {
        $this->bancos = DBBanco::orderBy('nome', 'asc')->get();
    }
    
    public function toggle_modal($modal=null)
    {
      $this->modal_transferencia = $modal ?? !$this->modal_transferencia;
  
      if($this->modal_transferencia == false)
      {
        $this->reset(['transferencia_origem_banco', 'transferencia_origem_caixa', 'transferencia_destino_banco', 'transferencia_destino_caixa', 'transferencia_valor']);
      }
    }

    public function transferencia_concluir()
    {
        $transf_origem = DBLancamento::create([
            'tipo'                   => 'T',
            'id_banco'               => $this->transferencia_origem_banco,
            'id_conta'               => 3,
            'num_documento'          => $this->num_documento ?? null,
            'id_cliente'             => 1,
            'informacao'             => 'Transferência '.DBBanco::find($this->transferencia_origem_banco)->nome.' > '.DBBanco::find($this->transferencia_destino_banco)->nome,
            'vlr_bruto'              => $this->num_convert_decimal($this->transferencia_valor) * -1,
            'vlr_dsc_acr'            => 0,
            'vlr_final'              => $this->num_convert_decimal($this->transferencia_valor) * -1,
            'parcela'                => '01/01',
            'id_forma_pagamento'     => 1,
            'descricao'              => $this->descricao ?? null,
            'dt_vencimento'          => \Carbon\Carbon::now(),
            'dt_confirmacao'         => null,
            'dt_quitacao'           => \Carbon\Carbon::now(),
            'dt_competencia'         => \Carbon\Carbon::now(),
            'id_usuario_lancamento'  => \Auth::User()->id,
            'id_usuario_confirmacao' => $this->id_usuario_confirmacao ?? null,
            'id_caixa'               => $this->transferencia_origem_caixa ?? null,
            'id_lancamento_origem'   => null,
            'origem'                 => 'fin_lancamento',
            'status'                 => 'Confirmado',
            'centro_custo'           => $this->centro_custo ?? null,
        ]);
        
        $transf_destino = DBLancamento::create([
            'tipo'                   => 'T',
            'id_banco'               => $this->transferencia_destino_banco,
            'id_conta'               => 3,
            'num_documento'          => $this->num_documento ?? null,
            'id_cliente'             => 1,
            'informacao'             => 'Transferência '.DBBanco::find($this->transferencia_origem_banco)->nome.' > '.DBBanco::find($this->transferencia_destino_banco)->nome,
            'vlr_bruto'              => $this->num_convert_decimal($this->transferencia_valor),
            'vlr_dsc_acr'            => 0,
            'vlr_final'              => $this->num_convert_decimal($this->transferencia_valor),
            'parcela'                => '01/01',
            'id_forma_pagamento'     => 1,
            'descricao'              => $this->descricao ?? null,
            'dt_vencimento'          => \Carbon\Carbon::now(),
            'dt_confirmacao'         => null,
            'dt_quitacao'           => \Carbon\Carbon::now(),
            'dt_competencia'         => \Carbon\Carbon::now(),
            'id_usuario_lancamento'  => \Auth::User()->id,
            'id_usuario_confirmacao' => $this->id_usuario_confirmacao ?? null,
            'id_caixa'               => $this->transferencia_destino_caixa ?? null,
            'id_lancamento_origem'   => $transf_origem->id,
            'origem'                 => 'fin_lancamento',
            'status'                 => 'Confirmado',
            'centro_custo'           => $this->centro_custo ?? null,
        ]);
        
        $transf_origem->update([
            'id_lancamento_origem'   => $transf_destino->id,
        ]);
        
        $this->dispatch('swal:alert', [
            'title'         => 'Confirmado!',
            'text'          => $texto ?? 'Transferência concluída com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);
        
        $this->toggle_modal();
        
        $this->dispatch('listar-lancamentos');
    }
    
    public function num_convert_decimal( $valor )
    {
        return str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $valor)));
    }
    
    public function render()
    {
        return view('livewire/financeiro/lancamento/modais/transferencia')->layout('layouts/bootstrap');
    }
}
       