<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Reactive;

class ProductCard extends Component
{
    #[Reactive] 
    public Product $product;


    public function render()
    {
        return view('livewire.product-card');
    }
}
