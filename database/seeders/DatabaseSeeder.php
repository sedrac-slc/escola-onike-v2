<?php

namespace Database\Seeders;

use App\Models\{
    Aluno, User, Curso, Classe, Turma, Trimestre, Horario, Disciplina, Matricula,
    ProfessorLeciona, Professor, Funcionario, TurmaDisciplinaHorario, Coordenador
};
use App\Enum\{FuncaoEnum, DiaSemanaEnum, NumeroClasseEnum, GeneroEnum, PeriodoEnum};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    private function createUser($data){
        $genero = GeneroEnum::genero($data['genero']);
        $funcao = FuncaoEnum::funcao($data['funcao']);
        $data['concat_fields'] = $data['name'].'|'.$genero.'|'.$data['data_nascimento'].'|'.$funcao;
        return User::updateOrCreate(['email' => $data['email']],  $data);
    }

    private function createCurso($data){
        $data['concat_fields'] = $data['nome'];
        if(!isset($data['lectivo_ano']))  $data['lectivo_ano'] = "2024/2025";
        return Curso::updateOrCreate(['nome' => $data['nome'] ], $data);
    }

    private function createClasse($data, $curso ){
        $num_classe = NumeroClasseEnum::numeroClasse($data['num_classe']);
        $data['concat_fields'] = $data['curso_id'].'|'.$num_classe;
        return Classe::updateOrCreate(['curso_id' => $data['curso_id'], 'num_classe' => $data['num_classe'] ], $data);
    }

    private function createTurma($data, $curso){
        $periodo = PeriodoEnum::periodo($data['periodo']);
        $data['concat_fields'] = $data['ano_lectivo'].'|'.$curso->concat_fields.'|'.$periodo.'|'.$data['sala'];
        return Turma::updateOrCreate([
            'ano_lectivo' => $data['ano_lectivo'],
            "curso_id" => $data['curso_id'],
            "sala" => $data['sala'],
            "periodo" => $periodo,
        ], $data);
    }

    private function createTrimestre($data){
        $data['concat_fields'] = $data['data_inicio'].'|'.$data['data_termino'];
        return Trimestre::updateOrCreate(['data_inicio' => $data['data_inicio'], 'data_termino' => $data['data_termino'] ], $data);
    }

    private function createHorario($data, $disciplina, $curso){
        $data['concat_fields'] = $data['dia_semana'].'|'.$data['hora_inicio'].'|'.$data['hora_termino'];
        return Horario::updateOrCreate([
            'dia_semana' => $data['dia_semana'],
            'hora_inicio' => $data['hora_inicio'],
            'hora_termino' => $data['hora_termino'],
            'disciplina_id' => $disciplina->id,
            'curso_id' => $curso->id,
        ], $data);
    }

    private function createDisciplina($data){
        $data['concat_fields'] = $data['nome'];
        return Disciplina::updateOrCreate(['nome' => $data['nome'] ], $data);
    }

    private function createProfessor($data, $user){
        $data['concat_fields'] = $user->concat_fields.'|'.$data['formacao'];
        return Professor::updateOrCreate(['user_id' => $data['user_id'], "formacao" => $data['formacao'] ], $data);
    }

    private function createAluno($data, $user){
        $data['concat_fields'] = $user->concat_fields;
        return Aluno::updateOrCreate(['user_id' => $data['user_id']], $data);
    }

    private function createCoordenador($data, $user){
        $data['concat_fields'] = $user->concat_fields;
        return Coordenador::updateOrCreate(['user_id' => $data['user_id'] ], $data);
    }

    private function createFuncionario($data, $user){
        $data['concat_fields'] = $user->concat_fields;
        return Funcionario::updateOrCreate(['user_id' => $data['user_id']], $data);
    }

    private function createMatricula($data, $aluno, $turma){
        $data['concat_fields'] = $aluno->user->concat_fields .'|'. $turma->concat_fields;
        return Matricula::updateOrCreate([ 'aluno_id' => $data['aluno_id'], 'turma_id' => $data['turma_id'] ], $data);
    }

    private function createTurmaDisciplinaHorario($data, $turma, $horario, $disciplina){
        $data['concat_fields'] = $turma->concat_fields.'|'.$horario->concat_fields.'|'.$disciplina->concat_fields;
        return TurmaDisciplinaHorario::updateOrCreate([
            'turma_id' => $turma->id, 'horario_id' => $horario->id, 'disciplina_id' => $disciplina->id
        ], $data);
    }

    private function createProfessorLeciona($data, $turmaDisciplinaHorario, $professor){
        $data['concat_fields'] = $turmaDisciplinaHorario->concat_fields.'|'.$professor->concat_fields;
        return ProfessorLeciona::updateOrCreate([
            'turma_disciplina_horario_id' => $data['turma_disciplina_horario_id'],  'professor_id' => $data['professor_id'],
        ], $data);
    }

    public function run(): void
    {
        $user = $this->createUser([
            'name' => 'Mario Lopez',
            'email' => 'mariolopez@example.com',
            'genero' => 'M',
            'data_nascimento' => '1999-07-12',
            'bilhete_identidade' => '006543012LA092',
            'funcao' => FuncaoEnum::DIRECTOR_GERAL,
            'password' => bcrypt('12345678')
        ]);

        $userTwo = $this->createUser([
            'name' => 'Bela Lopez',
            'email' => 'belalopez@example.com',
            'genero' => 'F',
            'data_nascimento' => '2004-07-12',
            'bilhete_identidade' => '007543012LA043',
            'funcao' => FuncaoEnum::PROFESSOR,
            'password' => bcrypt('12345678')
        ]);

        $userThree = $this->createUser([
            'name' => 'Ruca Pires',
            'email' => 'rucapires@example.com',
            'genero' => 'M',
            'data_nascimento' => '2004-10-22',
            'bilhete_identidade' => '002546012LA015',
            'funcao' => FuncaoEnum::PROFESSOR,
            'password' => bcrypt('12345678')
        ]);

        $userFour = $this->createUser([
            'name' => 'Joana Alberto',
            'email' => 'joanaalberto@example.com',
            'genero' => 'F',
            'data_nascimento' => '2004-02-09',
            'bilhete_identidade' => '003447612LA026',
            'funcao' => FuncaoEnum::PROFESSOR,
            'password' => bcrypt('12345678')
        ]);

        $userFive = $this->createUser([
            'name' => 'Paulo Pequeno',
            'email' => 'paulopequeno@example.com',
            'genero' => 'M',
            'data_nascimento' => '2004-07-10',
            'bilhete_identidade' => '000747342BE026',
            'funcao' => FuncaoEnum::ALUNO,
            'password' => bcrypt('12345678')
        ]);

        $userSix = $this->createUser([
            'name' => 'Berta Maria',
            'email' => 'bertamaria@example.com',
            'genero' => 'F',
            'data_nascimento' => '2004-04-10',
            'bilhete_identidade' => '000747342BE026',
            'funcao' => FuncaoEnum::ALUNO,
            'password' => bcrypt('12345678')
        ]);

        $userSeven = $this->createUser([
            'name' => 'Lucas Firme',
            'email' => 'lucasfirme@example.com',
            'genero' => 'M',
            'data_nascimento' => '2004-04-10',
            'bilhete_identidade' => '000947212CA036',
            'funcao' => FuncaoEnum::ALUNO,
            'password' => bcrypt('12345678')
        ]);

        $userEight = $this->createUser([
            'name' => 'Orlando Fernando',
            'email' => 'orlandofernando@example.com',
            'genero' => 'M',
            'data_nascimento' => '1989-04-11',
            'bilhete_identidade' => '000214212HU062',
            'funcao' => FuncaoEnum::COORDENADOR_CURSO,
            'password' => bcrypt('12345678')
        ]);

        $userNone = $this->createUser([
            'name' => 'Mirian Lucas',
            'email' => 'mirianlucas@example.com',
            'genero' => 'F',
            'data_nascimento' => '1990-04-11',
            'bilhete_identidade' => '000318212LA159',
            'funcao' => FuncaoEnum::COORDENADOR_CURSO,
            'password' => bcrypt('12345678')
        ]);

        $cursoOne = $this->createCurso([
            'nome' => 'Sétima',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $cursoTwo = $this->createCurso([
            'nome' => 'Oitava',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $cursoThree = $this->createCurso([
            'nome' => 'Nona',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $cursoFour = $this->createCurso([
            'nome' => 'Ciências Físicas e Biológicas',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $cursoFive = $this->createCurso([
            'nome' => 'Ciências Ecônomicas e Empresarial',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $classOne = $this->createClasse([
            'num_classe' => NumeroClasseEnum::SETIMA,
            "curso_id" => $cursoOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoOne);

        $classTwo = $this->createClasse([
            'num_classe' => NumeroClasseEnum::OITAVA,
            "curso_id" => $cursoTwo->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoTwo);

        $classThree = $this->createClasse([
            'num_classe' => NumeroClasseEnum::NONA,
            "curso_id" => $cursoThree->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoThree);

        $classFour = $this->createClasse([
            'num_classe' => NumeroClasseEnum::DECIMA,
            "curso_id" => $cursoFour->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoFour);

        $turmaOne = $this->createTurma([
            'ano_lectivo' => "2024/2025",
            "periodo" => PeriodoEnum::MANHA,
            "sala" => "1",
            "classe_id" => $classOne->id,
            "curso_id" => $cursoOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoOne);

        $turmaTwo = $this->createTurma([
            'ano_lectivo' => "2024/2025",
            "periodo" =>  PeriodoEnum::TARDE,
            "sala" => "2",
            "classe_id" => $classTwo->id,
            "curso_id" => $cursoOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoOne);

        $turmaThree = $this->createTurma([
            'ano_lectivo' => "2024/2025",
            "periodo" => PeriodoEnum::MANHA,
            "sala" => "1",
            "classe_id" => $classThree->id,
            "curso_id" => $cursoThree->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoTwo);

        $turmaFour = $this->createTurma([
            'ano_lectivo' => "2024/2025",
            "periodo" => PeriodoEnum::TARDE,
            "sala" => "2",
            "classe_id" => $classFour->id,
            "curso_id" => $cursoFour->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $cursoTwo);

        $trimestreOne = $this->createTrimestre([
            'data_inicio' => '2025-01-10',
            'data_termino' => '2025-04-13',
            'numero' => '1',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $trimestreTwo = $this->createTrimestre([
            'data_inicio' => '2025-05-01',
            'data_termino' => '2025-08-04',
            'numero' => '2',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $trimestreThree = $this->createTrimestre([
            'data_inicio' => '2025-08-09',
            'data_termino' => '2025-11-12',
            'numero' => '3',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $disciplinaOne = $this->createDisciplina([
            'nome' => 'Física',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $disciplinaTwo = $this->createDisciplina([
            'nome' => 'Matemática',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $disciplinaThree = $this->createDisciplina([
            'nome' => 'Biologia',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $disciplinaFour = $this->createDisciplina([
            'nome' => 'Língua Porguesa',
            'created_by' => $user->id,
            'updated_by' => $user->id
        ]);

        $horarioOne = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "08:00:00",
            'hora_termino' => "08:40:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaThree, $cursoOne);

        $horarioTwo = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "08:45:00",
            'hora_termino' => "09:25:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaFour, $cursoOne);

        $horarioThree = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "09:30:00",
            'hora_termino' => "10:10:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaThree, $cursoOne);

        $horarioFour = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "10:40:00",
            'hora_termino' => "12:00:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaTwo, $cursoOne);

        $horarioFive = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::TERCA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "08:00:00",
            'hora_termino' => "08:30:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaOne, $cursoTwo);

        $horarioSix = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::TERCA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "08:40:00",
            'hora_termino' => "09:20:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaTwo, $cursoTwo);

        $horarioSeven = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::TERCA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "09:30:00",
            'hora_termino' => "10:30:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaTwo, $cursoTwo);

        $horarioEight = $this->createHorario([
            'dia_semana' => DiaSemanaEnum::TERCA_FEIRA,
            "periodo" => PeriodoEnum::MANHA,
            'hora_inicio' => "10:40:00",
            'hora_termino' => "12:00:00",
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $disciplinaTwo, $cursoTwo);

        $professorOne = $this->createProfessor([
            'user_id' => $userTwo->id,
            "formacao" => "Física" ,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userTwo);

        $professorTwo = $this->createProfessor([
            'user_id' => $userThree->id,
            "formacao" => "Química" ,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userThree);

        $professorThree = $this->createProfessor([
            'user_id' => $userFour->id,
            "formacao" => "Lógica Matemática" ,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userFour);

        $alunoOne = $this->createAluno([
            'user_id' => $userFive->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userFive);

        $alunoTwo = $this->createAluno([
            'user_id' => $userSix->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userSix);

        $alunoThree = $this->createAluno([
            'user_id' => $userSeven->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userSeven);

        $coodenadorOne = $this->createCoordenador([
            'user_id' => $userEight->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userEight);

        $coodenadorTwo = $this->createCoordenador([
            'user_id' => $userNone->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $userNone);

        $coodenadorOne->cursos()->sync([ $cursoOne->id ]);
        $coodenadorTwo->cursos()->sync([ $cursoTwo->id ]);

        $this->createFuncionario([
            'user_id' => $user->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $user);

        $this->createMatricula([
            'aluno_id' => $alunoOne->id,
            'turma_id' => $turmaOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $alunoOne, $turmaOne);

        $this->createMatricula([
            'aluno_id' => $alunoThree->id,
            'turma_id' => $turmaOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $alunoThree, $turmaOne);

        $this->createMatricula([
            'aluno_id' => $alunoTwo->id,
            'turma_id' => $turmaTwo->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $alunoTwo, $turmaTwo);

        $turmaDisciplinaHorarioOne = $this->createTurmaDisciplinaHorario([
            'turma_id' => $turmaOne->id,
            'horario_id' => $horarioOne->id,
            'disciplina_id' => $disciplinaOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaOne, $horarioOne, $disciplinaOne);

        $turmaDisciplinaHorarioTwo = $this->createTurmaDisciplinaHorario([
            'turma_id' => $turmaOne->id,
            'horario_id' => $horarioTwo->id,
            'disciplina_id' => $disciplinaTwo->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaOne, $horarioTwo, $disciplinaTwo);

        $turmaDisciplinaHorarioThree = $this->createTurmaDisciplinaHorario([
            'turma_id' => $turmaTwo->id,
            'horario_id' => $horarioTwo->id,
            'disciplina_id' => $disciplinaThree->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaTwo, $horarioTwo, $disciplinaThree);

        $turmaDisciplinaHorarioFour = $this->createTurmaDisciplinaHorario([
            'turma_id' => $turmaThree->id,
            'horario_id' => $horarioThree->id,
            'disciplina_id' => $disciplinaFour->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaThree, $horarioThree, $disciplinaFour);

        $this->createProfessorLeciona([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioOne->id,
            'professor_id' => $professorOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaDisciplinaHorarioOne, $professorOne);

        $this->createProfessorLeciona([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioTwo->id,
            'professor_id' => $professorTwo->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaDisciplinaHorarioTwo, $professorTwo);

        $this->createProfessorLeciona([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioThree->id,
            'professor_id' => $professorThree->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaDisciplinaHorarioThree, $professorThree);

        $this->createProfessorLeciona([
            'turma_disciplina_horario_id' => $turmaDisciplinaHorarioFour->id,
            'professor_id' => $professorOne->id,
            'created_by' => $user->id,
            'updated_by' => $user->id
        ], $turmaDisciplinaHorarioFour, $professorOne);
    }
}
