<?php

namespace App\Livewire\Configuracao\Sistema\Acesso\Auxiliar;

use App\Models\ACL\Funcao as DBFuncao;
use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class AcessoPessoa extends Component
{
  public $funcao;
  public $pessoas;
  
  protected $listeners = ['chamarMetodo' => 'remove'];

  public function mount($slug)
  {
    $this->funcao = DBFuncao::where('slug', '=', $slug)->first();
    $this->pessoas = $this->funcao->znufwevbqgruklz;
  }

  public function delete($funcao_id, $pessoa_id)
  {
    $pessoa = DBPessoa::find($pessoa_id);
    
    $this->dispatch('swal:confirm', [
      'title'        => $pessoa->nome,
      'text'         => 'Tem certeza que quer remover '.$this->funcao->nome.' dessa pessoa?',
      'icon'         => 'warning',
      'iconColor'    => 'orange',
      'idEvent'      => $pessoa->id,
    ]);
  }
  
  public function remove($id)
  {
    $this->funcao->znufwevbqgruklz()->detach($id);
    
    $this->dispatch('swal:alert', [
      'title'         => 'Deletado!',
      'text'          => $texto ?? 'Função removida com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
    
    session()->flash('success', 'Pessoa removida!');
    
    // Atualiza a lista de pessoas no componente PessoaIndex
    $this->dispatch('funcaoRefresh');
  }
  
  public function render()
  {
    return view('livewire/configuracao/sistema/acesso/acesso/funcao-pessoas')->layout('layouts/bootstrap');
  }
}
