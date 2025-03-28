<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Atendimento\Pessoa;

class CanalPrivado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mensagem;
    public $user;

    public function __construct($id, $mensagem)
    {
        $this->user = Pessoa::find($id);
        $this->mensagem = $mensagem;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('App.Models.Atendimento.Pessoa.' . $this->user->id);
    }

    public function broadcastWith()
    {
        $array = [
            'mensagem' => $this->mensagem,
            'user' => $this->user->apelido,
            'time' => now()->format('H:i:s')
        ];

        return $array;
    }
}