<?php

namespace App\Livewire;

use App\Constants\AuthStatusConstants;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;

#[Layout('components.layouts.user-auth')]
#[Title('Reset Password')] 
class ResetPassword extends Component
{
    
    public $email;

    public $password;

    public $password_confirmation;

    #[Locked]
    public $token;

    public function mount($token) {
        $this->token = $token;
    }

    public function resetPassword() {
        $validator = Validator::make(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation
            ],
            [
                'email' => 'required|lowercase|email|max:255',
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
                Toaster::error($error);
            }

            throw new ValidationException($validator);
        }
        
        $reset = DB::table('password_reset_tokens')->where(['email' => $this->email])->first();

        if (!$reset || !Hash::check($this->token, $reset->token)) {
            Toaster::error(AuthStatusConstants::INVALID_RESET_TOKEN);
            return;
        }

        $status = Password::reset($this->only(['email', 'password', 'password_confirmation', 'token']), function(User $user, string $password){
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();
        
            event(new PasswordReset($user));
        });

        if (Password::PASSWORD_RESET) {
            $user = User::where('email', $this->email)->first();
            return Redirect::route('signin', ['user_type' => $user->role->name])->success(__($status));
        } else {
            Toaster::error(__($status));
        }
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
