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
use Livewire\Attributes\Url;
use Masmerise\Toaster\Toaster;

#[Layout('components.layouts.user-auth')]
#[Title('Sign In')] 
class Signin extends Component
{
    use UserTypeMount;

    #[Url]
    public $redirect_url = '';

    #[Locked]
    public $role_id;
    
    #[Locked]
    public $user_type;

    public $email;

    public $password;

    public $remember_me = false;

    public function render()
    {
        return view('livewire.signin');
    }

    public function signin() {

        $validator = Validator::make(
            [
                'email' => $this->email,
                'password' => $this->password,
                'remember_me' => $this->remember_me,
            ],
            [
                'email' => 'required|lowercase|email|max:255',
                'password' => 'required|string|min:8',
                'remember_me' => 'boolean',
            ],
            [
                'required' => 'The :attribute field is required',
                'string' => 'The :attribute must be a string.',
                'min:8' => 'The :attribute must contain at least 8 characters',
                'boolean' => 'The :attribute must be a boolean.'
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
            'role_id' => $this->role_id,
        ];

        if (auth()->attempt($credentials, $this->remember_me)) {
            session()->regenerate();
            if ($this->redirect_url != '') {
                return redirect($this->redirect_url)->success(AuthStatusConstants::SIGN_IN_SUCCESS);
            } else {
                return Redirect::route($this->user_type.'.dashboard')->success(AuthStatusConstants::SIGN_IN_SUCCESS);
            }
        }

        Toaster::error(AuthStatusConstants::INVALID_CREDENTIALS);
    }

    public function forgotPassword() {
        session()->put('sign_in_url', "/$this->user_type/sign-in");
        return redirect()->route('password.email');
    }

    public function googleSigin() {
        session([
            'redirect_url' => '/'.$this->user_type,
            'role_id'      => $this->role_id,
            'user_type'    => $this->user_type,
        ]);
        $this->redirectRoute('google.redirect');
    }

}
