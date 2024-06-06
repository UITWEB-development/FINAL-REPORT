<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;


class RestaurantGoogleMap extends ModalComponent
{

    public User $restaurant;

    public function render()
    {
        return view('livewire.restaurant-google-map');
    }
}
