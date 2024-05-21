<?php

namespace App\Livewire;


use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Models\User;
use App\Traits\UserTypeMount;

#[Layout('components.layouts.user-auth')]
#[Title('Sign Up')] 
class Signup extends Component
{
    use UserTypeMount;

    #[Locked]
    #[Validate('required|integer|between:1,2')]
    public $role_id;

    #[Locked]
    public $user_type;

    #[Validate('required|string|between:1,255')]
    public $name;

    #[Validate('required|string|lowercase|email|max:255')]
    public $email;

    #[Validate([
        'required',
        'string',
        'confirmed',
        'min:8',
    ], message:[
        'required' => 'The :attribute is required.',
        'string' => 'The :attribute must be a string.',
        'confirmed' => 'The password confirmation does not match',
        'min:8' => 'The :attribute must contain at least 8 character',
    ])]
    public $password;

    public $password_confirmation;

    public function signup() {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role_id,
        ]);

        $this->reset();
    }


    public function render()
    {
        return view('livewire.signup');
    }
}
