<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin-login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('home');

    Route::get('/collection', function () {
        return view('collection');
    })->name('collection');

    Route::get('/products', function () {
        return view('products');
    })->name('products');

    Route::get('/arrival', function () {
        return view('arrival');
    })->name('arrival');

    Route::get('/bestseller', function () {
        return view('bestseller');
    })->name('bestseller');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');

    Route::get('/payment-options', function () {
        return view('payment-options');
    })->name('payment-options');

    Route::get('/customer-care', function () {
        return view('customer-care');
    })->name('customer-care');

    Route::get('/privacy-policies', function () {
        return view('privacy-policies');
    })->name('privacy-policies');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user-edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user-update');

    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

        Route::get('/admin/edit', function () {
            return view('admin.homeAdminEdit');
        })->name('admin.home');
    });
});


