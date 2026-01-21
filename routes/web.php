<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/box1', function () {
    return view('box1');
})->middleware(['auth'])->name('box1');

require __DIR__.'/settings.php';
