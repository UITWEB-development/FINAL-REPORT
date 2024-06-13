<?php

namespace App\Livewire;

use Livewire\Component;

class RestaurantSearchProduct extends Component
{
    public $search = '';

    public function update() {
        $search = strip_tags($this->search);
        $this->dispatch('restaurant-search-updated', search: $search)->to(RestaurantProductList::class);
        $this->dispatch('restaurant-updated')->to(RestaurantProductList::class);
    }

    public function render()
    {
        return view('livewire.restaurant-search-product');
    }
}
