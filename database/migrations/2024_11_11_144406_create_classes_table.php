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
        Schema::create('classes', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('turma_id')->constrained('turmas')->cascadeOnDelete();
            $table->foreignUuid('curso_id')->constrained('cursos')->cascadeOnDelete();
            $table->string("numero_classe");
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
        Schema::dropIfExists('classes');
    }
};
