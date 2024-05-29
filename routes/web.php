<?php

use App\Livewire\AdminDashboard;
use App\Livewire\SellerDashboard;
use App\Livewire\TestHome;
use App\Livewire\UserDashboard;
use Illuminate\Support\Facades\Route;



Route::get('/', TestHome::class)->name('home');


Route::get('/admin', AdminDashboard::class)->middleware('auth:admin,0')->name('admin.dashboard');
Route::get('/seller', SellerDashboard::class)->middleware('auth:seller,1')->name('seller.dashboard');
Route::get('/user', UserDashboard::class)->middleware('auth:user,2');


require __DIR__ . '/auth.php';