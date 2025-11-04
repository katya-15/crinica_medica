<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', [UserController::class, 'show'])->middleware(RolMiddleware::class . ':admin')->name('User.show');
    Route::post('/store', [UserController::class, 'store'])->middleware(RolMiddleware::class . ':admin')->name('User.store');    
    Route::post('/specialty', [UserController::class, 'specialty'])->middleware(RolMiddleware::class . ':admin')->name('User.specialty');    
    Route::put('/deactivate/{user}', [UserController::class, 'deactivate'])->middleware(RolMiddleware::class . ':admin')->name('User.deactivate');
    Route::put('/restore/{user}', [UserController::class, 'restore'])->middleware(RolMiddleware::class . ':admin')->name('User.restore');
});
