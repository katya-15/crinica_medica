<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Servicio', 'middleware' => ['auth']], function () {
    Route::get('/', [ServicioController::class, 'show'])->middleware(RolMiddleware::class . ':admin')->name('Servicio.show');
    Route::post('/store', [ServicioController::class, 'store'])->middleware(RolMiddleware::class . ':admin')->name('Servicio.store');
    Route::put('/deactivate/{servicio}', [ServicioController::class, 'deactivate'])->middleware(RolMiddleware::class . ':admin')->name('Servicio.deactivate');
    Route::put('/restore/{servicio}', [ServicioController::class, 'restore'])->middleware(RolMiddleware::class . ':admin')->name('Servicio.restore');
});
