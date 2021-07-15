<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            
            $table->string('url');
            // campos necesarios para que sea polimorfica

           /* * el campo unsignedBigInteger 
* debe tener el nombre de la tabla en singular y le damos la terminación able 
* seguido de "_id"
* y otro de tipo string debe tener el nombre de la tabla en singular y le damos 
* la terminación able seguido de "_type"
* 
*/

            $table->unsignedBigInteger('imageable_id');
            $table->string('imageable_type');

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
        Schema::dropIfExists('images');
    }
}
