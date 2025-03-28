<?php

namespace App\Livewire\Atendimento\Agendamento;

use App\Models\Agendamento\Ordem as DBOrdem;
use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class AgendamentoOrdem extends Component
{
  public $modal = false;
  
  public $parceiros;
  
  public $perfil_selecionado;
  public $parceiros_perfil_selecionado = [];

  public $criar_perfil = false;
  public $nome_novo_perfil;

  public $auth_id;
  public $sasas;

  protected $listeners = [
    'showModalOrdem' => 'showModalOrdemHandler',
  ];

  public function mount()
  {
    $this->parceiros = DBPessoa::parceiros()->orderBy('apelido', 'asc')->get();
  }

  public function abrir_nome_novo()
  {
    $this->criar_perfil = true;
  }

  public function gravar_novo_perfil()
  {
    $novo = DBOrdem::create([
      'auth_user'  => auth()->user()->id,
      'nome_ordem' => $this->nome_novo_perfil,
      'area'       => null,
      'ordem'      => null,
      'id_pessoa'  => null,
    ]);

    $this->perfil_selecionado = $novo->nome_ordem;
    
    $this->criar_perfil = false;
    $this->nome_novo_perfil  = null;

    $this->parceiros_perfil_selecionado = $this->parceiros_perfil_selecionado();
  }

  public function selecionar_perfil($perfil_selecionado=null): void
  {
    if($perfil_selecionado!=null)
    {
      $this->perfil_selecionado = $perfil_selecionado;

      $this->parceiros_perfil_selecionado = $this->parceiros_perfil_selecionado();
    }
  }

  public function parceiros_perfil_selecionado()
  {
    return DBOrdem::
                        where('auth_user', auth()->user()->id)->
                        where('nome_ordem', $this->perfil_selecionado)->
                        orderBy('ordem', 'asc')->
                        get();
  }
  
  public function adicionar_usuario_ao_perfil($id_pessoa)
  {
    $this->parceiros_perfil_selecionado = $this->parceiros_perfil_selecionado();

    if($this->parceiros_perfil_selecionado->count() == 1 && $this->parceiros_perfil_selecionado->first()->id_pessoa == null)
    {
      $this->parceiros_perfil_selecionado->first()->update([
        'auth_user'  => auth()->user()->id,
        'nome_ordem' => $this->perfil_selecionado,
        'area'       => null,
        'ordem'      => 1,
        'id_pessoa'  => $id_pessoa,
      ]);
    }
    else
    {
      DBOrdem::create([
        'auth_user'  => auth()->user()->id,
        'nome_ordem' => $this->perfil_selecionado,
        'area'       => null,
        'ordem'      => 1,
        'id_pessoa'  => $id_pessoa,
      ]);
    }

    $this->parceiros_perfil_selecionado = $this->parceiros_perfil_selecionado();
  }
  
  public function remover_usuario_ao_perfil($id)
  {
    $perfil = DBOrdem::find($id);

    $perfil->delete();

    $this->parceiros_perfil_selecionado = $this->parceiros_perfil_selecionado();
  }
  
  public function atualizar_ordem($ordem)
  {
    parse_str($ordem, $nova_ordem);

    foreach($this->parceiros_perfil_selecionado as $parceiro)
    {
      $parceiro->update([
        'ordem' => array_search($parceiro->id_pessoa, $nova_ordem['usuario_perfil']),
      ]);
    }

    $this->parceiros_perfil_selecionado = $this->parceiros_perfil_selecionado();
  }
  
  public function excluir_perfil($perfil_nome)
  {
    $perfis = DBOrdem::
                            where('auth_user', '=', auth()->user()->id)->
                            where('nome_ordem', '=', $perfil_nome)->
                            get();

    $perfis->each(function ($perfil, $key)
    {
      $perfil->delete();
    });

    $this->dispatch('swal:alert', [
      'title'     => 'Excluído!',
      'text'      => 'Perfil excluído com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }

  public function cabecalhos($id, $status)
  {
    $parceiro = DBOrdem::find($id);

    if ($status)
    {
      $parceiro->update([
        'ordem' => 100,
        'area'  => null
      ]);
    }
    else
    {
      $parceiro->update([
        'ordem' => null,
        'area'  => null
      ]);
    }

    $this->dispatch('contentChanged');
  }

  public function atualiza_ordem($id, $ordem)
  {
    $parceiro = DBOrdem::find($id);

    if ($ordem >= 0)
    {
      $parceiro->update([
        'ordem' => $ordem,
        'area'  => null
      ]);
    }

    $this->dispatch('contentChanged');
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Agendamento cadastrado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
        
    $this->dispatch('FullCalendar:refresh');
  }

  public function render()
  {
    $perfis = DBOrdem::
                                  where('auth_user', auth()->user()->id)->
                                  get();

    $parceiros_perfil_selecionado  = $this->selecionar_perfil();

    return view('livewire/atendimento/agendamento/agendamento-ordem', 
    [
      'perfis'                        => $perfis,
      'parceiros_perfil_selecionado ' => $parceiros_perfil_selecionado ,
    ])->layout('layouts/bootstrap');
  }
}
