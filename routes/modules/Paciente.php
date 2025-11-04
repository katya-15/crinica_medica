<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Paciente', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [PacienteController::class, 'show'])->name('Paciente.show');
    Route::post('/store', [PacienteController::class, 'store'])->name('Paciente.store');
    Route::post('/emergency', [PacienteController::class, 'emergency'])->name('Paciente.emergency');
    Route::put('/deactivate/{paciente}', [PacienteController::class, 'deactivate'])->name('Paciente.deactivate');
    Route::put('/restore/{paciente}', [PacienteController::class, 'restore'])->name('Paciente.restore');
});
