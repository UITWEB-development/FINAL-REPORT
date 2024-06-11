<?php

use App\Http\Controllers\PaymentController;
use App\Livewire\AboutUs;
use App\Livewire\AdminDashboard;
use App\Livewire\AdminDashboardRestaurants;
use App\Livewire\AdminDashboardCustomers;
use App\Livewire\AdminDashboardReports;
use App\Livewire\Contact;
use App\Livewire\OrderPage;
use App\Livewire\RestaurantCartPage;
use App\Livewire\RestaurantCheckoutPage;
use App\Livewire\RestaurantList;
use App\Livewire\RestaurantPage;
use App\Livewire\SellerDashboard;
use App\Livewire\SellerDashboardOrders;
use App\Livewire\SellerDashboardProducts;
use App\Livewire\SellerProfile;
use App\Livewire\UserDashboard;
use App\Models\Order;
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
Route::get('/restaurant/{id}/cart', RestaurantCartPage::class)->name('restaurant.cart');
Route::get('/restaurant/{id}/checkout', RestaurantCheckoutPage::class)->middleware(['auth:user', 'cart_not_empty'])->name('restaurant.checkout');

Route::get('/restaurant/{id}/order/{order_id}', OrderPage::class)->name('restaurant.order');

Route::get('/user', UserDashboard::class)->middleware('auth:user')->name('user.dashboard');
Route::get('/about-us', AboutUs::class)->name('about-us');
Route::get('/contact', Contact::class)->name('contact');
Route::post('/contact', [Contact::class, 'sendEmail']);

Route::post('/payment/payos', [PaymentController::class, 'handlePayOSWebhook']);
Route::get('/payment/handling', [PaymentController::class, 'handlePaymentRedirect']);


require __DIR__ . '/auth.php';