<?php

namespace App\Livewire\Atendimento\Agendamento;

use App\Models\Atendimento\Agendamento as DBAgendamento;
use Livewire\Component;
use Livewire\WithPagination;

class AgendamentoListar extends Component
{
  use WithPagination;
  
  protected $paginationTheme = 'bootstrap';
  
  public $p_pesquisar;
  public $p_nome;
  public $p_email;
  public $p_endereco;
  public $p_telefone;

  public $nome;
  public $apelido;
  public $dt_nascimento;
  public $email;
  public $sexo;
  public $cpf;
  public $instagram;
  public $observacao;
  public $ddd;
  public $telefone;
  public $cep;
  public $logradouro;
  public $numero;
  public $bairro;
  public $cidade;
  public $uf = 'MG';
  
  public $foto;
  
  public $agendamento = [];
  public $agendamentoId;

  protected $listeners = ['chamarMetodo' => 'remove'];
  // protected $listeners = ['agendamentoUpdated' => 'refreshList'];
  
  // public function refreshList()
  // {
  //   $this->resetPage();
  // }
  
  public function delete($id)
  {
    $agendamento = DBAgendamento::find($id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $agendamento->nome,
      'text'         => 'Tem certeza que quer deletar a agendamento?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $agendamento->id,
    ]);
  }
  
  public function remove($id)
  {
    $agendamento = DBAgendamento::withTrashed()->find($id);
    
    $informacao = [
      'start' => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->startOfDay()->format('Y-m-d H:i:s'),
      'end'   => \Carbon\Carbon::parse($agendamento->start)->setTimezone('America/Sao_Paulo')->endOfDay()->format('Y-m-d H:i:s'),
    ];
    
    $agendamento->delete();
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Agendamento deletada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Agendamento Deletada!');
    
    $this->dispatch('fullcalendar-refresh', $informacao['start'], $informacao['end'] );
  }
  
  public function listar()
  {
    $agendamentos = DBAgendamento::
            pesquisar($this->p_pesquisar)->
            when($this->p_nome, function ($query1)
            {
              $query1->where('nome', 'LIKE', '%'.$this->p_nome.'%' )->orWhere('apelido', 'LIKE', '%'.$this->p_nome.'%' );
            })->
            orderBy('id', 'desc')->
            paginate();

    return $agendamentos;
  }
  
  public function render()
  {
    $agendamentos = $this->listar();
    
    return view('livewire/atendimento/agendamento/agendamento-listar', [
      'agendamentos' => $agendamentos,
    ])->layout('layouts/bootstrap');
  }
}
  