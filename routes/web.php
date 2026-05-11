<?php

use App\Http\Controllers\HomeController;
// use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\EventController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class);
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/laporan-transaksi', [LaporanController::class, 'index'])->name('laporan.index');
});

