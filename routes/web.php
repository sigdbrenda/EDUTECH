<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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

Route::get('/gestion', function () {
    return view('instructor.gestion');
})->middleware(['auth'])->name('instructor.gestion');

Route::get('instructor/cursos', function () {
    $courses = \App\Models\Course::where('user_id', auth()->id())->get();
    return view('instructor.admin', compact('courses'));
})->middleware(['auth'])->name('instructor.admin');

Route::view('instructor/nuevo-curso', 'instructor.wizard')->middleware(['auth'])->name('instructor.nuevo-curso');

Route::post('courses/store', [CourseController::class, 'store'])->name('courses.store');

Route::middleware(['auth'])->group(function () {

    Route::get('instructor/cursos/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('instructor/cursos/{course}', [CourseController::class, 'update'])->name('courses.update');
    
    Route::delete('instructor/cursos/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

Route::get('instructor/cursos/{course}/curriculum', [CourseController::class, 'curriculum'])->name('courses.curriculum');


Route::post('/instructor/cursos/{course}/guardar-plan', [CourseController::class, 'guardarPlan'])
    ->name('instructor.guardar-plan');


Route::get('/cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('/cursos/{course}/inscribirse', [CourseController::class, 'enroll'])
    ->middleware('auth')
    ->name('courses.enroll');


Route::get('/catalogo', [CourseController::class, 'index'])->name('catalogo');

Route::get('/pago/{course}', [CourseController::class, 'payment'])->name('courses.payment');

Route::get('/pago/{course}/confirmar', [CourseController::class, 'processPayment'])->name('courses.process_payment');


Route::get('/pago/{course}/exito', [CourseController::class, 'success'])->name('courses.success');


Route::get('/pago/{course}/tarjeta', [CourseController::class, 'checkout'])->name('courses.checkout');


Route::get('/pago/{course}/procesar', [CourseController::class, 'processPayment'])->name('courses.process_payment');