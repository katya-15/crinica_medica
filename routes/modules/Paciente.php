<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Paciente', 'middleware' => ['auth']], function () {
    Route::get('/', [PacienteController::class, 'show'])->middleware(RolMiddleware::class . ':admin,recepcionista')->name('Paciente.show');
    Route::post('/store', [PacienteController::class, 'store'])->middleware(RolMiddleware::class . ':admin,recepcionista')->name('Paciente.store');
    Route::post('/emergency', [PacienteController::class, 'emergency'])->middleware(RolMiddleware::class . ':admin,recepcionista')->name('Paciente.emergency');
    Route::put('/deactivate/{paciente}', [PacienteController::class, 'deactivate'])->middleware(RolMiddleware::class . ':admin')->name('Paciente.deactivate');
    Route::put('/restore/{paciente}', [PacienteController::class, 'restore'])->middleware(RolMiddleware::class . ':admin')->name('Paciente.restore');
});
