<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\On;

class RestaurantCartPage extends Component
{

    public User $restaurant;

    public function mount($id) {
        $this->restaurant = User::find($id);
    }

    public function getCheckoutPage() {
        if (!auth()->user()) {
            return redirect('/user/sign-in?redirect_url=/restaurant/'.$this->restaurant->id.'/checkout');
        }

        return Redirect::route('restaurant.checkout', ['id' => $this->restaurant->id]);
    }

    #[On('cart_row_updated')]
    public function render()
    {
        Cart::instance($this->restaurant->id);
        $cart = Cart::content();
        
        
        return view('livewire.restaurant-cart-page', ['cart' => $cart])
        ->layout('components.layouts.restaurant', ['restaurant' => $this->restaurant])
        ->title($this->restaurant->restaurant_description->restaurant_name.' - Cart');
    }
}
