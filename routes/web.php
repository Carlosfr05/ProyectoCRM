<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;


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

// Rutas protegidas para delete (solo admins)
Route::middleware('auth:web', 'can.delete')->group(function () {
    Route::delete('/cliente/{cliente}', [ClientesController::class, 'destroy'])->name('cliente.destroy');
    Route::delete('/producto/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');
    Route::delete('/proveedor/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');
    Route::delete('/empleado/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');
    Route::delete('/sucursal/{sucursal}', [SucursalController::class, 'destroy'])->name('sucursal.destroy');
});

// Rutas de Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePasswordForm'])->name('profile.change-password');
    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Rutas de Gestión de Usuarios (solo para admins)
    Route::resource('/users', UserManagementController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
    Route::post('/users/{user}/change-role', [UserManagementController::class, 'changeRole'])->name('users.change-role');
});
