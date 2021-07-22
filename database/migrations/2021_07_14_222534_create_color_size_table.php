<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_size', function (Blueprint $table) {
            $table->id();
            
            //Campos requeridos
            $table->integer('quantity');

            //Campos llaves foraneas
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');

            //Restricciones de las llaves foraneas
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('size_id')->references('id')->on('sizes');

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
        Schema::dropIfExists('color_size');
    }
}
