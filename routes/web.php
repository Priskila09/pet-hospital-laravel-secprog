<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('about-us', [HomeController::class, 'about'])->name('about');
Route::get('shop', [ShopController::class, 'index'])->name('home.shop');


Route::prefix('/')->middleware('auth')->group(function () {

    Route::get('shop/{id}', [ShopController::class, 'detail'])->name('home.shop.detail');

    Route::get('keranjang', [OrderController::class, 'cart'])->name('home.cart');

    Route::get('keranjang/konfirmasi', [OrderController::class, 'confirm'])->name('home.cart.confirm');
    Route::post('keranjang/konfirmasi', [OrderController::class, 'confirmStore'])->name('home.cart.confirm.store');

    Route::get('order-history', [OrderController::class, 'history'])->name('home.order.history');

    Route::get('reservation', [ReservationController::class, 'index'])->name('home.reservation');
    Route::post('reservation', [ReservationController::class, 'store'])->name('home.reservation.store');

    Route::resource('profile', ProfileController::class);
    Route::resource('pets', PetController::class);
});

Route::prefix('admin')->middleware(['auth', isAdmin::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard'); // name digunakan untuk pemanggilan di controller dan view
    Route::resource('dokter', DoctorController::class); // get, post, patch, put, delete
    Route::resource('produk', ProductController::class);
    Route::resource('reservasi', AdminReservationController::class);
    Route::resource('orders', AdminOrderController::class);


    Route::delete('delete-image-product/{id}', [ProductController::class, 'destroy_image'])->name('delete-image-product');
});

Auth::routes();
