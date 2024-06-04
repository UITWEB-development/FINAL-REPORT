<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use Livewire\Component;
use Livewire\Attributes\Title;

class AdminDashboardCustomers extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard-customers')
        ->layout('components.layouts.dashboard', DashboardConstants::ADMIN_DASHBOARD_MENU);
    }
}
