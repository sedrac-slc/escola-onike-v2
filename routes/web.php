<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group( function () {

    Route::put('passoword/{id}', [App\Http\Controllers\HomeController::class, 'password'])->name('senha.update');
    Route::put('usuarios/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('usuarios.update');

    Route::get('ajax-disciplina-professor/{disciplina}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxDisciplinaProfessor'])->name('turma-disciplina-horario.ajaxDisciplinaProfessor');
    Route::get('ajax-disciplina-horario/{horario}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxDisciplinaHorario'])->name('turma-disciplina-horario.ajaxDisciplinaHorario');
    Route::get('ajax-notas-turma/{turma}/trimestre/{trimestre}/disciplina/{disciplina}', [App\Http\Controllers\NotaController::class, 'ajaxTurmaTrimestre'])->name('notas.ajaxTurmaTrimestre');
    Route::get('ajax-coordenador-curso/{coordenador}', [App\Http\Controllers\CoordenadorController::class, 'ajaxCoordenadorCursos'])->name('coordenador-curso.ajaxCoordenadorCursos');
    Route::get('ajax-disciplina/{disciplina}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxDisciplina'])->name('turma-disciplina-horario.ajaxdisciplina');
    Route::get('ajax-professor/{professor}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxProfessor'])->name('turma-disciplina-horario.ajaxprofessor');
    Route::get('ajax-trimestre-notas/{trimestre}', [App\Http\Controllers\TrimestreController::class, 'ajaxTrimestreNota'])->name('trimestre-nota.ajaxTrimestreNota');
    Route::get('ajax-curso/{curso}', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'ajaxCurso'])->name('turma-disciplina-horario.ajaxcurso');
    Route::get('ajax-turmas-professor/{professor}', [App\Http\Controllers\TurmaController::class, 'ajaxTurmaProfessor'])->name('turmas.ajaxprofessor');
    Route::get('ajax-matricula/{aluno}', [App\Http\Controllers\MatriculaController::class, 'ajaxTurma'])->name('aluno-matricula.ajaxturma');
    Route::get('ajax-classe-by-curso', [App\Http\Controllers\ClasseController::class, 'findByCurso'])->name('classes.ajaxcurso');
    Route::get('ajax-aluno-curso/{curso}', [App\Http\Controllers\AlunoController::class, 'ajaxCurso'])->name('aluno.ajaxcurso');
    Route::get('ajax-turmas/{curso}', [App\Http\Controllers\TurmaController::class, 'ajaxTurma'])->name('turmas.ajaxturma');
    Route::get('ajax-alunos/{turma}', [App\Http\Controllers\TurmaController::class, 'ajaxAluno'])->name('turma.ajaxaluno');
    Route::get('ajax-search-turma', [App\Http\Controllers\TurmaController::class, 'ajaxSearch'])->name('turma.ajaxsearch');
    Route::get('ajax-search-aluno', [App\Http\Controllers\AlunoController::class, 'ajaxSearch'])->name('aluno.ajaxsearch');

    Route::get('curso-horario-pdf/{id}', [App\Http\Controllers\CursoController::class, 'horarioPDF'])->name('curso.horario-pdf');
    Route::get('notas-alunos-pdf/{id}', [App\Http\Controllers\NotaController::class, 'notaPDF'])->name('notas.pdf');

    Route::get('notas-alunos/{id}', [App\Http\Controllers\NotaController::class, 'alunos'])->name('notas.alunos');
    Route::get('notas-aluno', [App\Http\Controllers\NotaController::class, 'aluno'])->name('notas.aluno');
    Route::get('notas', [App\Http\Controllers\NotaController::class, 'index'])->name('notas.index');
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('aluno-matricula.store', [App\Http\Controllers\MatriculaController::class, 'matricula'])->name('aluno-matricula.store');
    Route::post('photo-user/{id}', [App\Http\Controllers\HomeController::class, 'photo'])->name('user.photo');
    Route::post('notas-lancar', [App\Http\Controllers\NotaController::class, 'lancar'])->name('notas.lancar');

    Route::delete('professor-leciona-remove', [App\Http\Controllers\ProfessorController::class, 'remove_professor_leciona'])->name('professor-leciona.remove');
    Route::delete('turma-disciplina-remove', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'remove'])->name('turma-disciplina-horario.remove');
    Route::delete('coordenador-curso-remove', [App\Http\Controllers\CoordenadorController::class, 'remove'])->name('coordenador-curso.remove');
    Route::delete('aluno-matricula-remove', [App\Http\Controllers\MatriculaController::class, 'remove'])->name('aluno-matricula.remove');
    Route::delete('turma-remove-aluno', [App\Http\Controllers\TurmaController::class, 'remove_aluno'])->name('turma.remove.aluno');
    Route::delete('turma-remove', [App\Http\Controllers\TurmaController::class, 'remove'])->name('turma.remove');

    Route::post('turma-disciplina-horario-professor', [App\Http\Controllers\TurmaDisciplinaHorarioController::class, 'store_professor'])->name('turma-disciplina-horario.store_professor');

    Route::resource('turma-disciplina-horario', App\Http\Controllers\TurmaDisciplinaHorarioController::class)->only(['store']);
    Route::resource('coordenador-curso', App\Http\Controllers\CoordenadorController::class);
    Route::resource('funcionarios', App\Http\Controllers\FuncionarioController::class);
    Route::resource('disciplinas', App\Http\Controllers\DisciplinaController::class);
    Route::resource('professores', App\Http\Controllers\ProfessorController::class);
    Route::resource('trimestres', App\Http\Controllers\TrimestreController::class);
    Route::resource('matriculas', App\Http\Controllers\MatriculaController::class);
    Route::resource('horarios', App\Http\Controllers\HorarioController::class);
    Route::resource('classes', App\Http\Controllers\ClasseController::class);
    Route::resource('cursos', App\Http\Controllers\CursoController::class);
    Route::resource('turmas', App\Http\Controllers\TurmaController::class);
    Route::resource('alunos', App\Http\Controllers\AlunoController::class);
    Route::resource('notas', App\Http\Controllers\NotaController::class);
});
