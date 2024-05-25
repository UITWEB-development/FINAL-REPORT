<?php

namespace App\Livewire;

use App\Models\User;
use App\Traits\Toast;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Validation\ValidationException;


#[Layout('components.layouts.user-auth')]
#[Title('Forgot Password')] 
class ForgotPassword extends Component
{
    use Toast;
        
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
                $this->toast([
                    'type' => 'danger',
                    'expand' => true,
                    'message' => $error,
                    'position' => 'top-right',
                ]);   
            }

            throw new ValidationException($validator);
        }

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
