<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.bootstrap.dashboard')->layout('layouts/bootstrap');
        // return view('livewire.dashboard')->layout('layouts/bootstrap');
    }
}
