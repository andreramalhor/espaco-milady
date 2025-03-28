<?php

namespace App\Livewire\Configuracao\FormaPagamentos;

use App\Models\ACL\FormaPagamentos as DBFormaPagamentos;
use Livewire\Component;

class FormaPagamentosDeletar extends Component
{
    public $forma_de_pagamento;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount($id)
    {
        $forma_de_pagamento = DBFormaPagamentos::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $forma_de_pagamento->nome,
            'text'         => 'Tem certeza que quer deletar a forma_de_pagamento?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $forma_de_pagamento->id,
        ]);
    }
    
    public function delete($id)
    {
        $forma_de_pagamento = DBFormaPagamentos::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $forma_de_pagamento->nome,
            'text'         => 'Tem certeza que quer deletar a forma_de_pagamento?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $forma_de_pagamento->id,
        ]);
    }

    public function render($id)
    {
        $forma_de_pagamento = DBFormaPagamentos::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$forma_de_pagamento->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Permissão e foto deletada com sucesso!';
        }

        $forma_de_pagamento->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Permissão deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        session()->flash('success', 'Permissão Deletada!');

        // Atualiza a lista de forma_de_pagamento no componente PermissãoIndex
        $this->dispatch('forma_de_pagamentoDeleted');
    }

    // public function render()
    // {
    //     return view('livewire/atendimento/forma_de_pagamento/forma_de_pagamento-delete')->layout('layouts/bootstrap');
    // }
}
