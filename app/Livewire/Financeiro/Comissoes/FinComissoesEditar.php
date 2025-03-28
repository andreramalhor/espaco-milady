<?php

namespace App\Livewire\Financeiro\Comissoes;

use Livewire\Component;
use App\Models\Financeiro\ContaInterna as DBContaInterna;

class FinComissoesEditar extends Component
{
  public $comissao;
  public $servico;
  public $profissionals;
  public $id_pessoa;
  
  public $percentual;
  public $valor;

  public $pode_editar = 'disabled';

  public function mount($id)
  {
    $this->comissao = DBContaInterna::findOrFail($id);
    
    if( $this->comissao->status != 'Em aberto' )
    {
      return redirect()->to(route('fin.comissoes.abertas', $this->comissao->id_pessoa));
    }

    $this->servico       = $this->comissao->ygferchrtuwewhq;
    $this->profissionals = $this->servico->smenhgskqwmdjwe;
    $this->id_pessoa     = $this->comissao->id_pessoa;

    $this->percentual    = number_format($this->comissao->percentual ?? 0, 2, ',', '.');
    $this->valor         = number_format($this->comissao->valor ?? 0, 2, ',', '.');
  }
  
  public function profissional_selecionar()
  {
    $this->percentual = number_format($this->profissionals->where('id_profexec', '=', $this->id_pessoa)->first()->prc_comissao ?? 0, 2, ',', '.');
    $this->valor      = number_format($this->profissionals->where('id_profexec', '=', $this->id_pessoa)->first()->prc_comissao * $this->comissao->lskjasdlkdflsdj->vlr_final ?? 0, 2, ',', '.');
    
    $this->pode_editar = '';
  }

  public function edit()
  {
    $this->comissao->update([
      'id_pessoa'  => $this->id_pessoa,
      'percentual' => $this->num_convert_decimal( $this->percentual ),
      'valor'      => $this->num_convert_decimal( $this->valor ),
    ]);    
    
    $this->dispatch('swal:alert', [
      'title'     => 'Editado!',
      'text'      => 'Comissão alterada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('fin.comissoes.abertas', $this->comissao->id_pessoa));
  }

  public function num_convert_decimal( $valor ): array|string
  {
    return str_replace(',', '.',str_replace('.', '',str_replace('R$ ', '', $valor)));
  }

  public function render()
  {
    return view('livewire/financeiro/comissoes/comissoes-editar')->layout('layouts/bootstrap');
  }
}
