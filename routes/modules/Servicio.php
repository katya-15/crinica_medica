<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Servicio', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [ServicioController::class, 'show'])->name('Servicio.show');
    Route::post('/store', [ServicioController::class, 'store'])->name('Servicio.store');
    Route::put('/deactivate/{servicio}', [ServicioController::class, 'deactivate'])->name('Servicio.deactivate');
    Route::put('/restore/{servicio}', [ServicioController::class, 'restore'])->name('Servicio.restore');
});
