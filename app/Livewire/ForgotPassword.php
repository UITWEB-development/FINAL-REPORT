<?php

namespace App\Livewire;

use App\Trait\UserTypeMount;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;


#[Layout('components.layouts.user-auth')]
#[Title('Sign In')] 
class ForgotPassword extends Component
{
    public function render()
    {
        return view('livewire.forgot-password');
    }
}
