<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PromocionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/citas', [AdminController::class, 'citas'])->name('admin.citas');
Route::get('/admin/promociones', [AdminController::class, 'promociones'])->name('admin.promociones');
Route::get('/admin/transacciones', [AdminController::class, 'transacciones'])->name('admin.transaccion.create');
Route::get('/admin/comprobante', [AdminController::class, 'comprobante'])->name('admin.comprobante');
Route::get('/admin/reporte', [AdminController::class, 'reporte'])->name('admin.reporte');
Route::get('/admin/servicios', [AdminController::class, 'servicios'])->name('admin.servicio.create');

Route::get('transaccion/create', [TransaccionController::class, 'create'])->name('transaccion.create');
Route::post('transaccion', [TransaccionController::class, 'store'])->name('transaccion.store');

Route::get('servicio/create', [ServicioController::class, 'create'])->name('servicio.create');
Route::post('servicio', [ServicioController::class, 'store'])->name('servicio.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin');
Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard')->middleware('user');


Route::get('/admin/citas', [CitaController::class, 'index'])->name('admin.citas');


Route::get('/promociones', 'PromocionController@create')->name('promociones.create');
Route::post('/promociones', 'PromocionController@store')->name('promociones.store');
