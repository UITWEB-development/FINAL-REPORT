<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use App\Models\RestaurantDescription;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Title('Seller Dashboard - Profile')]
class SellerProfile extends Component
{
    #[On('profile_updated')]
    public function render()
    {
        $is_profile_exist = RestaurantDescription::where('user_id', auth()->user()->id)->exists();

        $data = [
            'is_profile_exist' => $is_profile_exist,
        ];

        if ($is_profile_exist) {
            $data['restaurant_description'] = auth()->user()->restaurant_description;
        }

        return view('livewire.seller-profile', $data)
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
