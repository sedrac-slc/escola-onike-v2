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
            $table->foreignUuid('turma_id')->constrained('turmas')->cascadeOnDelete();
            $table->foreignUuid('trimestre_id')->constrained('trimestres')->cascadeOnDelete();
            $table->foreignUuid('disciplina_id')->constrained('disciplinas')->cascadeOnDelete();
            $table->integer('mac')->unsigned()->nullable();
            $table->integer('npp')->unsigned()->nullable();
            $table->integer('npt')->unsigned()->nullable();
            $table->integer('mt1')->unsigned()->nullable();
            $table->integer('mt2')->unsigned()->nullable();
            $table->integer('mt3')->unsigned()->nullable();
            $table->integer('mf')->unsigned()->nullable();
            $table->integer('mfd')->unsigned()->nullable();
            $table->integer('exame')->unsigned()->nullable();
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
        Schema::dropIfExists('notas');
    }
};
