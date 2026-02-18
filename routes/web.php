<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/cliente', ClientesController::class);
Route::resource('/producto', ProductoController::class);
Route::resource('/proveedor', ProveedorController::class);
Route::resource('/empleado', EmpleadoController::class);
Route::resource('/sucursal', SucursalController::class);

// Rutas de Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePasswordForm'])->name('profile.change-password');
    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
});
