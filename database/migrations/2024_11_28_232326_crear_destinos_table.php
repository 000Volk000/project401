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
        //
        Schema::create('destinos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCiudad');
            $table->string('nombreUniversidad');
            $table->string('especialidad');
            $table->enum('plan', ['1 cuatrimestre', 'Curso completo'])->default('1 cuatrimestre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('destinos');
    }
};
