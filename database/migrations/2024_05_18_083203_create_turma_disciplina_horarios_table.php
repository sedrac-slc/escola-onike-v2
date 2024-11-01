<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TurmaDisciplinaHorario;
use Illuminate\Support\Facades\DB;
use App\Models\ProfessorLeciona;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(TurmaDisciplinaHorario::TABLE, function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('turma_id')->constrained('turmas')->cascadeOnDelete();
            $table->foreignUuid('disciplina_id')->constrained('disciplinas')->cascadeOnDelete();
            $table->foreignUuid('horario_id')->constrained('horarios')->cascadeOnDelete();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->text('concat_fields')->nullable();
            $table->timestamps();
        });

        Schema::create(ProfessorLeciona::TABLE, function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('turma_disciplina_horario_id')->constrained(TurmaDisciplinaHorario::TABLE)->cascadeOnDelete();
            $table->foreignUuid('professor_id')->constrained('professors')->cascadeOnDelete();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->text('concat_fields')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(TurmaDisciplinaHorario::TABLE);
        Schema::dropIfExists(ProfessorLeciona::TABLE);
    }
};
