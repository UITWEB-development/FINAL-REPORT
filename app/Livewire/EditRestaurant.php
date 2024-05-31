<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class EditRestaurant extends ModalComponent
{
    public function render()
    {
        return view('livewire.edit-restaurant');
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
