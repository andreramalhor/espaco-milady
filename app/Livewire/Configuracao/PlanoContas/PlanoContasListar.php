<?php

namespace App\Livewire\Configuracao\PlanoContas;

use App\Models\Contabilidade\ContaContabil as DBContaContabil;
use Livewire\Component;

class PlanoContasListar extends Component
{
  public $plano_de_contas;

  public $modal_criar = false;
  public $nivel;
  public $titulo;
  public $conta_pai;
  public $imprime = 'Sim';
  public $soma = 'Sim';
  public $tem_lancamento;
  public $conta_fim;
  
  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['plano_de_contasUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function mount()
  {
    $this->plano_de_contas = DBContaContabil::orderBy('conta', 'asc')->get();
  }

  public function update_plano_de_contas(DBContaContabil $plano_de_contas, $stasah)
  {
    if($stasah)
    {
      $plano_de_contas->aewluaerqwnisdq()->attach($this->id_pessoa);
    }
    else
    {
      $plano_de_contas->aewluaerqwnisdq()->detach($this->id_pessoa);
    }
  }
  
  public function criar($conta_pai)
  {
    $this->conta_pai   = $conta_pai;
    $this->modal_criar = true;
    $this->nivel       = $this->plano_de_contas->find($conta_pai)->nivel + 1;
    // $this->titulo;
    // $this->imprime;
    // $this->soma;
    // $this->tem_lancamento;
    // $this->conta_fim;
    
    // dd($conta_pai); 
  }

  public function store()
  {
    $this->plano_de_contas = DBContaContabil::create([
      'nivel'          => $this->nivel,
      'titulo'         => $this->titulo,
      'conta_pai'      => $this->conta_pai,
      'imprime'        => $this->imprime,
      'soma'           => $this->soma,
      'tem_lancamento' => 1,
    ]);
  }
  
  public function delete($id)
  {
    $plano_de_contas = DBContaContabil::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $plano_de_contas->nome,
      'text'         => 'Tem certeza que quer deletar a conta?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $plano_de_contas->id,
    ]);
  }
  
  public function remove($id)
  {
    $plano_de_contas = DBContaContabil::find($id);
    
    $plano_de_contas->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Conta deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Conta Deletada!');
    
    // Atualiza a lista de plano_de_contass no componente PlanoContasIndex
    $this->dispatch('plano_de_contasDeleted');
  }
  
  public function fechar_modal()
  {
    $this->modal_criar = false;
  }

  public function render()
  {
    return view('livewire/configuracao/plano_de_conta/plano_de_conta-listar')->layout('layouts/bootstrap');
  }
}
  