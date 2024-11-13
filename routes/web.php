<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('about-us', [HomeController::class, 'about'])->name('about');


Route::prefix('/')->middleware('auth')->group(function () {

    Route::get('reservation', [ReservationController::class, 'index'])->name('home.reservation');
    Route::post('reservation', [ReservationController::class, 'store'])->name('home.reservation.store')
        ->middleware('throttle:8,1')  // Apply throttle middleware to limit requests
        ->name('home.reservation.store');

    Route::resource('profile', ProfileController::class);
    Route::resource('pets', PetController::class);
});

Route::prefix('admin')->middleware(['auth', isAdmin::class])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard'); // name digunakan untuk pemanggilan di controller dan view
    Route::resource('dokter', DoctorController::class); // get, post, patch, put, delete
    Route::resource('reservasi', AdminReservationController::class);

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index'); // List users
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('admin.users.update');
});

Auth::routes();
