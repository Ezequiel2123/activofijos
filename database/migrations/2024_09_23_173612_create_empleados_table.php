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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('codigo_empleado');
            $table->string('nombre', 50);
            $table->string('apellidos', 100);
            $table->string('cargo');
            $table->bigInteger('id_departamento')->unsigned();
            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_departamento')->references('codigo_departamento')->on('departamentos');
            $table->foreign('id_usuario')->references('codigo_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
