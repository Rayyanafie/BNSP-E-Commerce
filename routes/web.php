<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmailController;

use Illuminate\Support\Facades\Auth;

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

// Public Routes
Route::resource('visitor', VisitorController::class);
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('users.login');

Route::get('/', [VisitorController::class, 'index'])->name('user.index');
// Protected Routes - Only for Authenticated Users
Route::middleware(['auth'])->group(function () {


    Route::resource('product', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('cart', CartController::class);


    // Route for adding a product to the cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'buy'])->name('cart.add');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Route for viewing orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/pdf', [OrderController::class, 'downloadPDF'])->name('orders.downloadReceipt');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth', 'admin');
    Route::get('/dashboard', [VisitorController::class, 'index'])->name('user.index')->middleware('auth', 'user');
    Route::get('/users/detail', [UserController::class, 'index'])->name('user.detail');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('email.send');

});

Auth::routes();