<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;



#[Title('Seller Dashboard')] 
class SellerDashboard extends Component
{
    public function render()
    {
        return view('livewire.seller-dashboard')
            ->layout('components.layouts.dashboard', 
            [
                'menu' => [
                    [
                        'label' => 'Dashboard',
                        'route_name' => 'seller.dashboard',
                        'active_route' => 'seller.dashboard',
                        'icon' => 'dashboard'
                    ],
                    [
                        'label' => 'Products',
                        'route_name' => '',
                        'active_route' => '',
                        'icon' => 'elusive-list-alt'
                    ],
                    [
                        'label' => 'Orders',
                        'route_name' => '',
                        'active_route' => '',
                        'icon' => 'order'
                    ]
                ]
            ]);
    }
}
