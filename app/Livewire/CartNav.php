<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;

class CartNav extends Component
{
    public User $restaurant;

    public function navigate() {
        return Redirect::route('restaurant.cart', ['id' => $this->restaurant->id]);
    }

    #[On('cart-updated')]
    public function render()
    {
        return view('livewire.cart-nav');
    }
}
