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


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/restaurants', AdminDashboardRestaurants::class)->name('admin.restaurants');
    Route::get('/admin/customers', AdminDashboardCustomers::class)->name('admin.customers');
    Route::get('/admin/reports', AdminDashboardReports::class)->name('admin.reports');
});

Route::middleware('auth:seller')->group(function() {
    Route::get('/seller', SellerDashboard::class)->name('seller.dashboard');
    Route::get('/seller/products', SellerDashboardProducts::class)->name('seller.products');
    Route::get('/seller/profile', SellerProfile::class)->name('seller.profile');Route::get('/seller/orders', SellerDashboardOrders::class)->name('seller.orders');
});

Route::get('/', RestaurantList::class)->name('home');
Route::get('/restaurant/{id}', RestaurantPage::class)->name('restaurant.page');

Route::get('/user', UserDashboard::class)->middleware('auth:user')->name('user.dashboard');
Route::get('/about-us', AboutUs::class)->name('about-us');
Route::get('/contact', Contact::class)->name('contact');
Route::post('/contact', [Contact::class, 'sendEmail']);


require __DIR__ . '/auth.php';