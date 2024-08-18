<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::post('/', [AuthController::class, 'login'])->name('auth.login');

Route::middleware("auth")->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get("/guest", [GuestController::class, "index"])->name("guest.index");
    Route::post("/guest", [GuestController::class, "store"])->name("guest.store");
    Route::put("/guest/{id}", [GuestController::class, "update"])->name("guest.update");
    Route::delete("/guest/{id}", [GuestController::class, "destroy"])->name("guest.destroy");

    Route::get("/product", [ProductController::class, "index"])->name("product.index");
    Route::post("/product", [ProductController::class, "store"])->name("product.store");
    Route::put("/product/{id}", [ProductController::class, "update"])->name("product.update");
    Route::delete("/product/{id}", [ProductController::class, "destroy"])->name("product.destroy");

    Route::get("/order", [OrderController::class, "index"])->name("order.index");
    Route::post("/order", [OrderController::class, "store"])->name("order.store");
    Route::put("/order/{id}", [OrderController::class, "update"])->name("order.update");
    Route::put("/order/approve/{id}", [OrderController::class, "approve"])->name("order.approve");
    Route::put("/order/reject/{id}", [OrderController::class, "reject"])->name("order.reject");
    Route::delete("/order/{id}", [OrderController::class, "destroy"])->name("order.destroy");

    Route::get("/customer", [CustomerController::class, "index"])->name("customer.index");
    Route::get("/customer/{id}", [CustomerController::class, "show"])->name("customer.show");
});