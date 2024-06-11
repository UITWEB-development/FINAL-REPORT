<?php

namespace App\Livewire;


use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\Locked;
use Livewire\Component;


class ProductCardCart extends Component
{
    #[Locked]
    public $row_id;

    #[Locked]
    public $instance_id;

    public $qty;

    public function mount(){
        $this->qty = Cart::get($this->row_id)->qty;
    }

    public function updateRow(){
        Cart::instance($this->instance_id);
        Cart::update($this->row_id, $this->qty);
        $this->dispatchUpdate();
    }

    public function removeRow(){
        Cart::instance($this->instance_id);
        Cart::remove($this->row_id);
        $this->dispatchUpdate();
    }

    public function dispatchUpdate() {
        $this->dispatch('cart_row_updated')->to(RestaurantCartPage::class);
        $this->dispatch('cart-updated')->to(CartNav::class);
        
    }

    
    public function render()
    {
        Cart::instance($this->instance_id);
        try {
            $row = Cart::get($this->row_id);
        } catch (\Throwable $th) {
            $row = null;
        }
        return view('livewire.product-card-cart', ['row' => $row]);
    }
}
