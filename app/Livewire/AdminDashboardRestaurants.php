<?php

namespace App\Livewire;

use App\Constants\AdminRestaurantActionContants;
use App\Constants\DashboardConstants;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class AdminDashboardRestaurants extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public function update() {
        $this->resetPage();
        $this->dispatch('search_updated')->self();
    }

    public function show($id) {

    }

    public function delete($id){
        
    }

    #[On('search_updated')]
    public function render()
    {
        
        $this->search = strip_tags($this->search);
        
        $restaurants = User::whereHas('restaurant_description', function ($query) {
            $query->whereRaw('LOWER(`restaurant_name`) like ?', '%'.strtolower($this->search).'%');
        });

        $restaurants = $restaurants->paginate(7);
        
        return view('livewire.admin-dashboard-restaurants', ['restaurants' => $restaurants, 'actions' => AdminRestaurantActionContants::ADMIN_ACTIONS])
        ->layout('components.layouts.dashboard', DashboardConstants::ADMIN_DASHBOARD_MENU)
        ->title('Admin - Restaurants');
    }
}
