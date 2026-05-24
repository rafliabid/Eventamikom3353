<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Halaman depan untuk pengunjung
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Admin
Route::prefix('admin')->name('admin.')->group(function () {

    // URL: /admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // URL: /admin/events
    Route::resource('events', EventAdminController::class);

    // URL: /admin/categories
    Route::resource('categories', CategoryController::class);

    // URL: /admin/partners
    Route::resource('partners', PartnerController::class);
});

Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');
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
