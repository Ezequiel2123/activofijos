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
        Schema::create('depreciacion', function (Blueprint $table) {
            $table->id('codigo_depreciacion');
            $table->year('anio');
            $table->float('valor_depreciacion');
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
        Schema::dropIfExists('depreciacion');
    }
};
