<?php

namespace App\Livewire;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toaster;

class DeleteProduct extends ModalComponent
{
    public Product $product;

    public function delete()
    {
        $this->authorize('delete', $this->product);

        $this->product->delete();

        Toaster::success('Product deleted successfully!');

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
