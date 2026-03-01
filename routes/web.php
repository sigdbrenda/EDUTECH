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

Route::view('profile','profile')->middleware('auth')->name('profile');

require __DIR__.'/auth.php';

Route::view('catalogo', 'catalogo')->middleware(['auth'])->name('catalogo');

Route::view('gestion', 'gestion')->middleware(['auth'])->name('gestion');

Route::view('solicitud-instructor', 'solicitud')->middleware(['auth'])->name('instructor.solicitud');

Route::view('instructor/cursos', 'instructor.admin')->middleware(['auth'])->name('instructor.admin');

Route::view('instructor/nuevo-curso', 'instructor.wizard')->middleware(['auth'])->name('instructor.nuevo-curso');