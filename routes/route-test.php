<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/login-header-test', function(){
    return view('login-header-test');
});


Route::get('/admin/login', [AdminController::class, 'login']);