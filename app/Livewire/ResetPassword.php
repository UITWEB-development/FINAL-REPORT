<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


#[Layout('components.layouts.user-auth')]
#[Title('Reset Password')] 
class ResetPassword extends Component
{

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

    #[Locked]
    public $token;

    public function mount($token) {
        $this->token = $token;
    }

    public function resetPassword() {
        $this->validate();

        
        $status = Password::reset($this->only(['email', 'password', 'password_confirmation', 'token']), function(User $user, string $password){
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();
            

            event(new PasswordReset($user));
        });

        if (Password::PASSWORD_RESET) {
            $user = User::where('email', $this->email)->first();
            session()->flash('status', __($status));
            return redirect()->route('signin', ['user_type' => $user->role->name]);
        } else {
            session()->flash('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
