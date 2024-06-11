<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Seller Dashboard - Products')]
class SellerDashboardProducts extends Component
{
    
    public function render()
    {
        $products = auth()->user()->products()->paginate(6);

        return view('livewire.seller-dashboard-products')->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
