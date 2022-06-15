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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estation_id')->references('id')->on('estations');
            $table->foreignId('report_id')->references('id')->on('reports');
            $table->foreignId('equipment_id')->references('id')->on('catalogs');
            $table->integer('cantidad',3);
            $table->enum('estado',['PENDIENTE', ])->default('PENDIENTE');
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
        Schema::dropIfExists('requirements');
    }
};
