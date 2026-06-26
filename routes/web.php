<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TransactionController;

// Halaman depan
Route::get('/', [HomeController::class, 'index'])->name('home');

// Redirect /login -> /admin/login
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Admin
Route::prefix('admin')->name('admin.')->group(function () {

    // Login
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Route
    Route::middleware(['auth', 'admin'])->group(function () {

       Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('events', EventAdminController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('partners', PartnerController::class);

         Route::get(
        'transactions',
        [TransactionController::class, 'index']
    )->name('transactions.index');


    });





});



// Public
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// checkout
Route::get(
    '/checkout/{event}',
    [CheckoutController::class, 'create']
)->name('checkout.create');

Route::post(
    '/checkout/{event}',
    [CheckoutController::class, 'store']
)->name('checkout.store');

Route::get('/payment/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'payment'])->name('checkout.payment');

Route::get('/success/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');


// Route::get('/events', [EventController::class, 'show']);
// dan seterusnya...
// });
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/tentang', function() {
//     return '<h1>Ini adalah halaman tentang aplikasi Event Hub</h1>';
// });

// Route::get('/kontak', function() {
//     return view('contact');
// });

// Route::get('/profile', function(){
//     return view('profile');
// });

// Route::get('/katalog', function(){
//     return view('katalog');
// });

// Route::get('/bantuan', function(){
//     return view('bantuan');
// });

// Route::get('/',)
