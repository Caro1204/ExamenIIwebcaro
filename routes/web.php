<?php
use App\Http\Controllers\ChurroController;
use App\Http\Controllers\HomeController;

// Ruta para el Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rutas para los churros vencidos
Route::get('/churros/vencidos', [ChurroController::class, 'churrosVencidos'])->name('churros.vencidos');

// Ruta para stock de churros aptos para celíacos
Route::get('/churros/stock_celiacos', [ChurroController::class, 'stockCeliacos'])->name('churros.stock_celiacos');
Route::post('/churros/stock_celiacos', [ChurroController::class, 'stockCeliacos']);

// Ruta para marcar un churro como vencido
Route::post('/churros/marcar_vencido/{id}', [ChurroController::class, 'marcarChurroComoVencido'])->name('churros.marcar_vencido');

// Ruta para buscar churros por tipo
Route::get('/churros/buscar_por_tipo', [ChurroController::class, 'buscarChurrosPorTipo'])->name('churros.buscar_por_tipo');

// Ruta para mostrar el formulario de creación de churros
Route::get('/churros/crear', [ChurroController::class, 'crearChurro'])->name('churros.crear');

// Ruta para guardar un churro
Route::post('/churros/crear', [ChurroController::class, 'guardarChurro'])->name('churros.guardar');

// Ruta para mostrar el formulario de edición del stock
Route::get('/churros/editar_stock/{id}', [ChurroController::class, 'editarStock'])->name('churros.editar_stock');

// Ruta para actualizar el stock en la base de datos
Route::put('/churros/actualizar_stock/{id}', [ChurroController::class, 'actualizarStock'])->name('churros.actualizar_stock');

// Ruta para listar todos los churros
Route::get('/churros', [ChurroController::class, 'index'])->name('churros.index');
