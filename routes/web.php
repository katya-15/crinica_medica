<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

foreach (glob(__DIR__ . '/modules/*.php') as $file) {
    require $file;
}