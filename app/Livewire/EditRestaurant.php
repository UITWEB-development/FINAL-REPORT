<?php

namespace App\Livewire;

use App\Traits\Toast;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class EditRestaurant extends ModalComponent
{
    use WithFileUploads, Toast;

    public $image;
    public $restaurant_name;
    public $phone_number;
    public $opentime;
    public $closetime;

    public $position = ['lat' => null, 'lng' => null];
    public $address;

    public $user_id;
    

    function edit() {
        dd($this->position);
    }

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
