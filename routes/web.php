<?php

use App\Livewire\AdminDashboard;
use App\Livewire\SellerDashboard;
use App\Livewire\UserDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', AdminDashboard::class)->middleware('auth:admin,0');
Route::get('/seller', SellerDashboard::class)->middleware('auth:seller,1');
Route::get('/user', UserDashboard::class)->middleware('auth:user,2');

require __DIR__ . '/auth.php';