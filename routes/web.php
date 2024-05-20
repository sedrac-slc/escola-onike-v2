<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::put('passoword/{id}', [App\Http\Controllers\HomeController::class, 'password'])->name('senha.update');
Route::put('usuarios/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('usuarios.update');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group( function () {
    Route::get('ajax-disciplina/{disciplina}', [App\Http\Controllers\CursoDisciplinaHorarioController::class, 'ajaxDisciplina'])->name('curso-disciplina-horario.ajaxdisciplina');
    Route::get('ajax-professor/{professor}', [App\Http\Controllers\CursoDisciplinaHorarioController::class, 'ajaxProfessor'])->name('curso-disciplina-horario.ajaxprofessor');
    Route::get('ajax-curso/{curso}', [App\Http\Controllers\CursoDisciplinaHorarioController::class, 'ajaxCurso'])->name('curso-disciplina-horario.ajaxcurso');
    Route::get('ajax-turmas/{curso}', [App\Http\Controllers\TurmaController::class, 'ajaxTurma'])->name('turmas.ajaxturma');

    Route::delete('curso-disciplina-remove', [App\Http\Controllers\CursoDisciplinaHorarioController::class, 'remove'])->name('curso-disciplina-horario.remove');

    Route::resource('curso-disciplina-horario', App\Http\Controllers\CursoDisciplinaHorarioController::class)->only(['store']);
    Route::resource('funcionarios', App\Http\Controllers\FuncionarioController::class);
    Route::resource('disciplinas', App\Http\Controllers\DisciplinaController::class);
    Route::resource('professores', App\Http\Controllers\ProfessorController::class);
    Route::resource('trimestres', App\Http\Controllers\TrimestreController::class);
    Route::resource('horarios', App\Http\Controllers\HorarioController::class);
    Route::resource('cursos', App\Http\Controllers\CursoController::class);
    Route::resource('turmas', App\Http\Controllers\TurmaController::class);
    Route::resource('alunos', App\Http\Controllers\AlunoController::class);
    Route::resource('pautas', App\Http\Controllers\PautaController::class);
    Route::resource('notas', App\Http\Controllers\NotaController::class);
});
