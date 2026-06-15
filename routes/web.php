<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// Admin login routes
Route::redirect('/login', '/admin/login')->name('login');
Route::get('admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.post');

Route::prefix('admin')->name('admin.')->group(function () {
    // admin.* named routes live here
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {
    // Dashboard accessible at /admin/dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Redirect /admin to /admin/dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::resource('events', AdminEventController::class);

    Route::resource('partners', PartnerController::class);

    Route::resource('categories', CategoryController::class);

    Route::get('/laporan-transaksi', [LaporanController::class, 'index'])->name('laporan.index');
    });
});