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
        Schema::create('estudio', function (Blueprint $table) {
            $table->id('estudioID');
            $table->string('nombre', 200)->unique();
            $table->string('categoria', 20);
            $table->integer('estado');
            $table->timestamps();
        });

        Schema::create('paquete', function (Blueprint $table) {
            $table->id('paqueteID');
            $table->string('nombre', 200);
            $table->string('descripcion', 200);
            $table->integer('estado');
            $table->timestamps();
        });

        Schema::create('paquetedetail', function (Blueprint $table) {
            $table->id('paqueteDetailID');
            $table->foreignId('estudioID')->constrained('estudio','estudioID')->onDelete('cascade');
            $table->foreignId('paqueteID')->constrained('paquete','paqueteID')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudio');
        Schema::dropIfExists('paquete');
        Schema::dropIfExists('paquetedetail');
    }
};
