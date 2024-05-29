<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Admin Dashboard')] 
class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard')
            ->layout('components.layouts.dashboard', DashboardConstants::ADMIN_DASHBOARD_MENU);
    }
}
