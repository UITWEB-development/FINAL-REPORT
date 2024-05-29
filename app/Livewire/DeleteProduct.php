<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class DeleteProduct extends ModalComponent
{
    public function render()
    {
        return view('livewire.delete-product');
    }
}
