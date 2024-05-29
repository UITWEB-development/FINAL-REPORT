<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class SelectCategory extends Component
{

    public $selected_category = -1;

    public function update($category_id) {
        $this->selected_category = $category_id;
        $this->dispatch('category-updated', category_id: $category_id)->to(ProductList::class);
        $this->dispatch('product_updated')->to(ProductList::class);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.select-category', [
            'categories' => $categories,
        ]);
    }
}
