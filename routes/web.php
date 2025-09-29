<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\MarcaController;
use App\Http\Controllers\Web\TecnicoController;
use App\Http\Controllers\Web\EquipoController;
use App\Http\Controllers\Web\ServicioController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

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
});
