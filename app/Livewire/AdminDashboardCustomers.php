<?php

namespace App\Livewire;

use App\Constants\AdminCustomerActionContants;
use App\Constants\DashboardConstants;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AdminDashboardCustomers extends Component
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

        $customers = User::where('role_id', 2)->whereRaw('LOWER(`name`) like ?', '%'.strtolower($this->search).'%');

        $customers = $customers->paginate(7);
        return view('livewire.admin-dashboard-customers', ['customers' => $customers, 'actions' => AdminCustomerActionContants::ADMIN_ACTIONS])
        ->layout('components.layouts.dashboard', DashboardConstants::ADMIN_DASHBOARD_MENU);
    }
}
