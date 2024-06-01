<?php

namespace App\Livewire;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class ViewProduct extends ModalComponent
{
    public Product $product;
    public function render()
    {
        return view('livewire.view-product');
    }
}
