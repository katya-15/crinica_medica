<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'User', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [UserController::class, 'show'])->name('User.show');
    Route::post('/store', [UserController::class, 'store'])->name('User.store');    
    Route::post('/specialty', [UserController::class, 'specialty'])->name('User.specialty');    
});
