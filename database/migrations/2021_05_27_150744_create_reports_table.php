<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->date('fechaCreacion');
            $table->enum('estado',['BORRADOR','PRESENTADO','REVISADO','ARCHIVADO']);
            $table->enum('tipo',['ACTIVIDADES','MEDICION','PROMOCION']);

            $table->foreignId('commission_id')->references('id')->on('commissions');
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
        Schema::dropIfExists('reports');
    }
}
