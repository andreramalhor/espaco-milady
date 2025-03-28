<?php

namespace App\Livewire\Atendimento\Pessoa\Auxiliar;

use App\Models\ACL\Funcao as DBFuncao;
use Livewire\Component;

class PessoaFuncoes extends Component
{    
    public $pessoa;

    public function toggleFuncao($pessoa, $funcao)
    {
        dd(1111);
        $cargo = DBFuncao::find($funcao);
        
        if(!$cargo->jrlcgwekejwbwel->contains($pessoa))
        {
            $cargo->znufwevbqgruklz()->attach($pessoa);
            
            $this->dispatch('swal:alert', [
                'title'     => 'Adicionado!',
                'text'      => 'Função adicionada com sucesso!',
                'icon'      => 'success',
                'iconColor' => 'green',
            ]);
            
        }
        else
        {
            $cargo->znufwevbqgruklz()->detach($pessoa);
            
            $this->dispatch('swal:alert', [
                'title'     => 'Removido!',
                'text'      => 'Função removida com sucesso!',
                'icon'      => 'warning',
                'iconColor' => 'yellow',
            ]);
        }

        if($cargo->nome == 'Usuário do sistema' && !$cargo->jrlcgwekejwbwel->contains($pessoa))
        {
            $this->dispatch('pessoaUpdated', tab: 'tab-usuario_sistema')->to('App\Livewire\Atendimento\Pessoa\PessoaMostrar');
        }
        else
        {
            $this->dispatch('pessoaUpdated')->to('App\Livewire\Atendimento\Pessoa\PessoaMostrar');    
        }
    }
    
    public function render()
    {
        $funcoes = DBFuncao::get();
        
        if (isset($pessoa))
        {
            return view('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-funcoes', [
                'funcoes' => $funcoes
            ]);
        }
        else
        {
            return view('livewire/atendimento/pessoa/auxiliar/pessoa-criar-funcoes', [
                'funcoes' => $funcoes
            ]);
        }
    }
}
