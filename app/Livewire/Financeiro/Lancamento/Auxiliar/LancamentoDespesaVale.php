<?php

namespace App\Livewire\Financeiro\Lancamento\Auxiliar;

use Livewire\Component;

use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\Atendimento\Pessoa as DBPessoa;

class LancamentoDespesaVale extends Component
{
    public $colaboradores = [];
    public $modal_despesa_vale = false;
  
    public $despesa_vale_colaborador;
    public $despesa_vale_descricao;
    public $despesa_vale_valor;

    protected $listeners = [
        'abrir-modal-despesa-vale' => 'toggle_modal',
    ];  

    public function mount()
    {
        $this->colaboradores = DBPessoa::colaboradores()->orderBy('nome', 'asc')->get();
    }
    
    public function toggle_modal($modal=null)
    {
      $this->modal_despesa_vale = $modal ?? !$this->modal_despesa_vale;
  
      if($this->modal_despesa_vale == false)
      {
        $this->reset(['despesa_vale_colaborador', 'despesa_vale_descricao', 'despesa_vale_valor']);
      }
    }

    public function despesa_vale_concluir()
    {
        $transf_origem = DBLancamento::create([
            'tipo'                   => 'D',
            'id_banco'               => auth()->user()->abcdefghijklmno()->where('status', '=', 'Aberto')->first()->id_banco,
            'id_conta'               => 17,
            'num_documento'          => $this->num_documento ?? null,
            'id_cliente'             => $this->despesa_vale_colaborador,
            'informacao'             => 'Vale: '.$this->despesa_vale_descricao,
            'vlr_bruto'              => $this->num_convert_decimal($this->despesa_vale_valor),
            'vlr_dsc_acr'            => 0,
            'vlr_final'              => $this->num_convert_decimal($this->despesa_vale_valor),
            'parcela'                => '01/01',
            'id_forma_pagamento'     => 1,
            'descricao'              => 'Vale: '.$this->despesa_vale_descricao,
            'dt_vencimento'          => \Carbon\Carbon::now(),
            'dt_confirmacao'         => null,
            'dt_quitacao'           => \Carbon\Carbon::now(),
            'dt_competencia'         => \Carbon\Carbon::now(),
            'id_usuario_lancamento'  => \Auth::User()->id,
            'id_usuario_confirmacao' => $this->id_usuario_confirmacao ?? null,
            'id_caixa'               => auth()->user()->abcdefghijklmno()->where('status', '=', 'Aberto')->first()->id ?? null,
            'id_lancamento_origem'   => null,
            'origem'                 => 'fin_conta_interna_vale',
            'status'                 => 'Confirmado',
            'centro_custo'           => $this->centro_custo ?? null,
        ]);

        $transf_origem->ewifjiosdnoidwm()->create([
            'fonte_origem'  => 'fin_lancamento',
            'id_pessoa'     => $this->despesa_vale_colaborador,
            'tipo'          => $this->despesa_vale_descricao,
            'percentual'    => 100,
            'valor'         => $this->num_convert_decimal($this->despesa_vale_valor) * -1,
            'dt_prevista'   => \Carbon\Carbon::now(),
            'dt_quitacao'   => null,
            'id_destino'    => null,
            'fonte_destino' => null,
            'status'        => 'Em aberto',
        ]);
        
        $transf_origem->update([
            'id_lancamento_origem' => $transf_origem->ewifjiosdnoidwm()->first()->id,
        ]);

        $this->dispatch('swal:alert', [
            'title'         => 'Confirmado!',
            'text'          => $texto ?? 'Vale lançado com sucesso!',
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
        return view('livewire/financeiro/lancamento/modais/despesa-vale')->layout('layouts/bootstrap');
    }
}
       