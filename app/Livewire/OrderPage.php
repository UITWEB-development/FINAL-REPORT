<?php

namespace App\Livewire;

use App\Constants\OrderMessageConstants;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderPage extends Component
{
    public User $restaurant;
    public Order $order;

    public function mount($id, $order_id) {
        $this->restaurant = User::findOrFail($id);
        $this->order = Order::findOrFail($order_id);
    }
    public function render()
    {
        Cart::instance($this->restaurant->id);
        $cart = Cart::content();

        return view('livewire.order-page', ['cart' => $cart, 'order_messages' => OrderMessageConstants::ORDER_STATUS_MESSAGE])
        ->layout('components.layouts.restaurant', ['restaurant' => $this->restaurant])
        ->title($this->restaurant->restaurant_description->restaurant_name.' - Order status');
        
    }
}
