<?php

namespace App\Livewire\Atendimento\Pessoa;

use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;

class PessoaDeletar extends Component
{
    public $pessoa;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $pessoa = DBPessoa::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $pessoa->nome,
            'text'         => 'Tem certeza que quer deletar a pessoa?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $pessoa->id,
        ]);
    }
    
    public function delete($id)
    {
        $pessoa = DBPessoa::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $pessoa->nome,
            'text'         => 'Tem certeza que quer deletar a pessoa?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $pessoa->id,
        ]);
    }

    public function render($id)
    {
        $pessoa = DBPessoa::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$pessoa->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Pessoa e foto deletada com sucesso!';
        }

        $pessoa->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Pessoa deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Pessoa Deletada!');

        // Atualiza a lista de pessoas no componente PessoaIndex
        $this->dispatch('pessoaDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/atendimento/pessoa/pessoa-delete')->layout('layouts/bootstrap');
    // }
}
