<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReportController;

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
});
