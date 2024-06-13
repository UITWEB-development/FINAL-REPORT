<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class RestaurantSelectCategory extends Component
{
    public $selected_category = -1;

    public function update($category_id) {
        $this->selected_category = $category_id;
        $this->dispatch('restaurant-category-updated', category_id: $category_id)->to(RestaurantProductList::class);
        $this->dispatch('restaurant-updated')->to(RestaurantProductList::class);
    }
    public function render()
    {
        
        $categories = Category::all();
        return view('livewire.restaurant-select-category', [
            'categories' => $categories,
        ]);
    }
}
