<?php

namespace Database\Seeders;

use App\Models\{
    User, Curso, Turma, Trimeste, Horario
};
use App\Enum\{FuncaoEnum, DiaSemanaEnum};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::updateOrCreate(['email' => 'mariolopez@example.com'], [
            'name' => 'Mario lopez',
            'email' => 'mariolopez@example.com',
            'genero' => 'M',
            'data_nascimento' => '1999-07-12',
            'bilhete_identidade' => '006543012LA092',
            'funcao' => FuncaoEnum::DIRECTOR_GERAL,
            'password' => bcrypt('12345678')
        ]);

        Curso::updateOrCreate(['nome' => 'Ciências Físicas e Biológicas'],[
            'nome' => 'Ciências Físicas e Biológicas', 'num_classe' => '10',
        ]);

        Curso::updateOrCreate(['nome' => 'Ciências Econômicas e Jurídicas'],[
            'nome' => 'Ciências Econômicas e Jurídicas', 'num_classe' => '10'
        ]);

        $turma = Turma::updateOrCreate(['ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1"],[
            'ano_lectivo' => "2023/2024", "periodo" => "MANHA", "sala" => "1"
        ]);

        $trimestre = Trimeste::updateOrCreate(['data_inicio' => '2024-03-30', 'data_termino' => '2023-06-27'],[
            'data_inicio' => '2024-03-30', 'data_termino' => '2023-06-27'
        ]);

        $horario = Horario::updateOrCreate([],[
            'turma_id' => $turma->id,
            'dia_semana' => DiaSemanaEnum::SEGUNDA_FEIRA,
            'hora_inicio' => "08:00:00",
            'hora_termino' => "09:00:00",
        ]);

    }
}
