<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;


#[Layout('components.layouts.user-auth')]
#[Title('Forgot Password')] 
class ForgotPassword extends Component
{

        
    public $email;

    public function send() {

        $validator = Validator::make(
            [
                'email' => $this->email
            ],
            [
                'email' => 'required|lowercase|email|max:255',
            ],
            [
                'required' => 'The :attribute field is required',
                'max:255' => 'The :attribute must contain at most 255 characters',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            foreach ($errors as $error) {
                Toaster::error($error);
            }

            throw new ValidationException($validator);
        }

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            Toaster::success(__($status));
        } else {
            Toaster::error(__($status));
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
