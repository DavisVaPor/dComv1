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
        Schema::create('down_logs', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_down');
            $table->string('descripcion');
            $table->foreignId('article_id')->references('id')->on('articles');
            $table->foreignId('estation_id')->references('id')->on('estations');
            $table->foreignId('report_id')->references('id')->on('reports');
            $table->foreignId('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('down_logs');
    }
};
