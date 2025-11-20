<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\ServiceController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin routes (protected by admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Manage Reviews
    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('admin.reviews.store');
    Route::post('/reviews/{id}/approve', [ReviewController::class, 'approve'])->name('admin.reviews.approve');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('admin.reviews.update');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    
    // Monthly Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports.index');
    
    // Services Management
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
    Route::post('/services/{service}/toggle', [ServiceController::class, 'toggle'])->name('admin.services.toggle');
    Route::post('/services/reorder', [ServiceController::class, 'reorder'])->name('admin.services.reorder');
});
