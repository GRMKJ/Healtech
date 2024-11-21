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
        Schema::create('administrador', function (Blueprint $table) {
            $table->id('adminID');
            $table->foreignId('userID')->constrained('users')->onDelete('cascade');
            $table->string('nombre');
            $table->string('apaterno', 200);
            $table->string('amaterno', 200);
            $table->timestamps();
        });

        Schema::create('paciente', function (Blueprint $table) {
            $table->id('pacienteID');
            $table->foreignId('userID')->constrained('users')->onDelete('cascade');
            $table->string('nombre', 200);
            $table->string('apaterno', 200);
            $table->string('amaterno', 200);
            $table->timestamps();
        });

        Schema::create('operativo', function (Blueprint $table) {
            $table->id('operativoID');
            $table->foreignId('userID')->constrained('users')->onDelete('cascade');
            $table->string('nombre', 200);
            $table->string('apaterno', 200);
            $table->string('amaterno', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrador');
        Schema::dropIfExists('paciente');
        Schema::dropIfExists('operativo');
    }
};
