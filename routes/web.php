<?php

use App\Livewire\AdminDashboard;
use App\Livewire\SellerDashboard;
use App\Livewire\SellerDashboardOrders;
use App\Livewire\SellerDashboardProducts;
use App\Livewire\SellerProfile;
use App\Livewire\TestHome;
use App\Livewire\UserDashboard;
use Illuminate\Support\Facades\Route;



Route::get('/', TestHome::class)->name('home');


Route::get('/admin', AdminDashboard::class)->middleware('auth:admin,0')->name('admin.dashboard');
Route::get('/seller', SellerDashboard::class)->middleware('auth:seller,1')->name('seller.dashboard');
Route::get('/seller/products', SellerDashboardProducts::class)->middleware('auth:seller,1')->name('seller.products');
Route::get('/seller/profile', SellerProfile::class)->middleware('auth:seller,1')->name('seller.profile');
Route::get('/seller/orders', SellerDashboardOrders::class)->middleware('auth:seller,1')->name('seller.orders');
Route::get('/user', UserDashboard::class)->middleware('auth:user,2');


require __DIR__ . '/auth.php';