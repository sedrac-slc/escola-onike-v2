<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::put('usuarios/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('usuarios.update');
Route::put('actualizar-senha/{id}', [App\Http\Controllers\HomeController::class, 'password'])->name('senha.update');

Route::middleware(['auth'])->group( function () {
    Route::resource('cursos', App\Http\Controllers\CursoController::class);
    Route::resource('turmas', App\Http\Controllers\TurmaController::class);
    Route::resource('trimestres', App\Http\Controllers\TrimestreController::class);
    Route::resource('horarios', App\Http\Controllers\HorarioController::class);
    Route::resource('disciplinas', App\Http\Controllers\DisciplinaController::class);
    Route::resource('classes', App\Http\Controllers\ClasseController::class);
    Route::resource('alunos', App\Http\Controllers\AlunoController::class);
    Route::resource('professores', App\Http\Controllers\ProfessorController::class);
    Route::resource('funcionarios', App\Http\Controllers\FuncionarioController::class);
    Route::resource('pautas', App\Http\Controllers\PautaController::class);
    Route::resource('notas', App\Http\Controllers\NotaController::class);
});
