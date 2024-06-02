<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Constants\AuthStatusConstants;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;

#[Layout('components.layouts.user-auth')]
#[Title('Admin Sign In')] 
class AdminSignin extends Component
{

    #[Validate('required|string|lowercase|email|max:255')]
    public $email;

    #[Validate([
        'required',
        'string',
        'min:8',
    ], message:[
        'required' => 'The :attribute is required.',
        'string' => 'The :attribute must be a string.',
        'min:8' => 'The :attribute must contain at least 8 character',
    ])]
    public $password;

    public function signin() {
        $validator = Validator::make(
            [
                'email' => $this->email,
                'password' => $this->password,
            ],
            [
                'email' => 'required|lowercase|email|max:255',
                'password' => 'required|string|min:8',
            ],
            [
                'required' => 'The :attribute field is required',
                'string' => 'The :attribute must be a string.',
                'min:8' => 'The :attribute must contain at least 8 characters',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            foreach ($errors as $error) {
                Toaster::error($error);
            }

            throw new ValidationException($validator);
        }

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => 0,
        ];

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            return Redirect::route('admin.dashboard')->success(AuthStatusConstants::SIGN_IN_SUCCESS);
        }

        Toaster::success(AuthStatusConstants::INVALID_CREDENTIALS);
    }

    public function render()
    {
        return view('livewire.admin-signin');
    }
}
