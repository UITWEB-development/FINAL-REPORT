<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Seller Orders')]
class SellerDashboardOrders extends Component
{
    public function render()
    {
        return view('livewire.seller-dashboard-orders')
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
