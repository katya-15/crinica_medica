<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

foreach (glob(__DIR__ . '/modules/*.php') as $file) {
    require $file;
}