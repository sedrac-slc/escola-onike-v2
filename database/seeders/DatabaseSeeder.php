<?php

namespace Database\Seeders;

use App\Models\{
    Aluno,
    User, Curso, Turma, Trimestre, Horario, Disciplina,
    Professor, Funcionario, CursoDisciplinaHorario
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

        $userAluno = User::updateOrCreate(['email' => 'belalopez@example.com'], [
            'name' => 'Bela lopez', 'email' => 'belalopez@example.com',
            'genero' => 'F', 'data_nascimento' => '2004-07-12',
            'bilhete_identidade' => '007543012LA043', 'funcao' => FuncaoEnum::ALUNO,
            'password' => bcrypt('12345678')
        ]);

        $userProfessor = User::updateOrCreate(['email' => 'rucapires@example.com'], [
            'name' => 'Ruca Pires', 'email' => 'rucapires@example.com',
            'genero' => 'F', 'data_nascimento' => '2004-07-12',
            'bilhete_identidade' => '002546012LA015', 'funcao' => FuncaoEnum::PROFESSOR,
            'password' => bcrypt('12345678')
        ]);

        $cursoOne = Curso::updateOrCreate(['nome' => 'Ciências Físicas e Biológicas'],[
            'nome' => 'Ciências Físicas e Biológicas', 'num_classe' => NumeroClasseEnum::DECIMA,
            'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $turma = Turma::updateOrCreate(['ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1"],[
            'ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1", "curso_id" => $cursoOne->id,
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

        $disciplinaOne = Disciplina::updateOrCreate(['nome' => 'Física'],[
            'nome' => 'Física', 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $disciplinaTwo = Disciplina::updateOrCreate(['nome' => 'Matemática'],[
            'nome' => 'Matemática', 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        $disciplinaThree = Disciplina::updateOrCreate(['nome' => 'Biologia'],[
            'nome' => 'Biologia', 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        /*
        Aluno::updateOrCreate(['user_id' => $userAluno->id, 'classe_id' => $classe->id],[
            'user_id' => $userAluno->id, 'classe_id' => $classe->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);
        */
        $professorOne = Professor::updateOrCreate(['user_id' => $userProfessor->id, "formacao" => "Física"],[
            'user_id' => $userProfessor->id,"formacao" => "Física" , 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        Funcionario::updateOrCreate(['user_id' => $user->id],[
            'user_id' => $user->id, 'created_by' => $user->id, 'updated_by' => $user->id
        ]);

        CursoDisciplinaHorario::updateOrCreate([
            'curso_id' => $cursoOne->id, 'horario_id' => $horarioOne->id, 'disciplina_id' => $disciplinaOne->id
        ],[
            'curso_id' => $cursoOne->id, 'horario_id' => $horarioOne->id, 'disciplina_id' => $disciplinaOne->id
        ]);

        CursoDisciplinaHorario::updateOrCreate([
            'curso_id' => $cursoOne->id, 'horario_id' => $horarioTwo->id, 'disciplina_id' => $disciplinaTwo->id
        ],[
            'curso_id' => $cursoOne->id, 'horario_id' => $horarioTwo->id, 'disciplina_id' => $disciplinaTwo->id
        ]);

    }
}
