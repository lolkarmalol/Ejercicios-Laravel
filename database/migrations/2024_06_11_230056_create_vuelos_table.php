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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('salaabordaje');
            $table->time('horasalida');
            $table->time('horallegada');


            $table->unsignedBigInteger('destino_id')->unique();
            $table->foreign('destino_id')->references('id')
            ->on('destinos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('aerolinea_id')->unique();
            $table->foreign('aerolinea_id')->references('id')
            ->on('aerolineas')
            ->onDelete('cascade')
            ->onUpdate('cascade');





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
