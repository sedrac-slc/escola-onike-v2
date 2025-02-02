<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Enum\AnoCurricularEnum;
use App\Enum\PeriodoEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('curso_id')->constrained('cursos')->cascadeOnDelete();
            $table->foreignUuid('classe_id')->constrained('classes')->cascadeOnDelete();
            $table->enum('periodo', PeriodoEnum::keys());
            $table->enum("ano_curricular", AnoCurricularEnum::keys())->nullable();
            $table->string("ano_lectivo")->nullable();
            $table->string("sala");
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
        Schema::dropIfExists('turmas');
    }
};
