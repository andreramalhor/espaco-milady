<?php

namespace App\Livewire;

use Livewire\Component;

use App\Events\CanalPublico;

class PublicChannel extends Component
{
    public $mensagens = [
        'Mensagem Inicial',	
    ];

    protected $listeners = ['echo:canal-publico,CanalPublico' => 'adicionarMensagem'];

    // protected function getListeners()
    // {
    //     return [
    //         // "echo-notification:canal-publico,CanalPublico" => 'notificacaoRecebida',
    //         // "echo-presence:canal-publico,CanalPublico" => 'adicionarMensagem',
    //         "echo:canal-publico,CanalPublico" => 'adicionarMensagem',
    //     ];
    // }

    public function notificacaoRecebida($event)
    {
        dump(22, 'notificacaoRecebida',$event);
        $this->mensagens[] = $event['mensagem']; // Adiciona ao array
    }

    public function adicionarMensagem($event)
    {
        $this->mensagens[] = $event['mensagem']; // Adiciona ao array
    }
    
    public function render()
    {
        return view('livewire.public-channel');
    }
}