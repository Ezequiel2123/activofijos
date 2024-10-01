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
        Schema::create('activos', function (Blueprint $table) {
            $table->id('codigo_activo');
            $table->string('nombre', 100);
            $table->string('tipo_adquisicion');
            $table->date('fecha_adquisicion', 100);
            $table->double('valor_adquisicion');
            $table->string('vida_util');
            $table->bigInteger('id_ubicacion')->unsigned();
            $table->bigInteger('id_empleado')->unsigned();
            $table->foreign('id_ubicacion')->references('codigo_ubicacion')->on('ubicaciones');
            $table->foreign('id_empleado')->references('codigo_empleado')->on('empleados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos');
    }
};
