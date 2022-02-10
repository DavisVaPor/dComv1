<?php

use App\Models\Estation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estations', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('latitud',25);
            $table->string('longitud',25);
            $table->string('altitud',25)->nullable();
            $table->enum('operativo',[Estation::OPERATIVO,Estation::INOPERATIVO])->default(Estation::OPERATIVO);
            $table->text('urlgooglearth');
            $table->enum('tipo',['A','B','C']);
            $table->unsignedBigInteger('ubigeo_id');


            $table->foreign('ubigeo_id')->references('id')->on('ubigees');
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
        Schema::dropIfExists('estations');
    }
}
