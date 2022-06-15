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
        Schema::create('sinisters', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->date('fecha_siniestro');
            $table->foreignId('estation_id')->references('id')->on('estations');
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
        Schema::dropIfExists('sinisters');
    }
};
