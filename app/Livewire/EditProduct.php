<?php

namespace App\Livewire;


use LivewireUI\Modal\ModalComponent;

class EditProduct extends ModalComponent
{
    public function render()
    {
        return view('livewire.edit-product');
    }
}
