<?php

use App\Livewire\AboutUs;
use App\Livewire\AdminDashboard;
use App\Livewire\AdminDashboardRestaurants;
use App\Livewire\AdminDashboardCustomers;
use App\Livewire\AdminDashboardReports;
use App\Livewire\Contact;
use App\Livewire\RestaurantList;
use App\Livewire\RestaurantPage;
use App\Livewire\SellerDashboard;
use App\Livewire\SellerDashboardOrders;
use App\Livewire\SellerDashboardProducts;
use App\Livewire\SellerProfile;
use App\Livewire\UserDashboard;
use Illuminate\Support\Facades\Route;



Route::get('/', RestaurantList::class)->name('home');
Route::get('/restaurant/{id}', RestaurantPage::class)->name('restaurant.page');


Route::get('/admin', AdminDashboard::class)->middleware('auth:admin,0')->name('admin.dashboard');
Route::get('/admin/restaurants', AdminDashboardRestaurants::class)->middleware('auth:admin,0')->name('admin.restaurants');
Route::get('/admin/customers', AdminDashboardCustomers::class)->middleware('auth:admin,0')->name('admin.customers');
Route::get('/admin/reports', AdminDashboardReports::class)->middleware('auth:admin,0')->name('admin.reports');
Route::get('/seller', SellerDashboard::class)->middleware('auth:seller,1')->name('seller.dashboard');
Route::get('/seller/products', SellerDashboardProducts::class)->middleware('auth:seller,1')->name('seller.products');
Route::get('/seller/profile', SellerProfile::class)->middleware('auth:seller,1')->name('seller.profile');
Route::get('/seller/orders', SellerDashboardOrders::class)->middleware('auth:seller,1')->name('seller.orders');
Route::get('/user', UserDashboard::class)->middleware('auth:user,2')->name('user.dashboard');


Route::get('/about-us', AboutUs::class)->name('about-us');
Route::get('/contact', Contact::class)->name('contact');
Route::post('/contact', [Contact::class, 'sendEmail']);


require __DIR__ . '/auth.php';