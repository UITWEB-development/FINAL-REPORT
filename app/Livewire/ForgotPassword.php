<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\Toast;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;


#[Layout('components.layouts.user-auth')]
#[Title('Forgot Password')] 
class ForgotPassword extends Component
{
    use Toast;
        
    #[Validate('required|string|lowercase|email|max:255')]
    public $email;

    public function send() {
        $this->validate();

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            $this->toast([
                'position' => 'top-right',
                'expand' => true,
                'type' => 'success',
                'message' => __($status),
            ]);
        } else {
            $this->toast([
                'position' => 'top-right',
                'expand' => true,
                'type' => 'danger',
                'message' => __($status),
            ]);
        }
    }
    
    public function returnSignin() {
        $url = session()->pull('sign_in_url', '/user/sign-in');
        return redirect($url);
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
