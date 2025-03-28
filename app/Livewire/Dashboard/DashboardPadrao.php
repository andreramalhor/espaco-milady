<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardPadrao extends Component
{
    public function render()
    {
        return view('livewire.dashboard.padrao')->layout('layouts/bootstrap');
    }
}
