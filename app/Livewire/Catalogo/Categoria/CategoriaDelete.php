<?php

namespace App\Livewire\Catalogo\Categoria;

use App\Models\Cadastro\Categoria as DBCategoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaDelete extends Component
{
    public $id;
    public $categoria;
    
    public function delete($id)
    {
        $categoria = DBCategoria::find($id);
        $categoria->delete();

        session()->flash('success', 'Categoria criada!');

        $this->reset();
    }
    

    public function render()
    {
        return view('livewire/cadastro/categoria/categoria-delete')->layout('layouts/bootstrap');
    }
}
