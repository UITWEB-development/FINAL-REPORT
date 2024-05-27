<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use Livewire\Component;
use Livewire\Attributes\Title;



#[Title('Seller Dashboard')] 
class SellerDashboardProducts extends Component
{
    public function render()
    {
        return view('livewire.seller-dashboard-products')
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }


}
