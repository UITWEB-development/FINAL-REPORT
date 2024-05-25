<?php

use App\Livewire\AdminSignin;
use App\Livewire\ForgotPassword;
use App\Livewire\ResetPassword;
use App\Livewire\Signin;
use App\Livewire\Signup;
use App\Livewire\TestToast;
use App\Livewire\Toast;
use Illuminate\Support\Facades\Route;

use function App\Helpers\getUserTypes;

Route::middleware(['guest'])->group(function() {   
    $user_types = getUserTypes(); 

    if (in_array('admin', $user_types)) {
        Route::get('/admin/sign-in', AdminSignin::class)->name('admin.signin');
        array_splice($user_types, array_search('admin', $user_types), 1);
    } 

    if (count($user_types)) {
        Route::get('/{user_type}/sign-up', Signup::class)->whereIn('user_type', $user_types)->name('signup');
        Route::get('/{user_type}/sign-in', Signin::class)->whereIn('user_type', $user_types)->name('signin');
        Route::get('/forgot-password', ForgotPassword::class)->whereIn('user_type', $user_types)->name('password.email');
        Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');
    }
    
    
});

Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('test', Toast::class);



