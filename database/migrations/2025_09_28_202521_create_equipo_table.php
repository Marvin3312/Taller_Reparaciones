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
        Schema::create('equipo', function (Blueprint $table) {
            $table->increments('id_equipo');
            $table->enum('tipo', ['Laptop', 'Smartphone', 'Desktop', 'Impresora', 'Otro']);
            $table->string('modelo', 100)->nullable();
            $table->string('num_serie', 100)->nullable();
            $table->unsignedInteger('id_marca')->nullable();
            $table->timestamps();

            $table->foreign('id_marca')->references('id_marca')->on('marca')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
