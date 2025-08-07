<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleWare;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('index');
// })->name('index');

//Index
Route::get('/', [HomeController::class, 'index'])->name('index');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/login', 'login')->name('login');
});

Route::middleware('auth')->controller(AuthController::class)->group(function () {
    Route::get('/profile', 'showProfile')->name('show.profile');
});

//Cart
Route::middleware('auth')->controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/add', 'add')->name('cart.add');
    Route::patch('/cart/update/{cartItemId}', 'update')->name('cart.update');
    Route::delete('/cart/remove/{cartItemId}', 'remove')->name('cart.remove');
    Route::post('/cart/checkout', 'checkout')->name('cart.checkout');

    Route::post('/checkout', 'checkout')->name('cart.checkout');
    // Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});


//Admin
Route::middleware('auth')->group(function () {

    Route::middleware([AdminMiddleWare::class])->controller(AdminController::class)->group(function () {
        Route::get('/admin', 'showAdmin')->name('show.admin.panel');
    });
});
