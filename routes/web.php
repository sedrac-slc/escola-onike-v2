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

    Route::get('ajax-coordenador-curso/{coordenador}', [App\Http\Controllers\CoordenadorController::class, 'ajaxCoordenadorCursos'])->name('coordenador-curso.ajaxCoordenadorCursos');
    Route::get('ajax-disciplina/{disciplina}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxDisciplina'])->name('turma-disciplina-horario.ajaxdisciplina');
    Route::get('ajax-professor/{professor}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxProfessor'])->name('turma-disciplina-horario.ajaxprofessor');
    Route::get('ajax-curso/{curso}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxCurso'])->name('turma-disciplina-horario.ajaxcurso');
    Route::get('ajax-turmas/{curso}', [App\Http\Controllers\TurmaController::class, 'ajaxTurma'])->name('turmas.ajaxturma');
    Route::get('ajax-alunos/{turma}', [App\Http\Controllers\TurmaController::class, 'ajaxAluno'])->name('turma.ajaxaluno');
    Route::get('ajax-matricula/{aluno}', [App\Http\Controllers\MatriculaController::class, 'ajaxTurma'])->name('aluno-matricula.ajaxturma');

    Route::get('notas-alunos/{id}', [App\Http\Controllers\NotaController::class, 'alunos'])->name('notas.alunos');
    Route::get('notas-aluno', [App\Http\Controllers\NotaController::class, 'aluno'])->name('notas.aluno');
    Route::get('notas', [App\Http\Controllers\NotaController::class, 'index'])->name('notas.index');
    Route::post('notas-lancar', [App\Http\Controllers\NotaController::class, 'lancar'])->name('notas.lancar');

    Route::post('aluno-matricula.store', [App\Http\Controllers\MatriculaController::class, 'matricula'])->name('aluno-matricula.store');

    Route::delete('turma-disciplina-remove', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'remove'])->name('turma-disciplina-horario.remove');
    Route::delete('coordenador-curso-remove', [App\Http\Controllers\CoordenadorController::class, 'remove'])->name('coordenador-curso.remove');
    Route::delete('aluno-matricula-remove', [App\Http\Controllers\MatriculaController::class, 'remove'])->name('aluno-matricula.remove');

    Route::resource('turma-disciplina-horario', App\Http\Controllers\TurmaDisciplinaHorarioController::class)->only(['store']);
    Route::resource('coordenador-curso', App\Http\Controllers\CoordenadorController::class);
    Route::resource('funcionarios', App\Http\Controllers\FuncionarioController::class);
    Route::resource('disciplinas', App\Http\Controllers\DisciplinaController::class);
    Route::resource('professores', App\Http\Controllers\ProfessorController::class);
    Route::resource('trimestres', App\Http\Controllers\TrimestreController::class);
    Route::resource('horarios', App\Http\Controllers\HorarioController::class);
    Route::resource('cursos', App\Http\Controllers\CursoController::class);
    Route::resource('turmas', App\Http\Controllers\TurmaController::class);
    Route::resource('alunos', App\Http\Controllers\AlunoController::class);
    //Route::resource('notas', App\Http\Controllers\NotaController::class);
});
