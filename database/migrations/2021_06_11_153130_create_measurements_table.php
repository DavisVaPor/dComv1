<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion');
            $table->string('latitud');
            $table->string('longitud');
            $table->float('rni');
            $table->date('fecha');

            $table->foreignId('report_id')->references('id')->on('reports');
            $table->foreignId('ubigee_id')->references('id')->on('ubigees');
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
        Schema::dropIfExists('measurements');
    }
}
