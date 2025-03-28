<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DashboardVendas extends Component
{
    public function render()
    {
        return view('livewire.dashboard.vendas')->layout('layouts/bootstrap');
    }
}
