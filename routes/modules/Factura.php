<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Factura', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [FacturaController::class, 'show'])->name('Factura.show');
    Route::post('/store', [FacturaController::class, 'store'])->name('Factura.store');    
    
});
