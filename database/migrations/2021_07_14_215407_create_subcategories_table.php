<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();

            //Campos Requeridos
            $table->string('name');
            $table->string('image');

            $table->string('slug');

            // campos por defecto sera false
            $table->boolean('color')->default(false);
            $table->boolean('size')->default(false);

            //Campos de las llaves foraneas
            $table->unsignedBigInteger('category_id');

            //Restricciones de las llaves Foraneas
            $table->foreign('category_id')->references('id')->on('categories');

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
        Schema::dropIfExists('subcategories');
    }
}
