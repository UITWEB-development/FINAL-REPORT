<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Layout('components.layouts.user-auth')]
#[Title('Admin sign in')] 
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
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => 0,
        ];

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            session()->flash('message', 'You have successfully signed in!');
            return $this->redirectIntended('/admin');
        }

        session()->flash('error', 'Invalid credentials!');
    }

    public function render()
    {
        return view('livewire.admin-signin');
    }
}
