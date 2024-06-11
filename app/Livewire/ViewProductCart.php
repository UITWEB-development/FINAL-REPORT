<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

use App\Models\Product;

class ViewProductCart extends ModalComponent
{
    public Product $product;
    public int $quantity = 1;


    public function addToCart() {
        Cart::setGlobalTax(0);
        Cart::instance($this->product->user_id)
            ->add(
                $this->product->id, 
                $this->product->name, 
                $this->quantity,
                $this->product->price, 
            )->associate(Product::class);
        
        
        $this->closeModalWithEvents([
                CartNav::class => 'cart-updated'
        ]);

        Toaster::success('Product added successfully!');
    }


    public function render()
    {
        return view('livewire.view-product-cart');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public static function closeModalOnClickAway(): bool
    {
        return true;
    }



    
}
