<?php

namespace App\Livewire;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class DeleteProduct extends ModalComponent
{
    public Product $product;

    public function delete() {
        $this->authorize('delete', Product::class);

        $product->delete();

        $this->toast([
            'type' => 'success',
            'position' => 'top-right',
            'expand' => false,
            'message' => 'Product created successfully!'
        ]);


        $this->closeModalWithEvents([
            ProductList::class => 'product_updated'
        ]);
    }
    public function render()
    {
        return view('livewire.delete-product');
    }
}
