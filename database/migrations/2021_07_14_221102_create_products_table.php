<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Use App\Models\Product;
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            //Campos Requeridos
            $table->string('name');
            $table->string('slug');

            $table->text('description');

            $table->float('price');

            // para que acepte valores null le pasamos el metodo nullable()
            $table->integer('quantity')->nullable();

            // Campo que generamos mediante ktes definidas en el modelo 
            
            $table->enum('status', [Product::BORRADOR, Product::PUBLICADO])->default(Product::BORRADOR);
           
            //Campos de las llaves foraneas
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('brand_id');

            //Restricciones de las llaves foraneas
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->foreign('brand_id')->references('id')->on('brands');

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
        Schema::dropIfExists('products');
    }
}
