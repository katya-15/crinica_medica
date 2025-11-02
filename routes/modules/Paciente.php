<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Paciente', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [PacienteController::class, 'show'])->name('Paciente.show');
    Route::post('/store', [PacienteController::class, 'store'])->name('Paciente.store');
    
});
