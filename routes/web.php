<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return redirect()->route('cars.index');
});

Route::resource('cars', CarController::class);

// Index: nampilin semua mobil
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

// Create: form tambah mobil
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');

// Store: simpan mobil baru
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

// Edit: form edit mobil
Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');

// Update: simpan perubahan
Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');

// Delete: hapus mobil
Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

// Detail (opsional kalau mau)
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

Route::get('/search-cars', [CarController::class, 'search']);

