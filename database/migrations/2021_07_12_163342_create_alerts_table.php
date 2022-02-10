<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->unsignedBigInteger('estation_id');
            $table->enum('estado',['PENDIENTE','ATENDIDO']);
            $table->enum('nivel',['BAJO','MODERADO','URGENTE']);

            $table->foreign('estation_id')->references('id')->on('estations');
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
        Schema::dropIfExists('alerts');
    }
}
