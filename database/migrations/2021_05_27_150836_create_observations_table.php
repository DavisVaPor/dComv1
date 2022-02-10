<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->id();
            $table->text('detalle');

            $table->unsignedBigInteger('observationable_id');
            $table->string('observationable_type');

            $table->enum('atencion',['ALTA','MODERADO','BAJA','NINGUNA']);

            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('observations');
    }
}
