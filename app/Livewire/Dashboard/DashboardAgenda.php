<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardAgenda extends Component
{
    public function render()
    {
        return view('livewire.dashboard.agenda')->layout('layouts/bootstrap');
    }
}
