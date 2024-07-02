<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexBranchController;
use App\Http\Controllers\IndexServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\checkLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store'])->name('home.store');
Route::get('serviceindex', [IndexServiceController::class, 'index'])->name('indexservice');
Route::get('/branchindex', [IndexBranchController::class, 'index'])->name('indexbranch');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/branch', [BranchController::class, 'index'])->name('branch')->middleware(checkLevel::class);
Route::post('/branch', [BranchController::class, 'store'])->name('branch.store')->middleware(checkLevel::class);
Route::delete('/branch/{id}', [BranchController::class, 'destroy'])->name('branch.destroy')->middleware(checkLevel::class);
Route::get('/services', [ServicesController::class, 'index'])->name('services')->middleware(checkLevel::class);
Route::post('/services', [ServicesController::class, 'store'])->name('services.store')->middleware(checkLevel::class);
Route::delete('/services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy')->middleware(checkLevel::class);
Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
Route::delete('/reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy')->middleware(checkLevel::class);
Route::get('/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('reservation.edit')->middleware(checkLevel::class);
Route::put('/reservation/{id}', [ReservationController::class, 'update'])->name('reservation.update')->middleware(checkLevel::class);
