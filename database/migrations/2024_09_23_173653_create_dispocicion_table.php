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
        Schema::create('dispocicion', function (Blueprint $table) {
            $table->id('codigo_dispocicion');
            $table->date('fecha_dispocicion');
            $table->string('tipo_dispocicion');
            $table->double('valor_dispocicion');
            $table->bigInteger('id_activo')->unsigned();
            $table->foreign('id_activo')->references('codigo_activo')->on('activos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispocicion');
    }
};
