<?php

namespace App\Http\Controllers;

use App\Constants\AuthStatusConstants;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

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
            session()->flash('danger', AuthStatusConstants::AUTHENTICATION_ERROR);
            return redirect($redirect_url.'/sign-in');
        }
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
           if ($user->role_id !== $role_id) {
                session()->flash('danger', AuthStatusConstants::INVALID_CREDENTIALS);
                return redirect()->route('signin', ['user_type' => $user_type]);
           }
        } else {
            $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => \Hash::make(rand(100000,999999)), 'role_id' => $role_id]);
        }


        Auth::login($user);

        session()->flash('success', AuthStatusConstants::SIGN_IN_SUCCESS);
        return redirect($redirect_url);
    }
}