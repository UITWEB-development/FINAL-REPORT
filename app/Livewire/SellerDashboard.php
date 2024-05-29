<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Constants\DashboardConstants;


#[Title('Seller Dashboard')] 
class SellerDashboard extends Component
{
    public function render()
    {
        return view('livewire.seller-dashboard')
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
