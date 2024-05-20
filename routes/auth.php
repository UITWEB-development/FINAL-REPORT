<?php

use App\Http\Controllers\AuthController;
use App\Livewire\AdminSignin;
use App\Livewire\ForgotPassword;
use App\Livewire\Signin;
use App\Livewire\Signup;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function() {
    Route::get('/{user_type}/sign-up', Signup::class)->whereIn('user_type', ['user', 'seller'])->name('signup');
    Route::get('/{user_type}/sign-in', Signin::class)->whereIn('user_type', ['user', 'seller'])->name('signin');
    Route::get('/admin/sign-in', AdminSignin::class)->name('admin.signin');
    Route::get('/forgot-password', ForgotPassword::class)->name('password.forgot');
});


/* Route::get('/{user_type}/sign-up', Signup::class)->whereIn('user_type', ['user', 'seller'])->name('signup');
Route::get('/{user_type}/sign-in', Signin::class)->whereIn('user_type', ['user', 'seller'])->name('signin'); */


Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

/* 
Route::get('/user/sign-up', [AuthController::class, 'signup'])->name('user.signup');
Route::get('/seller/sign-up', [AuthController::class, 'signup'])->name('seller.signup');

Route::get('/user/sign-in', [AuthController::class, 'signin'])->name('user.signin');
Route::get('/seller/sign-in', [AuthController::class, 'signin'])->name('seller.signin'); 
*/





