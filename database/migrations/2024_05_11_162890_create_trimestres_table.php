<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Enum\NumeroEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trimestres', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid()'));
            $table->enum('numero', NumeroEnum::keys());
            $table->date('data_inicio');
            $table->date('data_termino');
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
        Schema::dropIfExists('trimestres');
    }
};
