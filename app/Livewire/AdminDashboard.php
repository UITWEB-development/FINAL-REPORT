<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Admin Dashboard')] 
class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard')
            ->layout('components.layouts.dashboard', 
            [
                'menu' => [
                    [
                        'label' => 'Dashboard',
                        'route_name' => 'admin.dashboard',
                        'active_route' => 'admin.dashboard',
                        'icon' => 'dashboard'
                    ],
                    [
                        'label' => 'Restaurants',
                        'route_name' => '',
                        'active_route' => '',
                        'icon' => 'restaurant'
                    ],
                    [
                        'label' => 'Customers',
                        'route_name' => '',
                        'active_route' => '',
                        'icon' => 'customer'
                    ],
                    [
                        'label' => 'Reports',
                        'route_name' => '',
                        'active_route' => '',
                        'icon' => 'fluentui-data-bar-vertical-16'
                    ]
                ]
            ]);
    }
}
