<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Clases a Importar
use App\Models\Image;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * llamamos al modelo PRODUCT y le decimos que genere 250 nuevos productos FACTORY
         * y luego que los guarde con el metodo CREATE luego le pasamos el metodo each() que se 
         * encarga de recorrer cada uno de los productos que tenemos es como si hubieramos puesto
         * un foreach ahora tenemos que capturar cada uno de estos productos recien creados y para 
         * poder capturarlos tenemos que crear una función y dentro de esa función le decimos que
         * capture esos elementos que se tratan de una instancia del modelo product 'Product $product'
         * 
         */

        Product::factory(250)->create()->each(function(Product $product){
            /**
             * Como deseamos tener 4 imagenes por cada producto y este procedimiento lo
             * hacemos atravez del modelo Image y accedemos a su factory() lo llamamos para que se 
             * ejecute aqui le pasamos el metodo create()
             * es importante importar el modelo.
             * 
             */
            Image::factory(4)->create([
                /**
                 * genero un array para pasarle los dos datos el primero es el id del producto
                 *  y el segundo es el modelo del producto 
                 *  */ 

                'imageable_id' => $product->id,
                'imageable_type' => Product::class
            ]);
        });

    }

 
}
