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
        Schema::create('tecnico', function (Blueprint $table) {
            $table->increments('id_tecnico');
            $table->string('nombre', 150);
            $table->string('especialidad', 100)->nullable();
            $table->string('correo')->unique()->nullable();
            $table->string('telefono', 20)->nullable();
            $table->unsignedInteger('id_usuario')->unique();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnico');
    }
};