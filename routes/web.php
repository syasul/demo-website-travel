<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminController;

// Visitor Routes
Route::get('/', [VisitorController::class, 'index'])->name('home');
Route::get('/destinations', [VisitorController::class, 'explore'])->name('explore');
Route::get('/packages/{slug}', [VisitorController::class, 'show'])->name('packages.show');
Route::get('/checkout/{slug}', [VisitorController::class, 'checkout'])->name('checkout.show');
Route::post('/checkout/{slug}', [VisitorController::class, 'storeBooking'])->name('checkout.store');
Route::get('/confirmation/{id}', [VisitorController::class, 'confirmation'])->name('checkout.confirmation');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/packages', [AdminController::class, 'packages'])->name('packages');
    Route::post('/packages/{id}/inventory', [AdminController::class, 'updateInventory'])->name('packages.inventory');
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::post('/bookings/{id}/status', [AdminController::class, 'updateStatus'])->name('bookings.status');
});

