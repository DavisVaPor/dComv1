<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_url');
            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('estation_id')->nullable();

            $table->foreign('report_id')->references('id')->on('reports');
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
        Schema::dropIfExists('actas');
    }
}
