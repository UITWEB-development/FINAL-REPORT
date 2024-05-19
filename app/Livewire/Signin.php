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
class Signin extends Component
{
    use UserTypeMount;

    #[Locked]
    #[Validate('required|integer|between:1,2')]
    public $role_id;
    
    #[Locked]
    public $user_type;

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

    #[Validate('boolean')]
    public $remember_me = false;

    public function render()
    {
        return view('livewire.signin');
    }

    public function signin() {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role_id,
        ];

        if (auth()->attempt($credentials, $this->remember_me)) {
            session()->regenerate();

            session()->flash('message', 'You have successfully signed in!');
            return $this->redirectIntended('/'.$this->user_type);
        }

        session()->flash('error', 'Invalid credentials!');
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
