<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionUbigeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_ubigee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commission_id')->references('id')->on('commissions');
            $table->foreignId('ubigee_id')->references('id')->on('ubigees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commission_ubigee');
    }
}
