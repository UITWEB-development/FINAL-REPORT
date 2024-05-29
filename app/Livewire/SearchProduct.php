<?php

namespace App\Livewire;

use Livewire\Component;

class SearchProduct extends Component
{
    public $search = '';

    public function update() {
        $this->dispatch('search-updated', search: $this->search)->to(ProductList::class);
        $this->dispatch('product_updated')->to(ProductList::class);
    }


    public function render()
    {
        return view('livewire.search-product');
    }
}
