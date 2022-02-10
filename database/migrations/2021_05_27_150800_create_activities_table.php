<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->enum('tipoActivity',['DIAGNOSTICO','MANT. PREVENTIVO','MANT. CORRECTIVO','CAMBIO DE EQUIPO','PROMOCION']);
            $table->date('fechaInicio');
            $table->date('fechaFin')->nullable();

            $table->foreignId('report_id')->references('id')->on('reports');
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
        Schema::dropIfExists('activities');
    }
}
