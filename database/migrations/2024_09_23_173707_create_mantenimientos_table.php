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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id('codigo_mantenimiento');
            $table->date('fecha_mantenimiento');
            $table->string('tipo_mantenimiento');
            $table->double('costo_mantenimiento');
            $table->string('descripcion');
            $table->bigInteger('id_activo')->unsigned();
            $table->bigInteger('id_proveedor')->unsigned();
            $table->foreign('id_activo')->references('codigo_activo')->on('activos');
            $table->foreign('id_proveedor')->references('codigo_proveedor')->on('proveedores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
