<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class PrivateChannel extends Component
{
    public $mensagensPriavadas = [
        [
            'user_id' => 1,
            'text' => 'Mensagem Inicial',
            'time' => '10:00',
        ],
        [
            'user_id' => 2,
            'text' => 'Resposta Inicial',
            'time' => '10:01',
        ],
    ];

    public $novaMensagem = '';

    protected function getListeners()
    {
        $userId = Auth::id();

        return [
            "echo-private:App.Models.Atendimento.Pessoa.{$userId},CanalPrivado" => 'mensagemDeForaPrivado',
        ];
    }

    public function mensagemDeForaPrivado($event)
    {
        $this->mensagensPriavadas[] = [
            'user_id' => $event['user'],
            'text' => $event['mensagem'],
            'time' => $event['time']
        ];
    }

    public function render()
    {
        return view('livewire.private-channel');
    }
    
    public function enviarMensagem()
    {
        $this->validate(['novaMensagem' => 'required|max:255']);
        

        event(new \App\Events\CanalPrivado(
            Auth::id(),
            $this->novaMensagem,
            now()->format('H:i')
        ));

        $this->novaMensagem = '';
    }
}