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
        Schema::create('professors', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete()->unique();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::create('disciplina_professor', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->foreignUuid('disciplina_id')->constrained('disciplinas')->cascadeOnDelete();
            $table->foreignUuid('professor_id')->constrained('professors')->cascadeOnDelete();
            $table->unique(['disciplina_id','professor_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
        Schema::dropIfExists('disciplina_professor');
    }
};
