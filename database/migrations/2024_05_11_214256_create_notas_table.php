<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('aluno_id')->constrained('alunos')->cascadeOnDelete();
            $table->foreignUuid('pauta_id')->constrained('pautas')->cascadeOnDelete();
            $table->foreignUuid('trimestre_id')->constrained('trimestres')->cascadeOnDelete();
            $table->foreignUuid('disciplina_id')->constrained('disciplinas')->cascadeOnDelete();
            $table->integer('mac')->unsigned();
            $table->integer('npp')->unsigned();
            $table->integer('npt')->unsigned();
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
        Schema::dropIfExists('notas');
    }
};
