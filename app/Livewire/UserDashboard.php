<?php

namespace App\Livewire;

use App\Constants\AuthStatusConstants;
use App\Traits\UserTypeMount;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;


#[Layout('components.layouts.user-dashboard')]
#[Title('User Profile')] 
class UserDashboard extends Component
{
    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
