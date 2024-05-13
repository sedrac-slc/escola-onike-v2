<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('usuarios/{id}',[HomeController::class,'update'])->name('usuarios.update');
Route::put('actualizar-senha/{id}',[HomeController::class,'password'])->name('senha.update');

Route::resource('cursos',App\Http\Controllers\CursoController::class);
Route::resource('turmas',App\Http\Controllers\TurmaController::class);
Route::resource('trimestres',App\Http\Controllers\TrimestreController::class);
Route::resource('horarios',App\Http\Controllers\HorarioController::class);
Route::resource('disciplinas',App\Http\Controllers\DisciplinaController::class);
