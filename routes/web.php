<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, ItemController, TransactionController, DashboardController};

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile (came with Breeze, keep it)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Your app routes
    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('transactions/pos', [TransactionController::class, 'pos'])->name('transactions.pos');
    Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('transactions/{id}/download', [TransactionController::class, 'download'])->name('transactions.download');
    
});

require __DIR__.'/auth.php';
