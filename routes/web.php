<?php

use Illuminate\Support\Facades\Route;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Laravel\Fortify\Http\Controllers\VerificationController;


// Ruta de bienvenida
Route::get('/', function () {
    return view('pages.main-welcome');
})->name('home');

// Ruta para mostrar el formulario de login
Route::get('/authenticate', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login'); // Cambia la ruta /login por /authenticate

// Ruta para procesar la solicitud de login
Route::post('/authenticate', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest'])
    ->name('login.attempt');

// Ruta para mostrar el formulario de registro
Route::get('/authenticate/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register'); // Cambia la ruta /register por /authenticate/register

// Ruta para procesar la solicitud de registro
Route::post('/authenticate/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest'])
    ->name('register.attempt');

Route::redirect('/login', '/authenticate');
Route::redirect('/register', '/authenticate');


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

// Ruta de plantilla de correo electronico
Route::get('/contact', function () {
    return view('emails.validate-email');
})->name('contact');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard'); // Cambiar por la página deseada
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify-prompt', function () {
    return view('auth.verify-email'); // Cambia por la vista que hayas creado
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', [VerificationController::class, 'resendVerificationEmail'])
    ->middleware(['auth'])
    ->name('verification.send');

Route::get('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth'])
    ->name('verification.resend');
