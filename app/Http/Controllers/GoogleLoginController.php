<?php

namespace App\Http\Controllers;

use App\Constants\AuthStatusConstants;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Masmerise\Toaster\Toaster;


class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $role_id = session()->pull('role_id');
        $redirect_url = session()->pull('redirect_url');
        $user_type = session()->pull('user_type');


        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Throwable $th) {
        

            return redirect($redirect_url.'/sign-in')->error(AuthStatusConstants::AUTHENTICATION_ERROR);
        }
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
           if ($user->role_id !== $role_id) {
                session()->flash('danger', AuthStatusConstants::INVALID_CREDENTIALS);
                return Redirect::route('signin', ['user_type' => $user_type])->error(AuthStatusConstants::INVALID_CREDENTIALS);
           }
        } else {
            $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => \Hash::make(rand(100000,999999)), 'role_id' => $role_id]);
        }


        Auth::login($user);
        return Redirect::route('signin', ['user_type' => $user_type])->success(AuthStatusConstants::SIGN_IN_SUCCESS);
    }
}