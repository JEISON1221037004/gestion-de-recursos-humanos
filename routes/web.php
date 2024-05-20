<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PosicionController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\HistorialSalarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para la gestión de empleados
    Route::resource('empleados', EmpleadoController::class);

    // Rutas para la gestión de departamentos
    Route::resource('departamentos', DepartamentoController::class);

    // Rutas para la gestión de posiciones
    Route::resource('posiciones', PosicionController::class);

    // Rutas para la gestión de evaluaciones
    Route::resource('evaluaciones', EvaluacionController::class);

    // Rutas para la gestión de historial de salarios
    Route::resource('historial_salarios', HistorialSalarioController::class);
});

require __DIR__.'/auth.php';
