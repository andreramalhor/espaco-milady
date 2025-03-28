<?php

namespace App\Events;

use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CanalPresenca implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $apelido;
    
    public function __construct($id, $apelido)
    {
        $this->id = $id;
        $this->apelido = $apelido;
    }

    public function broadcastOn()
    {
        return new PresenceChannel('presenca');
    }
    
    public function broadcastWith()
    {
        $array = [
            'id' => $this->id,
            'apelido' => $this->apelido,
        ];

        return $array;
    }
}
