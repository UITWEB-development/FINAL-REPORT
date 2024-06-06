<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class RestaurantProductList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public User $restaurant;

    public function render()
    {

        $products = $this->restaurant->products();

        $products = $products->paginate(6);

        return view('livewire.restaurant-product-list', ['products' => $products]);
    }
}
