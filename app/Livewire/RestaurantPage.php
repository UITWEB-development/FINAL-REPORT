<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RestaurantPage extends Component
{
    public User $restaurant;

    public function mount($id) {
        $this->restaurant = User::find($id);
    }
    public function render()
    {
        return view('livewire.restaurant-page')
            ->layout('components.layouts.restaurant');
    }
}
