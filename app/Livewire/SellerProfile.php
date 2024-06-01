<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use App\Models\RestaurantDescription;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Seller Profile')]
class SellerProfile extends Component
{
    public function render()
    {
        $is_profile_exist = RestaurantDescription::where('user_id', auth()->user()->id)->exists();
        return view('livewire.seller-profile', ['is_profile_exist' => $is_profile_exist])
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
