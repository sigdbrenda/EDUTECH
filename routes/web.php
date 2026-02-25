<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalogo', function () {
    return view('estudiante.catalogo');
})->middleware(['auth'])->name('estudiante.catalogo');

Route::get('/mis-cursos', function () {
    return view('instructor.gestion');
})->middleware(['auth'])->name('instructor.cursos');

Route::view('dashboard','dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile','profile')->middleware('auth')->name('profile');

require __DIR__.'/auth.php';