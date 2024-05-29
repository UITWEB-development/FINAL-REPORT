<?php

namespace App\Livewire;

use App\Models\Product;
use App\Traits\Toast;
use LivewireUI\Modal\ModalComponent;

class DeleteProduct extends ModalComponent
{
    use Toast;
    public Product $product;

    public function delete()
    {
        $this->authorize('delete', $this->product);

        $this->product->delete();

        $this->toast([
            'type' => 'success',
            'position' => 'top-right',
            'expand' => false,
            'message' => 'Product deleted successfully!',
        ]);

        $this->closeModalWithEvents([
            ProductList::class => 'product_updated',
        ]);
    }
    public function render()
    {
        return view('livewire.delete-product');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
