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
        Schema::create('cita', function (Blueprint $table) {
            $table->id('citaID');
            $table->foreignId('pacienteID')->constrained('paciente','pacienteID')->onDelete('cascade');
            $table->dateTime('fecha');
            $table->integer('estado');
            $table->timestamps();
        });

        Schema::create('citadetails', function (Blueprint $table) {
            $table->id('citaDetailsID');
            $table->foreignId('citaID')->constrained('cita','citaID')->noActionOnDelete();
            $table->foreignId('estudioID')->constrained('estudio','estudioID')->noActionOnDelete();
            $table->foreignId('operativoID')->constrained('operativo','operativoID')->noActionOnDelete();
            $table->string('nombre', 200);
            $table->integer('estado');
            $table->boolean('archivo');
            $table->string('ruta', 200);
            $table->boolean('enviado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
        Schema::dropIfExists('citadetails');
    }
};
