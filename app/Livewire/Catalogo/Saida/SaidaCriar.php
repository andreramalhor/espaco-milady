<?php

namespace App\Livewire\Catalogo\Saida;

use Livewire\Component;
use App\Models\Catalogo\Saida as DBSaida;

class SaidaCriar extends Component
{
  public $dt_saida;
  public $num_saida;
  public $num_pedido;
  public $num_nf;
  public $id_fornecedor;
  public $vlr_total;
  public $vlr_desconto_total;
  public $vlr_frete_total;
  public $status;
  public $obs;
  public $pedido_por;
  public $conferido_por;
  public $tipo;
  public $id_caixa;
  public $id_usuario;
  public $qtd_produtos;
  public $vlr_prod_serv;
  public $vlr_negociados;
  public $vlr_dsc_acr;
  public $vlr_final;
    
  protected $listeners = ['saidaUpdated' => 'refreshList'];

  public function refreshList()
  {
    $this->render();
  }
  
  public function mount()
  {
    $this->dt_saida = \Carbon\Carbon::today()->format('Y-m-d');
  }

  public function rules() 
  {
    return [
      'id_fornecedor' => 'required',
    ];
  }

  public function gravarSaida()
  {
    $this->validate();
    
    $saida = DBSaida::create([
      'dt_saida'          => $this->dt_saida,
      'num_saida'         => $this->num_saida,
      'num_pedido'         => $this->num_pedido,
      'num_nf'             => $this->num_nf,

      'vlr_total'          => $this->vlr_total,
      'vlr_desconto_total' => $this->vlr_desconto_total,
      'vlr_frete_total'    => $this->vlr_frete_total,
      'obs'                => $this->obs,

      'tipo'               => 'Saida',
      'id_caixa'           => null,
      'id_usuario'         => auth()->user()->id,
      'id_fornecedor'      => $this->id_fornecedor,
      'qtd_produtos'       => 0,
      'vlr_prod_serv'      => 0,
      'vlr_negociados'     => 0,
      'vlr_dsc_acr'        => 0,
      'vlr_final'          => 0,
      'status'             => $this->status,

      'pedido_por'         => auth()->user()->id,
      'conferido_por'      => $this->conferido_por,
    ]);
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Saida cadastrada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('cat.saidas')); 
  }
  
  public function render()
  {    
    return view('livewire/catalogo/saida/saida-criar')->layout('layouts/bootstrap');
  }
}
