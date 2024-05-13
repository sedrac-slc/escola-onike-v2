<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('aluno_id')->constrained('alunos')->cascadeDelete();
            $table->foreignUuid('pauta_id')->constrained('pautas')->cascadeDelete();
            $table->foreignUuid('trimestre_id')->constrained('trimestes')->cascadeDelete();
            $table->foreignUuid('disciplina_id')->constrained('disciplinas')->cascadeDelete();
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
