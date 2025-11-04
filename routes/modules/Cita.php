<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Cita', 'middleware' => ['auth']], function () {
    Route::get('/', [CitaController::class, 'show'])->middleware(RolMiddleware::class . ':admin,recepcionista,medico')->name('Cita.show');
    Route::post('/store', [CitaController::class, 'store'])->middleware(RolMiddleware::class . ':admin,recepcionista')->name('Cita.store');    
    
});
