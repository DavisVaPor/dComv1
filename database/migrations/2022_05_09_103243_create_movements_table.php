<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_movimiento',['INSTALACION','RETIRO']);
            $table->foreignId('estation_id')->references('id')->on('estations');
            $table->integer('estacion_out_id');
            $table->string('estacion_out_name');
            $table->foreignId('report_id')->references('id')->on('reports');
            $table->string('acta');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
};
