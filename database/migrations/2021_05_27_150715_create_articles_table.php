<?php

use App\Models\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('codPatrimonial',48);
            $table->string('denominacion');
            $table->string('marca');
            $table->string('modelo')->nullable();
            $table->string('nserie');
            $table->string('color');

            $table->integer('cantidad')->default(1);
            $table->enum('estado',['BUENO','REGULAR','MALO'])->default('BUENO');
            
            $table->foreignId('estation_id')->references('id')->on('estations');
            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('system_id')->references('id')->on('systems');


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
        Schema::dropIfExists('articles');
    }
}
