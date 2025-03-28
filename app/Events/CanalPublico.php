<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CanalPublico implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mensagem;

    public function __construct($mensagem)
    {
        // dump(11, $this->mensagem);
        $this->mensagem = $mensagem;
    }

    public function broadcastOn()
    {
        // dump(12, 'broadcastOn');
        return new Channel('canal-publico');
    }

    public function broadcastWith()
    {
        // dump(13, 'broadcastWith');
        $array = [
            'mensagem' => $this->mensagem,
        ];

        return $array;
    }
}