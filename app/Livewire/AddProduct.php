<?php

namespace App\Livewire;


use LivewireUI\Modal\ModalComponent;

class AddProduct extends ModalComponent
{
    
    public function render()
    {
        return view('livewire.add-product');
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
