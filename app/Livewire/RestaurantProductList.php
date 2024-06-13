<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class RestaurantProductList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $category_id = -1;
    public $search = '';

    #[On('restaurant-search-updated')]
    public function update_search($search) {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('restaurant-category-updated')]
    public function update_category($category_id) {
        $this->category_id = $category_id;
        $this->resetPage();
    }

    public User $restaurant;

    #[On('restaurant-updated')]
    public function render()
    {

        $products = $this->restaurant->products();

        if ($this->search !== '') {
            $products = $products->whereRaw('LOWER(`name`) like ?', '%'.strtolower($this->search).'%');      
        }

        if ($this->category_id !== -1) {
            $products = $products->where('category_id', $this->category_id);
        }

        $products = $products->paginate(6);

        return view('livewire.restaurant-product-list', ['products' => $products]);
    }
}
