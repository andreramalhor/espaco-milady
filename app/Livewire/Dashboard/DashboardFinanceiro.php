<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardFinanceiro extends Component
{
    public function render()
    {
        return view('livewire.dashboard.financeiro')->layout('layouts/bootstrap');
    }
}
