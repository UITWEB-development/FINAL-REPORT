<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On;

#[Title('Home')]
class RestaurantList extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public function update() {
        $this->resetPage();
        $this->dispatch('restaurant_list_update')->self();
    }

    #[On('restaurant_list_update')]
    public function render()
    {
        
        $this->search = strip_tags($this->search);

        $restaurants = User::whereHas('restaurant_description', function ($query) {
            $query->whereRaw('LOWER(`restaurant_name`) like ?', '%'.strtolower($this->search).'%');
        });


        $restaurants = $restaurants->paginate(6);

        return view('livewire.restaurant-list', ['restaurants' => $restaurants]);
    }
}
