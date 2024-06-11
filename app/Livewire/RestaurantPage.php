<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class RestaurantPage extends Component
{
    public User $restaurant;

    public function mount($id) {
        $this->restaurant = User::findOrFail($id);
    }
    public function render()
    {
        Cart::instance($this->restaurant->id);
        return view('livewire.restaurant-page')
            ->layout('components.layouts.restaurant', ['restaurant' => $this->restaurant])  
            ->title($this->restaurant->restaurant_description->restaurant_name);
    }
}
