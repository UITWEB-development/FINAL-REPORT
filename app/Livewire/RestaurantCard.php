<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class RestaurantCard extends Component
{
    
    public User $restaurant;

    public function viewRestaurant() {
        return Redirect::route('restaurant.page', ['id' => $this->restaurant->id]);
    }

    public function render()
    {
        return view('livewire.restaurant-card');
    }
}
