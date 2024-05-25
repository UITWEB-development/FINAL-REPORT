<?php

namespace App\Livewire;

use App\Constants\AuthStatusConstants;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Models\User;
use App\Traits\Toast;
use App\Traits\UserTypeMount;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

#[Layout('components.layouts.user-auth')]
#[Title('Sign Up')] 
class Signup extends Component
{
    use UserTypeMount, Toast;

    #[Locked]
    public $role_id;

    #[Locked]
    public $user_type;

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public function signup() {
        /* $this->validate(); */

        $validator = Validator::make(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,

            ],
            [
                'name' => 'required|string|between:1,255',
                'email' => 'required|lowercase|email|max:255|unique:users',
                'password' => 'required|confirmed|string|min:8',
            ],
            [
                'required' => 'The :attribute field is required',
                'string' => 'The :attribute must be a string.',
                'min:8' => 'The :attribute must contain at least 8 characters'
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

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role_id,
        ]);
        

        
        $this->reset(['name', 'email', 'password', 'password_confirmation']);


        return redirect()->route('signin', ['user_type' => $this->user_type])->with('success', AuthStatusConstants::SIGN_UP_SUCCESS);
        
    }


    public function render()
    {

        return view('livewire.signup');
    }

}
