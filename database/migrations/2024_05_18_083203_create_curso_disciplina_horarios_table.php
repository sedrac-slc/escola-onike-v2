<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\CursoDisciplinaHorario;
use Illuminate\Support\Facades\DB;
use App\Models\ProfessorLeciona;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(CursoDisciplinaHorario::TABLE, function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('curso_id')->constrained('cursos')->cascadeOnDelete();
            $table->foreignUuid('disciplina_id')->constrained('disciplinas')->cascadeOnDelete();
            $table->foreignUuid('horario_id')->constrained('horarios')->cascadeOnDelete();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create(ProfessorLeciona::TABLE, function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('curso_disciplina_horario_id')->constrained(CursoDisciplinaHorario::TABLE)->cascadeOnDelete();
            $table->foreignUuid('professor_id')->constrained('professors')->cascadeOnDelete();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(CursoDisciplinaHorario::TABLE);
        Schema::dropIfExists(ProfessorLeciona::TABLE);
    }
};
