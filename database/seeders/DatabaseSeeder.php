<?php

namespace Database\Seeders;

use App\Models\{
    Aluno, User, Curso, Turma, Trimestre, Horario, Disciplina, Matricula,
    ProfessorLeciona, Professor, Funcionario, TurmaDisciplinaHorario, Coordenador
};
use App\Enum\{FuncaoEnum, DiaSemanaEnum, NumeroClasseEnum};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(['email' => 'mariolopez@example.com'], [
            'name' => 'Mario lopez', 'email' => 'mariolopez@example.com',
            'genero' => 'M', 'data_nascimento' => '1999-07-12',
            'bilhete_identidade' => '006543012LA092', 'funcao' => FuncaoEnum::DIRECTOR_GERAL,
            'password' => bcrypt('12345678')
        ]);

        $userTwo = User::updateOrCreate(['email' => 'belalopez@example.com'], [
            'name' => 'Bela lopez', 'email' => 'belalopez@example.com',
            'genero' => 'F', 'data_nascimento' => '2004-07-12',
            'bilhete_identidade' => '007543012LA043', 'funcao' => FuncaoEnum::PROFESSOR,
            'password' => bcrypt('12345678')
        ]);

        $userThree = User::updateOrCreate(['email' => 'rucapires@example.com'], [
            'name' => 'Ruca Pires', 'email' => 'rucapires@example.com',
            'genero' => 'M', 'data_nascimento' => '2004-10-22',
            'bilhete_identidade' => '002546012LA015', 'funcao' => FuncaoEnum::PROFESSOR,
            'password' => bcrypt('12345678')
        ]);

        $userFour = User::updateOrCreate(['email' => 'joanaalberto@example.com'], [
            'name' => 'Joana Alberto', 'email' => 'joanaalberto@example.com',
            'genero' => 'F', 'data_nascimento' => '2004-02-09',
            'bilhete_identidade' => '003447612LA026', 'funcao' => FuncaoEnum::PROFESSOR,
            'password' => bcrypt('12345678')
        ]);

        $userFive = User::updateOrCreate(['email' => 'paulopequeno@example.com'], [
            'name' => 'Paulo pequeno', 'email' => 'paulopequeno@example.com',
            'genero' => 'M', 'data_nascimento' => '2004-07-10',
            'bilhete_identidade' => '000747342BE026', 'funcao' => FuncaoEnum::ALUNO,
            'password' => bcrypt('12345678')
        ]);

        $userSix = User::updateOrCreate(['email' => 'bertamaria@example.com'], [
            'name' => 'Berta Maria', 'email' => 'bertamaria@example.com',
            'genero' => 'F', 'data_nascimento' => '2004-04-10',
            'bilhete_identidade' => '000747342BE026', 'funcao' => FuncaoEnum::ALUNO,
            'password' => bcrypt('12345678')
        ]);

        $userSeven = User::updateOrCreate(['email' => 'lucasfirme@example.com'], [
            'name' => 'Lucas Firme', 'email' => 'lucasfirme@example.com',
            'genero' => 'M', 'data_nascimento' => '2004-04-10',
            'bilhete_identidade' => '000947212CA036', 'funcao' => FuncaoEnum::ALUNO,
            'password' => bcrypt('12345678')
        ]);

        $userEigth = User::updateOrCreate(['email' => 'orlandofernando@example.com'], [
            'name' => 'Orlando Fernando', 'email' => 'orlandofernando@example.com',
            'genero' => 'M', 'data_nascimento' => '1989-04-11',
            'bilhete_identidade' => '000214212HU062', 'funcao' => FuncaoEnum::COORDENADOR_CURSO,
            'password' => bcrypt('12345678')
        ]);

        $userNone = User::updateOrCreate(['email' => 'mirianlucas@example.com'], [
            'name' => 'Mirian Lucas', 'email' => 'mirianlucas@example.com',
            'genero' => 'F', 'data_nascimento' => '1990-04-11',
            'bilhete_identidade' => '000318212LA159', 'funcao' => FuncaoEnum::COORDENADOR_CURSO,
            'password' => bcrypt('12345678')
        ]);

        $cursoOne = Curso::updateOrCreate(['nome' => 'Ciências Físicas e Biológicas'],[
            'nome' => 'Ciências Físicas e Biológicas', 'num_classe' => NumeroClasseEnum::DECIMA,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $cursoTwo = Curso::updateOrCreate(['nome' => 'Ciências Ecônomicas e Empresarial'],[
            'nome' => 'Ciências Ecônomicas e Empresarial', 'num_classe' => NumeroClasseEnum::DECIMA,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaOne = Turma::updateOrCreate(['ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1", "curso_id" => $cursoOne->id],[
            'ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1", "curso_id" => $cursoOne->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaTwo = Turma::updateOrCreate(['ano_lectivo' => "2023/2024", "periodo" => "TARDE", "sala" => "2", "curso_id" => $cursoOne->id],[
            'ano_lectivo' => "2023/2024", "periodo" => "TARDE", "sala" => "2", "curso_id" => $cursoOne->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaThree = Turma::updateOrCreate(['ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1", "curso_id" => $cursoTwo->id],[
            'ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1", "curso_id" => $cursoTwo->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaFour = Turma::updateOrCreate(['ano_lectivo' => "2023/2024", "periodo" => "TARDE", "sala" => "2", "curso_id" => $cursoTwo->id],[
            'ano_lectivo' => "2023/2024", "periodo" => "TARDE", "sala" => "2", "curso_id" => $cursoTwo->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $trimestre = Trimestre::updateOrCreate(['data_inicio' => '2024-03-30', 'data_termino' => '2023-06-27'],[
            'data_inicio' => '2024-03-30', 'data_termino' => '2023-06-27',
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $horarioOne = Horario::updateOrCreate(['dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA, 'hora_inicio' => "08:00:00", 'hora_termino' => "09:00:00"],[
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA, 'hora_inicio' => "08:00:00", 'hora_termino' => "09:00:00",
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $horarioTwo = Horario::updateOrCreate(['dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA, 'hora_inicio' => "09:05:00", 'hora_termino' => "10:05:00"],[
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA, 'hora_inicio' => "09:05:00", 'hora_termino' => "10:05:00",
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $horarioThree = Horario::updateOrCreate(['dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA, 'hora_inicio' => "10:10:00", 'hora_termino' => "12:00:00"],[
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA, 'hora_inicio' => "10:10:00", 'hora_termino' => "12:00:00",
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $disciplinaOne = Disciplina::updateOrCreate(['nome' => 'Física'],[
            'nome' => 'Física', 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $disciplinaTwo = Disciplina::updateOrCreate(['nome' => 'Matemática'],[
            'nome' => 'Matemática', 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $disciplinaThree = Disciplina::updateOrCreate(['nome' => 'Biologia'],[
            'nome' => 'Biologia', 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $disciplinaFour = Disciplina::updateOrCreate(['nome' => 'Língua Porguesa'],[
            'nome' => 'Língua Porguesa', 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $professorOne = Professor::updateOrCreate(['user_id' => $userTwo->id, "formacao" => "Física"],[
            'user_id' => $userTwo->id,"formacao" => "Física" , 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $professorTwo = Professor::updateOrCreate(['user_id' => $userThree->id, "formacao" => "Química"],[
            'user_id' => $userThree->id,"formacao" => "Química" , 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $professorThree = Professor::updateOrCreate(['user_id' => $userFour->id, "formacao" => "Lógica Matemática"],[
            'user_id' => $userFour->id,"formacao" => "Lógica Matemática" , 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $alunoOne = Aluno::updateOrCreate(['user_id' => $userFive->id],[
            'user_id' => $userFive->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $alunoTwo = Aluno::updateOrCreate(['user_id' => $userSix->id],[
            'user_id' => $userSix->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $alunoThree = Aluno::updateOrCreate(['user_id' => $userSeven->id],[
            'user_id' => $userSeven->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $coodenadorOne = Coordenador::updateOrCreate(['user_id' => $userEigth->id],[
            'user_id' => $userEigth->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $coodenadorTwo = Coordenador::updateOrCreate(['user_id' => $userNone->id],[
            'user_id' => $userNone->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $coodenadorOne->cursos()->sync([ $cursoOne->id ]);
        $coodenadorTwo->cursos()->sync([ $cursoTwo->id ]);

        Funcionario::updateOrCreate(['user_id' => $user->id],[
            'user_id' => $user->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        Matricula::updateOrCreate(['aluno_id' => $alunoOne->id, 'turma_id' => $turmaOne->id],[
            'aluno_id' => $alunoOne->id, 'turma_id' => $turmaOne->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        Matricula::updateOrCreate(['aluno_id' => $alunoThree->id, 'turma_id' => $turmaOne->id],[
            'aluno_id' => $alunoThree->id, 'turma_id' => $turmaOne->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        Matricula::updateOrCreate(['aluno_id' => $alunoTwo->id, 'turma_id' => $turmaTwo->id],[
            'aluno_id' => $alunoTwo->id, 'turma_id' => $turmaTwo->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaDisciplinaHorarioOne = TurmaDisciplinaHorario::updateOrCreate([
            'turma_id' => $turmaOne->id, 'horario_id' => $horarioOne->id, 'disciplina_id' => $disciplinaOne->id
        ],[
            'turma_id' => $turmaOne->id, 'horario_id' => $horarioOne->id, 'disciplina_id' => $disciplinaOne->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaDisciplinaHorarioTwo = TurmaDisciplinaHorario::updateOrCreate([
            'turma_id' => $turmaOne->id, 'horario_id' => $horarioTwo->id, 'disciplina_id' => $disciplinaTwo->id
        ],[
            'turma_id' => $turmaOne->id, 'horario_id' => $horarioTwo->id, 'disciplina_id' => $disciplinaTwo->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaDisciplinaHorarioThree = TurmaDisciplinaHorario::updateOrCreate([
            'turma_id' => $turmaTwo->id, 'horario_id' => $horarioTwo->id, 'disciplina_id' => $disciplinaThree->id
        ],[
            'turma_id' => $turmaTwo->id, 'horario_id' => $horarioTwo->id, 'disciplina_id' => $disciplinaThree->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turmaDisciplinaHorarioFour = TurmaDisciplinaHorario::updateOrCreate([
            'turma_id' => $turmaThree->id, 'horario_id' => $horarioThree->id, 'disciplina_id' => $disciplinaFour->id
        ],[
            'turma_id' => $turmaThree->id, 'horario_id' => $horarioThree->id, 'disciplina_id' => $disciplinaFour->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        ProfessorLeciona::updateOrCreate([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioOne->id,  'professor_id' => $professorOne->id,
        ],[
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioOne->id,  'professor_id' => $professorOne->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        ProfessorLeciona::updateOrCreate([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioTwo->id,  'professor_id' => $professorTwo->id,
        ],[
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioTwo->id,  'professor_id' => $professorTwo->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        ProfessorLeciona::updateOrCreate([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioThree->id,  'professor_id' => $professorThree->id,
        ],[
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioThree->id,  'professor_id' => $professorThree->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        ProfessorLeciona::updateOrCreate([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioFour->id,  'professor_id' => $professorOne->id,
        ],[
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioFour->id,  'professor_id' => $professorOne->id,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

    }
}
