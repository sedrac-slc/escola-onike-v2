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
            $table->foreignUuid('disciplina_id')->constrained('disciplinas')->cascadeOnDelete();
            $table->integer('mac')->unsigned();
            $table->integer('npp')->unsigned();
            $table->integer('npt')->unsigned();
            $table->integer('mt1')->unsigned();
            $table->integer('mt2')->unsigned();
            $table->integer('mt3')->unsigned();
            $table->integer('mf')->unsigned();
            $table->integer('mfd')->unsigned();
            $table->string('exame');
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
