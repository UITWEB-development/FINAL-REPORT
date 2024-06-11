<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Constants\OrderStateConstants;

#[Title('Seller Dashboard - Orders')]
class SellerDashboardOrders extends Component
{
    public function render()
    {
        $user = auth()->user();
        $orders = $user->orders;
        return view('livewire.seller-dashboard-orders', ['user' => $user, 'orders'=> $orders, 'styles' => OrderStateConstants::STYLES])
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
