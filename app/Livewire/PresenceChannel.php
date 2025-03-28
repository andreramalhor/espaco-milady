<?php

namespace App\Livewire;

use Livewire\Component;

use App\Events\CanalPresenca;

class PresenceChannel extends Component
{
    public $users = [
        [ 'id' => 99, 'apelido' => 'João'],
        // [ 'id' => 88, 'apelido' => 'Maria'],
        // [ 'id' => 77, 'apelido' => 'Pedro'],
    ];
    public $presenca = [];
    public $error; // Mensagem de erro

    protected $listeners = [
        "echo-presence:presenca,here"    => 'func_here',
        "echo-presence:presenca,joining" => 'func_joining',
        "echo-presence:presenca,leaving" => 'func_leaving',



    ];

    public function mount()
    {
        broadcast(new CanalPresenca( \Auth::User()->id, \Auth::User()->apelido));

        // broadcast(new CanalPresenca( \Auth::User()->nome, \Auth::id()));

        // event(new CanalPresenca(
        //     \Auth::User()->nome,
        //     \Auth::id()
        // ));

        $this->dispatch('init-echo');
    }

    // ==================================================================================================================


    public function func_here()
    {
        $this->users[] = [
            'id' => \Auth::id(),
            'apelido' => \Auth::user()->apelido,
        ];
    }

    public function func_joining($user)
    {
        $this->users[] = [
            'id' => $user['id'],
            'apelido' => $user['apelido'],
        ];
    }
    
    public function func_leaving($user)
    {
        $this->users = array_filter($this->users, fn($u) => $u['id'] !== $user['id']);
    }


    // ==================================================================================================================
    public function presencaFuncao()
    {
        $this->users[] = [
            'id' => \Auth::id(),
            'apelido' => \Auth::user()->apelido,
        ];
    }

    public function presenteUser()
    {
        $this->users[] = [
            'id' => 22,
            'apelido' => \Auth::user()->apelido,
        ];
    }

    public function joinUser()
    {
        dd(3333);
        $this->users[] = [
            'id' => 33,
            'apelido' => \Auth::user()->apelido,
            'time' => now()->format('H:i:s')
        ];
    }

    public function hereUsers($users)
    {
        dd(7777);
        $this->users = $users;
    }

    public function joiningUser($type, $user)
    {
        dd(6666);
        $this->presenca[] = [
            'type' => $type,
            'user' => $user['name'],
            'time' => now()->format('H:i:s')
        ];
        
        // Mantém apenas os últimos 5 eventos
        $this->presenca = array_slice($this->presenca, -10);
    }
    
    public function leavingUser($user)
    {
        dd(5555);
        $this->users = array_filter($this->users, fn($u) => $u['id'] !== $user['id']);
    }
    
    public function handleError($error)
    {
        dd(4444);
        $this->error = "Erro na conexão: " . $error.message;
    }

    public function render()
    {
        return view('livewire.presence-channel');
    }
}

// public $mensagensPublicas = [
//     'Mensagem Inicial',	
// ];

// protected $listeners = ['echo:canal-publico,CanalPublico' => 'adicionarMensagem'];

// public function adicionarMensagem($event)
// {
//     $this->mensagensPublicas[] = $event['mensagem']; // Adiciona ao array
// }

// public function render()
// {
//     return view('livewire.public-channel');
// }