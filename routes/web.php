<?php

use Illuminate\Support\Facades\Route;

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas para el dashboard de usuarios autenticados
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Rutas para usuarios con rol de administrador (role 1)
    Route::middleware(['role:1'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('admin.dashboard');
    });

    // Rutas para usuarios con rol de usuario cajero (role casher)
    Route::middleware(['role:2'])->group(function () {
        Route::get('/casher/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('casher.dashboard');
    });

    // Rutas para usuarios con rol de usuario mesero (role waiter)
    Route::middleware(['role:3'])->group(function () {
        Route::get('/waiter/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('waiter.dashboard');
    });

    // Rutas para usuarios con rol de usuario cliente (role customer)
    Route::middleware(['role:4'])->group(function () {
        Route::get('/customer/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('customer.dashboard');
    });

    Route::get('/unauthorized', function () {
        return view('unauthorized');
    })->name('unauthorized');
    // Otras rutas que pueden estar protegidas por autenticación
    // Aquí puedes agregar más rutas para otros roles o configuraciones.
});

