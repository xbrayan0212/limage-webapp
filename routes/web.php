<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/citas', function () {
	return view('layouts.admin.citas');
});

Route::get('/promociones', function () {
	return view('layouts.admin.promociones');
});

Route::get('/transacciones', function () {
	return view('layouts.admin.transacciones');
});

Route::get('/reporte', function () {
	return view('layouts.admin.reporte');
});

Route::get('/calendar', function () {
	return view('layouts.admin.calendar');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
