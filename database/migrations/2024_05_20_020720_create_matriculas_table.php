<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Matricula;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Matricula::TABLE, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('aluno_id')->constrained('alunos')->cascadeOnDelete();
            $table->foreignUuid('turma_id')->constrained('turmas')->cascadeOnDelete();
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
        Schema::dropIfExists(Matricula::TABLE);
    }
};
