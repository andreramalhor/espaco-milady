<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardGeral extends Component
{
    public function render()
    {
        return view('livewire.dashboard.geral')->layout('layouts/bootstrap');
    }
}
