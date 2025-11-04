<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Factura', 'middleware' => ['auth']], function () {
    Route::get('/', [FacturaController::class, 'show'])->middleware(RolMiddleware::class . ':admin,recepcionista')->name('Factura.show');
    Route::post('/store', [FacturaController::class, 'store'])->middleware(RolMiddleware::class . ':admin,recepcionista')->name('Factura.store');    
    
});
