<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Cita', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [CitaController::class, 'show'])->name('Cita.show');
    Route::post('/store', [CitaController::class, 'store'])->name('Cita.store');    
    
});
