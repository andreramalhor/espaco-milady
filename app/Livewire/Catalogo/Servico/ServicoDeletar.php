<?php

namespace App\Livewire\Catalogo\Servico;

use App\Models\Catalogo\DBServicoProduto as DBServicoProduto;
use Livewire\Component;

class ServicoDeletar extends Component
{
    public $pessoa;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function delete($id)
    {
        $pessoa = DBServicoProduto::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $pessoa->nome,
            'text'         => 'Tem certeza que quer deletar a pessoa?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $pessoa->id,
        ]);
    }

    public function remove($id)
    {
        $pessoa = DBServicoProduto::withTrashed()->find($id);
        
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

        // Atualiza a lista de pessoas no componente AAAAIndex
        $this->dispatch('pessoaDeleted');
    }

    public function render()
    {
        return view('livewire/catalogo/servico/servico-delete')->layout('layouts/bootstrap');
    }
}
