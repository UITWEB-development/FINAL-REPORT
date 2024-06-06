<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class RestaurantProductCard extends Component
{

    public Product $product;
    public function render()
    {
        return view('livewire.restaurant-product-card');
    }
}
