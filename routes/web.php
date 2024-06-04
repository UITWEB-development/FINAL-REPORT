<?php

use App\Livewire\AboutUs;
use App\Livewire\AdminDashboard;
use App\Livewire\AlpineGoogleMap;
use App\Livewire\Contact;
use App\Livewire\DistrictShow;
use App\Livewire\ProvinceShow;
use App\Livewire\SellerDashboard;
use App\Livewire\SellerDashboardOrders;
use App\Livewire\SellerDashboardProducts;
use App\Livewire\SellerProfile;
use App\Livewire\TestHome;
use App\Livewire\TimePicker;
use App\Livewire\UserDashboard;
use App\Livewire\WardShow;
use App\Models\Province;
use Illuminate\Support\Facades\Route;



Route::get('/', TestHome::class)->name('home');


Route::get('/admin', AdminDashboard::class)->middleware('auth:admin,0')->name('admin.dashboard');
Route::get('/seller', SellerDashboard::class)->middleware('auth:seller,1')->name('seller.dashboard');
Route::get('/seller/products', SellerDashboardProducts::class)->middleware('auth:seller,1')->name('seller.products');
Route::get('/seller/profile', SellerProfile::class)->middleware('auth:seller,1')->name('seller.profile');
Route::get('/seller/orders', SellerDashboardOrders::class)->middleware('auth:seller,1')->name('seller.orders');
Route::get('/user', UserDashboard::class)->middleware('auth:user,2')->name('user.dashboard');


Route::get('/about-us', AboutUs::class)->name('about-us');
Route::get('/contact', Contact::class)->name('contact');


Route::get('/provinces', ProvinceShow::class);
Route::get('/districts', DistrictShow::class);
Route::get('/wards', WardShow::class);

Route::get('/map', AlpineGoogleMap::class);

require __DIR__ . '/auth.php';