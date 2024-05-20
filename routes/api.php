<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EmpleadoController;
use App\Http\Controllers\api\DepartamentoController;
use App\Http\Controllers\api\PosicionController;
use App\Http\Controllers\api\EvaluacionController;
use App\Http\Controllers\api\HistorialSalarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('empleados', EmpleadoController::class);
Route::apiResource('departamentos', DepartamentoController::class);
Route::apiResource('posiciones', PosicionController::class);
Route::apiResource('evaluaciones', EvaluacionController::class);
Route::apiResource('historial_salarios', HistorialSalarioController::class);
