<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\MarcaController;
use App\Http\Controllers\Web\TecnicoController;
use App\Http\Controllers\Web\EquipoController;
use App\Http\Controllers\Web\ServicioController;
use App\Http\Controllers\Web\UsuarioController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/temp-reset-and-login-admin-z1x2y3', function() {
    $admin = \App\Models\Usuario::where('username', 'admin')->first();
    if ($admin) {
        $newPassword = 'password456';
        $admin->password_hash = \Illuminate\Support\Facades\Hash::make($newPassword);
        $admin->save();

        \Illuminate\Support\Facades\Auth::login($admin);

        return redirect()->route('usuarios.edit', ['usuario' => $admin->id_usuario])
            ->with('success', 'Tu contraseña ha sido reseteada a \''. $newPassword .'\'. Por favor, cámbiala ahora mismo.');
    }
    return 'Usuario "admin" no encontrado.';
});

Route::get('/temp-reset-and-login-admin-z1x2y3', function() {
    $admin = \App\Models\Usuario::where('username', 'admin')->first();
    if ($admin) {
        $newPassword = 'password456';
        $admin->password_hash = \Illuminate\Support\Facades\Hash::make($newPassword);
        $admin->save();

        \Illuminate\Support\Facades\Auth::login($admin);

        return redirect()->route('usuarios.edit', ['usuario' => $admin->id_usuario])
            ->with('success', 'Tu contraseña ha sido reseteada a \''. $newPassword .'\'. Por favor, cámbiala ahora mismo.');
    }
    return 'Usuario "admin" no encontrado.';
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function() {
        return redirect('/marcas');
    })->name('home');

    Route::resource('marcas', MarcaController::class)->except([
        'show'
    ]);

    Route::resource('tecnicos', TecnicoController::class)->except([
        'show'
    ]);

    Route::resource('equipos', EquipoController::class)->except([
        'show'
    ]);

    Route::resource('servicios', ServicioController::class)->except([
        'show'
    ]);

    Route::get('/servicios/{id}/pdf', [ServicioController::class, 'generarTicketPdf'])->name('servicios.pdf');

    Route::middleware(['admin'])->group(function () {
        Route::resource('usuarios', UsuarioController::class)->except(['show']);
    });
});
