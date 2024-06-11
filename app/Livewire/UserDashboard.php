<?php

namespace App\Livewire;

use App\Constants\AuthStatusConstants;
use App\Constants\OrderStateConstants;
use App\Traits\UserTypeMount;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\On;


#[Layout('components.layouts.user-dashboard')]
#[Title('User Profile')] 
class UserDashboard extends Component
{

    #[On('user_updated')]
    public function render()
    {
        $user = auth()->user();
        $orders = $user->orders;
        return view('livewire.user-dashboard', ['user' => $user, 'orders'=> $orders, 'styles' => OrderStateConstants::STYLES]);
    }
}
