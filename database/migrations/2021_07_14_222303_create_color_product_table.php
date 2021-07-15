<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->id();

            //Campos Requeridos
            $table->integer('quantity');

            //Campos llaves foraneas
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('product_id');

            //Restricciones llaves foraneas
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('product_id')->references('id')->on('products');

            

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
        Schema::dropIfExists('color_product');
    }
}
