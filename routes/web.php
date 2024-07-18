<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\users\CitaController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/citas', function () {
// 	return view('layouts.admin.citas');
// });

// Route::get('/promociones', function () {
// 	return view('layouts.admin.promociones');
// });

// Route::get('/transacciones', function () {
// 	return view('layouts.admin.transacciones');
// });

// Route::get('/reporte', function () {
// 	return view('layouts.admin.reporte');
// });

// Route::get('/calendar', function () {
// 	return view('layouts.admin.calendar');
// });

// Route::get('/servicios', function(){
// 	return view('layouts.admin.servicio.create');
// });

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/citas', [AdminController::class, 'citas'])->name('admin.citas');
Route::get('/admin/promociones', [AdminController::class, 'promociones'])->name('admin.promociones');
Route::get('/admin/transacciones', [AdminController::class, 'transacciones'])->name('admin.transacciones');
Route::get('/admin/reporte', [AdminController::class, 'reporte'])->name('admin.reporte');
Route::get('/admin/servicios', [AdminController::class, 'servicios'])->name('admin.servicio.create');

Route::get('servicio/create', [ServicioController::class, 'create'])->name('servicio.create');
Route::post('servicio', [ServicioController::class, 'store'])->name('servicio.store');


Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin');
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard')->middleware('user');

/*agendar cita rutas*/
Route::get('users/agendar-cita', [CitaController::class, 'create'])->name('users.agendarCita');
Route::get('/users/agendarCita', [CitaController::class, 'showForm'])->name('agendarCita');
Route::post('/submit-form', [CitaController::class, 'submitForm'])->name('submitForm');
