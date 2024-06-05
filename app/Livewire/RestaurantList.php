<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RestaurantList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    #[On('search-updated')]
    public function update_search($search) {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('restaurant_updated')]
    public function render()
    {
        $restaurants = User::has('restaurant_description')->get();
        return view('livewire.restaurant-list', ['restaurants' => $restaurants]);
    }
}
