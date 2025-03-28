<?php

namespace App\Livewire\Catalogo\Categoria;

use App\Models\Cadastro\Categoria as DBCategoria;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaStore extends Component
{
    use WithPagination;
    
    public $porpagina = 10;
    public $pesquisar = '';
    public $ordenarpor = 'id';
    public $ordemasc = 'true';
    
    public $nome;
    public $tipo;
    public $descricao;
    
    protected $rules = [
        'nome' => [ 'required', 'unique:cat_categorias,nome', 'min:3' ],
    ];

    public function updated($proprietyName)
    {
        $this->validateOnly($proprietyName);
    }
    
    public function store()
    {
        $categoria = DBCategoria::create([
            'nome'      => $this->nome,
            'tipo'      => $this->tipo,
            'descricao' => $this->descricao,
        ]);
        
        session()->flash('success', 'Categoria criada!');
        
        $this->reset();
    }

    public function render()
    {
        return view('livewire/cadastro/categoria/categoria-store')->layout('layouts/bootstrap');
    }
}
