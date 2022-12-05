<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Controllers\IndexController::class)->name('tickets.index');
Route::get('/contacts', \App\Http\Controllers\ContactController::class)->name('tickets.contacts');
Route::get('/about', \App\Http\Controllers\AboutController::class)->name('tickets.about');
Route::get('/logout', \App\Http\Controllers\LogoutController::class)->name('tickets.logout');


Route::middleware('lkandcart')->group(function(){
    Route::prefix('cart')->group(function(){
        Route::get('/', \App\Http\Controllers\LkAndCart\CartController::class)->name('tickets.cart');
        Route::post('/', \App\Http\Controllers\LkAndCart\CartMakeOrderController::class)->name('tickets.cart.create');
        Route::get('/clear', \App\Http\Controllers\LkAndCart\CartClearController::class)->name('tickets.cart.clear');

    });
    Route::prefix('lk')->group(function(){
        Route::get('/', \App\Http\Controllers\LkAndCart\LKController::class)->name('tickets.lk');
        Route::post('/', \App\Http\Controllers\LkAndCart\LKCreditController::class)->name('tickets.lk.change');
        Route::get('/pass', \App\Http\Controllers\LkAndCart\PasswordController::class)->name('tickets.lk.pass');
        Route::post('/pass', \App\Http\Controllers\LkAndCart\PasswordChangeController::class)->name('tickets.lk.passChange');
    });
});

Route::middleware('admin')->group(function(){
    Route::prefix('admin')->group(function() {
        Route::prefix('ticket')->group(function(){
            Route::get('/', \App\Http\Controllers\Admin\IndexController::class)->name('tickets.admin');
            Route::get('/create', \App\Http\Controllers\Admin\CreateController::class)->name('tickets.admin.create');
            Route::post('/create', \App\Http\Controllers\Admin\StoreController::class)->name('tickets.admin.store');
        });
        Route::get('/user', \App\Http\Controllers\Admin\UserController::class)->name('tickets.admin.user');
    });
});

Route::prefix('reserve')->group(function(){
    Route::get('/', \App\Http\Controllers\Reserve\ReserveController::class)->name('tickets.reserve');
    Route::middleware('transactional')->group(function(){
        Route::get('/add/{id}', \App\Http\Controllers\Reserve\AddTicketController::class)->name('tickets.reserve.add');
        Route::get('/remove/{id}', \App\Http\Controllers\Reserve\RemoveTicketController::class)->name('tickets.reserve.remove');
    });
});

Auth::routes([
    'confirm' => false,
    'reset' => false,
    'verify' => false,
]);
