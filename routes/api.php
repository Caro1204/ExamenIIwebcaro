<?php
use App\Http\Controllers\Api\ChurroApiController;

// Rutas protegidas para el API REST
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/churros/apto_celiacos', [ChurroApiController::class, 'obtenerChurrosAptosCeliacos']);
    Route::post('/churros', [ChurroApiController::class, 'agregarChurro']);
    Route::delete('/churros/{id}', [ChurroApiController::class, 'eliminarChurro']);
    Route::put('/tipos/{id}', [ChurroApiController::class, 'actualizarTipo']);
});
