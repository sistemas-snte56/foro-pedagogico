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
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('nombre')->nullable();
            $table->enum('genero', ['H', 'M', 'O'])->nullable();
            $table->string('nivel')->nullable();
            $table->foreignId('delegacion_id')->constrained('delegaciones');
            $table->string('clave_centro_trabajo')->nullable();
            $table->string('rfc')->nullable();
            $table->string('numero_personal')->index();
            $table->foreignId('mesa_id')->constrained('mesas');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes');
    }
};
//Apellido Materno	Nombre	Preescolar	Primaria 	Secundaria 	Delegación 	Clave Centro de Trabajo 	RFC	No de Personal
