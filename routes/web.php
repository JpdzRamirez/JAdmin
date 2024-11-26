<?php

use Illuminate\Support\Facades\Route;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Notifications\CustomVerifyEmail;

/*🏠
-----------------------------------------------
*****************Ruta default-home*************
-----------------------------------------------
 */
Route::get('/', function () {
    return view('pages.main-welcome');
})->name('home');

/*🔏💻
------------------------------------------------------------------
*****************Ruta autenticación, login y register*************
------------------------------------------------------------------
 */

// Cambia la ruta /login por /authenticate
Route::get('/authenticate', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login'); 

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

// Ruta perzonalizada para el loggin
Route::redirect('/login', '/authenticate');
Route::redirect('/register', '/authenticate');

// Ruta de cuenta suspendida ❌💔
Route::get('/account-suspended', function () {
    return view('auth.account-suspended'); // Cambia por la vista que hayas creado
})->middleware(['guest'])->name('account.suspended');

/* 📩📤📫🔑
--------------------------------------------------------------
************Validación de correo electrónico******************
--------------------------------------------------------------
 */
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('pos-register.dashboard'); // Se redirige al dashboard sin rol
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify-prompt', function () {
    return view('auth.verify-email'); // Cambia por la vista que hayas creado
})->middleware('auth')->name('verification.notice');

// Route::post('/email/verification-notification', [VerificationController::class, 'resendVerificationEmail'])
//     ->middleware(['auth'])
//     ->name('verification.send');

Route::get('/email/resend', [CustomVerifyEmail::class, 'resend'])
    ->middleware(['auth'])
    ->name('verification.resend');

/* 📩❌
--------------------------------------------------------------------
---Rutas para  REGISTRADOS Y NO AUTENTICADOS con Mail pendiente*****
--------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', config('jetstream.auth_session')])->group(function () {

    Route::get('/unauthorized', function () {
        return view('unauthorized');
    })->name('unauthorized');

});

/* 📩✅❗📒
-----------------------------------------------------------------------------------
---Rutas para  REGISTRADOS Y AUTENTICADOS con Mail verificado y en posregistro*****
-----------------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Rutas para usuarios recién registrado unauthorized (role 1)
    Route::middleware(['role:1'])->group(function () {
        Route::get('/pos-register/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('pos-register.dashboard');
    });

});
/*🔐✅
**********************************************************
--------------------ZONA YA VERIFICADA CON EMAIL----------
**********************************************************
*/
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'active','posregister'])->group(function () {

    // Rutas para usuarios con rol de administrador (role 2)
    Route::middleware(['role:2'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('admin.dashboard');
    });

    // Rutas para usuarios con rol de usuario Doctor (role 3)
    Route::middleware(['role:3'])->group(function () {
        Route::get('/doctor/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('doctor.dashboard');
    });

    // Rutas para usuarios con rol de usuario asistente (role 4)
    Route::middleware(['role:4'])->group(function () {
        Route::get('/assistant/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('assistant.dashboard');
    });

    // Rutas para usuarios con rol de usuario cliente (role 5)
    Route::middleware(['role:5'])->group(function () {
        Route::get('/customer/dashboard', function () {
            return view('pages.main-dashboard');
        })->name('customer.dashboard');
    });
    // Rutas main default 
    Route::get('/dashboard', function () {
        return view('pages.main-dashboard');
    })->name('main.dashboard');
    // Otras rutas que pueden estar protegidas por autenticación
    // Aquí puedes agregar más rutas para otros roles o configuraciones.
});


// 🛠️🛠️ ZONA MANTENIMIENTO
/* 
----------------------------------------------------------
*******Ruta de plantilla de correo electronico************
----------------------------------------------------------
*/
Route::get('/contact', function () {
    return view('emails.validate-email');
})->name('contact');

Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->name('verify.email');


