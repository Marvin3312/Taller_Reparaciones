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
        Schema::create('servicio', function (Blueprint $table) {
            $table->increments('id_servicio');
            $table->date('fecha_recepcion');
            $table->enum('estado', ['Recibido', 'En Reparación', 'Finalizado', 'Entregado'])->default('Recibido');
            $table->text('diagnostico')->nullable();
            $table->text('solucion')->nullable();
            $table->unsignedInteger('id_equipo');
            $table->unsignedInteger('id_tecnico')->nullable();
            $table->timestamps();

            $table->foreign('id_equipo')->references('id_equipo')->on('equipo')->onDelete('cascade');
            $table->foreign('id_tecnico')->references('id_tecnico')->on('tecnico')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio');
    }
};
