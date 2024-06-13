<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ProductList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $category_id = -1;
    public $search = '';

    #[On('search-updated')]
    public function update_search($search) {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('category-updated')]
    public function update_category($category_id) {
        $this->category_id = $category_id;
        $this->resetPage();
    }

    #[On('product_updated')]
    public function render()
    {
        $products = auth()->user()->products();

        if ($this->search !== '') {
            $products = $products->whereRaw('LOWER(`name`) like ?', '%'.strtolower($this->search).'%');      
        }

        if ($this->category_id !== -1) {
            $products = $products->where('category_id', $this->category_id);
        }

        $products = $products->paginate(6);
        
        
        return view('livewire.product-list', [
            'products' => $products,
        ]);
    }
}
