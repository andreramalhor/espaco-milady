<?php

namespace App\Livewire\Configuracao\Sistema\Acesso;

use App\Models\ACL\Funcao as DBFuncao;
use App\Models\ACL\Permissao as DBPermissao;
use Livewire\Component;

class CCCCMostrar extends Component
{
  public $slug;
  public $funcao;
  public $permissoes;

  public $tab_active = 'tab-sobre';
  
  protected $listeners = ['funcaoUpdated' => 'refreshList'];
  
  public function refreshList($tab=null)
  {
    $this->tab_active = $tab ?? $this->tab_active;

    $this->render();
  }
  
  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }
  
  public function togglePermissao($permissao, $funcao)
  {
    $permiss = DBpermissao::find($permissao);

    if(!$permiss->dzjvxinawjwtnfa->contains($funcao))
    {
      $permiss->dzjvxinawjwtnfa()->attach($funcao);
      
      // $this->dispatch('swal:alert', [
      //   'title'     => 'Adicionado!',
      //   'text'      => 'Permissão adicionada com sucesso!',
      //   'icon'      => 'success',
      //   'iconColor' => 'green',
      // ]);
      
    }
    else
    {
      $permiss->dzjvxinawjwtnfa()->detach($funcao);
      
      $this->dispatch('swal:alert', [
        'title'     => 'Removido!',
        'text'      => 'Permissão removida com sucesso!',
        'icon'      => 'warning',
        'iconColor' => 'yellow',
      ]);
    }
  }
  
  public function mount()
  {
    $this->funcao = DBFuncao::where('slug', $this->slug)->first();
  }

  public function render()
  {
    $this->permissoes = DBPermissao::get();

    return view('livewire/configuracao/sistema/acesso/acesso/funcao-mostrar', [
      'permissoes' => $this->permissoes 
    ])->layout('layouts/bootstrap');
  }
}
