<?php

namespace App\Livewire\Catalogo\Compra\Auxiliar;

use App\Models\ACL\Funcao as DBFuncao;
use Livewire\Component;

class CompraFuncoes extends Component
{    
    public $compra;

    public function toggleFuncao($compra, $funcao)
    {
        $cargo = DBFuncao::find($funcao);
        
        if(!$cargo->jrlcgwekejwbwel->contains($compra))
        {
            $cargo->znufwevbqgruklz()->attach($compra);
            
            $this->dispatch('swal:alert', [
                'title'     => 'Adicionado!',
                'text'      => 'Função adicionada com sucesso!',
                'icon'      => 'success',
                'iconColor' => 'green',
            ]);
            
        }
        else
        {
            $cargo->znufwevbqgruklz()->detach($compra);
            
            $this->dispatch('swal:alert', [
                'title'     => 'Removido!',
                'text'      => 'Função removida com sucesso!',
                'icon'      => 'warning',
                'iconColor' => 'yellow',
            ]);
        }

        if($cargo->nome == 'Usuário do sistema' && !$cargo->jrlcgwekejwbwel->contains($compra))
        {
            $this->dispatch('compraUpdated', tab: 'tab-usuario_sistema')->to('App\Livewire\Catalogo\Compra\CompraMostrar');
        }
        else
        {
            $this->dispatch('compraUpdated')->to('App\Livewire\Catalogo\Compra\CompraMostrar');    
        }
    }
    
    public function render()
    {
        $funcoes = DBFuncao::get();
        
        if (isset($compra))
        {
            return view('livewire/catalogo/compra/auxiliar/compra-mostrar-funcoes', [
                'funcoes' => $funcoes
            ]);
        }
        else
        {
            return view('livewire/catalogo/compra/auxiliar/compra-criar-funcoes', [
                'funcoes' => $funcoes
            ]);
        }
    }
}
