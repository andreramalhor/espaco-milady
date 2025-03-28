<?php

namespace App\Livewire\PDV\Comanda;

use Livewire\Component;
use App\Models\PDV\Caixa as DBCaixa;

class ComandaIndex extends Component
{
    protected $listeners = ['chamarMetodo' => 'remove'];
    
    public $caixa;
    
    public function mount()
    {
        $this->caixa = DBCaixa::where('status', '=', 'Aberto')->where('id_usuario_abertura', '=', auth()->user()->id)->first();
        
        if($this->caixa == null)
        {
            return redirect()->route('pdv.caixas.index');
        }
    }

    public function render()
    {
        return view('livewire/pdv/comanda/comanda-index')->layout('layouts/bootstrap');
    }
}
