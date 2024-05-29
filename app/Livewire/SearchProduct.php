<?php

namespace App\Livewire;

use Livewire\Component;

class SearchProduct extends Component
{
    public $search = '';

    public function update() {
        $search = strip_tags($this->search);
        $this->dispatch('search-updated', search: $search)->to(ProductList::class);
        $this->dispatch('product_updated')->to(ProductList::class);
    }


    public function render()
    {
        return view('livewire.search-product');
    }
}
